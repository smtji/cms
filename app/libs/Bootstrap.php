<?php

declare(strict_types=1);

namespace app\libs;

use Api;
use app\libs\common\ModeSession;

final class Bootstrap
{
    public $_base = [];

    public $_router = [];

    public $_database = [];

    /**
     * Constructor.
     */
    public function __construct($base = [], $routers = [], $databases = [])
    {
        $this->_base = $base;
        $this->_router = $routers;
        $this->_database = $databases;
    }

    public function initRouter($value = null)
    {
        preg_match('/[a-z0-9]+/i', $value, $uname);
        $value = implode('', $uname);

        if (strlen($value) > 1) {
            return $this->_router[$value];
        } else {
            return $this->_router['index'];
        }
    }

    public function sess($data = [])
    {
        $self = $this;
        Api::register('sess', ModeSession::class, [], function ($sess) use ($self) {
            $sess->_base = $self->_base;
        });

        extract($data);

        if ($id === 'set') {
            Api::sess()->set($name, $value);
        } else if ($id === 'del') {
            Api::sess()->del($name, $value);
        }
    }

    /**
     * start session
     * 
     * @access  public
     * @return  bool
     */
    public function start_session()
    {
        $data = $this->_base;

        $expires = time() + $data['expires'];
        $lifetime = $data['expires'];
        $path = $data['path'];
        $domain = $data['domain'];
        $secure = $data['secure'];
        $httponly = $data['httponly'];
        $samesite = $data['samesite'];

        $options = compact('lifetime', 'path', 'domain', 'secure', 'httponly', 'samesite');
        register_shutdown_function('session_write_close');
        session_save_path(Api::get('web.views.session'));
        session_set_cookie_params($options);
        session_name($data['name']);
        session_start();

        // Deal with existing session
        $signatureCookieValue = $_COOKIE[$data['signa']] ?? null;
        if ($signatureCookieValue !== null) {
            $regenerated = hash('sha256', session_id() . Api::request()->accept . Api::request()->ip);
            if ($signatureCookieValue !== $regenerated) {
                $this->del_session();
                $this->start_session();
            }
        }

        $options = compact('expires', 'path', 'domain', 'secure', 'httponly', 'samesite');
        setcookie($data['name'], session_id(), $options);
        setcookie($data['signa'], hash('sha256', session_id() . Api::request()->accept . Api::request()->ip), $options);
    }

    /**
     * destroy session
     * 
     * @access  public
     * @return  void
     */
    public function del_session(): void
    {
        $data = $this->_base;

        $_SESSION = array();

        $value = '';
        $expires = time() - $data['expires'];
        $path = $data['path'];
        $domain = $data['domain'];
        $secure = $data['secure'];
        $httponly = $data['httponly'];
        $samesite = $data['samesite'];

        $options = compact('expires', 'path', 'domain', 'secure', 'httponly', 'samesite');
        setcookie($data['name'], $value, $options);
        setcookie($data['signa'], $value, $options);
        unset($_COOKIE[$data['name']]);
        unset($_COOKIE[$data['signa']]);
        session_destroy();
    }
}

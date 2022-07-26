<?php

declare(strict_types=1);

namespace app\libs\common;

use Api;

final class ModeSession
{
    /**
     * setCookie
     * 
     * @access  public
     * @param   string $name
     * @param   mixed $value
     * @return  bool
     */
    public function set(string $name, $value)
    {
        $data = $this->_base;
        $expires = time() + $data['expires'];
        $path = $data['path'];
        $domain = $data['domain'];
        $secure = $data['secure'];
        $httponly = $data['httponly'];
        $samesite = $data['samesite'];
        $options = compact('expires', 'path', 'domain', 'secure', 'httponly', 'samesite');
        setcookie($name, $value, $options);
    }
}

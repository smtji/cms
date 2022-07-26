<?php
return [
# ======> 公共配置
    # 网站域名
    'url' => 'a.com',
    # 网站名称
    'title' => 'CMS',
# ======> SESSION 配置
    # SESSION 作用域
    'domain' => '.a.com',
    # SESSION 唯一名称
    'name' => '_cflb',
    # SESSION 有效时间(秒)
    'expires' => 3600,
    # SESSION signa
    'signa' => '_sess',
    # SESSION path
    'path' => '/',
    # SESSION secure 表示 cookie 仅在使用 安全 链接时可用
    'secure' => FALSE,
    # SESSION httponly  发送 cookie 的时候会使用 httponly 标记
    'httponly' => TRUE,
    # SESSION samesite
    'samesite' => 'Lax',
];

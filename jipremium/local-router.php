<?php

/*
|--------------------------------------------------------------------------
| Local development router (php -S) - not used in production
|--------------------------------------------------------------------------
|
| The site's document root is the parent folder (root index.php boots this
| app), mirroring the rewrite rules in ../web.config. Run from the parent:
|
|   php -S 127.0.0.1:8000 -t . jipremium/local-router.php
|
| Static files are served directly; everything else goes to index.php.
| Other .php files, dotfiles and the app folder itself are never served.
|
*/

$root = dirname(__DIR__);
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$file = realpath($root.$uri);

// Same deny rules as ../.htaccess on the live Apache server.
$isDenied = preg_match('#^/(jipremium|myad)(/|$)#i', $uri)
    || preg_match('#^/phpinfo\.php#i', $uri)
    || preg_match('#(^|/)\.(?!well-known(/|$))#', $uri)
    || preg_match('#\.(sql|sql\.gz|bak|backup|old|orig|swp|log|env|ini|sh|scss|lock)$#i', $uri);

if ($isDenied) {
    http_response_code(403);
    return true;
}

$isPublicStaticFile = $uri !== '/'
    && $file !== false
    && is_file($file)
    && strpos($file, $root.DIRECTORY_SEPARATOR) === 0
    && strpos($file, __DIR__.DIRECTORY_SEPARATOR) !== 0
    && ! preg_match('#\.(php[0-9]?|phtml|phar|pht|phps|inc)$#i', $file);

if ($isPublicStaticFile) {
    return false;
}

$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['SCRIPT_FILENAME'] = $root.'/index.php';

require $root.'/index.php';

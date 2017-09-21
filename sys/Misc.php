<?php
namespace Mihajlija\Oglasi\Sys;

class Misc {
    public static function link($url) {
        return \Configuration::BASE_URL . $url;
    }

    public static function url($url, $title, $class = '') {
        echo '<a href="' . static::link($url) . '" class="' . $class . '">' . htmlspecialchars($title) . '</a>';
    }

    public static function redirect($url) {
        ob_clean();
        header('Location: ' . static::link($url));
        exit;
    }
}

<?php
class Misc {
    public static function link($url) {
        return Configuration::BASE_URL . $url;
    }

    public static function url($url, $title, $class = '') {
        echo '<a href="' . Misc::link($url) . '" class="' . $class . '">' . htmlspecialchars($title) . '</a>';
    }

    public static function redirect($url) {
        ob_clean();
        header('Location: ' . Misc::link($url));
        exit;
    }
}

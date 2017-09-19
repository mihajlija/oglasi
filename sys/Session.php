<?php

class Session {
    public static function begin() {
        session_start();
    }

    public static function end() {
        self::clean();
        session_destroy();
    }

    public static function clean() {
        $_SESSION = [];
    }

    public static function isValid(string $keyName) {
        return preg_match('/^[a-z][a-z0-9_]*$/', $keyName);
    }

    public static function exists(string $keyName) {
        if (self::isValid($keyName)) {
            return isset($_SESSION[$keyName]);
        } else {
            return false;
        }
    }

    public static function set(string $keyName, $value) {
        if (self::isValid($keyName)) {
            $_SESSION[$keyName] = $value;
        }
    }

    public static function get(string $keyName, $default = '') {
        if (self::isValid($keyName) and self::exists($keyName)) {
            return $_SESSION[$keyName];
        } else {
            return $default;
        }
    }

    public static function delete(string $keyName) {
        if (self::isValid($keyName) and self::exists($keyName)) {
            unset($_SESSION[$keyName]);
        }
    }
}

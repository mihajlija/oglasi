<?php
abstract class Configuration {
    const DB_HOST = 'localhost';
    const DB_NAME = 'projekat';
    const DB_USER = 'root';
    const DB_PASS = '';

    const BASE_PATH = '/Oglasi/';
    const BASE_URL = 'http://localhost' . Configuration::BASE_PATH;

    const USER_SALT = '6086hgodfhgouhy98ugodfgod6';

    const ITEMS_PER_PAGE = 20;
}

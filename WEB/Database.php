<?php

declare(strict_types=1);

const DB_HOST = 'https://tp-epua.univ-savoie.fr/phpMyAdmin/index.php';
const DB_USER_NAME = 'root';
const DB_PASSWORD  = '';
const DB_NAME = 'Proj631';

final class Database {
    private static ?mysqli $conn = null;

    public static function setup(): void {
        self::connect_db();
    }

    public static function connect_db(): void {
        self::$conn = new mysqli(DB_HOST, DB_USER_NAME, DB_PASSWORD, DB_NAME);

        if (self::$conn->connect_error) {
            throw new Exception('Erreur de connexion à la base de données: ' . self::$conn->connect_error);
        }

        self::$conn->set_charset('utf8');
    }

    public static function getConn(): mysqli {
        if (self::$conn === null) {
            self::setup();
        }

        return self::$conn;
    }
}

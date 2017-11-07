<?php
class Database {
    private static $dsn = 'mysql:host=sql1.njit.edu;dbname=am988';
    private static $username = 'am988';
    private static $password = 'IvCVtGzJ';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo $error_message;
                exit();
            }
        }
        return self::$db;
    }
}
?>
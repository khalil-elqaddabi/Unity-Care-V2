<?php
class Database {

    private string $host = 'localhost';
    private string $dbname = 'utility_care_v2';
    private string $username = 'root';
    private string $password = '';
    private string $charset = 'utf8mb4';

    private static ?PDO $conn = null;

    private function __construct() {} 

    public static function getConnection(): PDO
    {
        if (self::$conn === null) {
            $host = 'localhost';
            $dbname = 'utility_care_v2';
            $username = 'root';
            $password = '';
            $charset = 'utf8mb4';

            try {
                self::$conn = new PDO(
                    "mysql:host=$host;dbname=$dbname;charset=$charset",
                    $username,
                    $password
                );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("connection failed ... " . $e->getMessage());
            }
        }

        return self::$conn;
    }
}

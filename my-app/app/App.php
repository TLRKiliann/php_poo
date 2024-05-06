<?php

    namespace App;

    class App
    {
        const DB_NAME = 'mytable';
        const DB_HOST = '192.168.18.9';
        const DB_PORT = 3306;
        const DB_USER = 'koala33';
        const DB_PASS = 'Ko@l@tr3379';

        private static $database;

        /**
         * @return $database class (object)
         */
        public static function getDatabase()
        {
            if (self::$database === null) {
                self::$database = new Database(self::DB_NAME, self::DB_HOST, self::DB_PORT, 
                self::DB_USER, self::DB_PASS);
            }
            return self::$database;
        }
    }
?>
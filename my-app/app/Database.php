<?php
    namespace App;

    class Database
    {
        private $db_name;
        private $db_host;
        private $db_port;
        private $db_user;
        private $db_passwd;

        /**
         * @param $db_name string $db_host string $db_port int $db_user string $db_passwd string
         * @var $db_name = "mytable"
         */
        public function __construct($db_name, $db_host = '192.168.18.9',
            $db_port = 3306, $db_user = 'koala33', $db_passwd = 'Ko@l@tr3379') {
            $this->db_name = $db_name;
            $this-> $db_host;
            $this->db_port = $db_port;
            $this->db_user = $db_user;
            $this->db_passwd = $db_passwd;
        }

        /**
         * @return $this->pdo array
         */
        private function getPdo() {
            if ($this->$pdo === null) {
                $pdo = new PDO('mysql:dbname=mytable;host=192.168.18.9;port:3306', 'koala33', 'Ko@l@tr3379');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo;
            }
            return $this->pdo;   
        }

        /**
         * @return $data object
         */
        public function query($statement) {
            $req = $this->getPdo()->query($statement);
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
    }
?>
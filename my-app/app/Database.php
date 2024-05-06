<?php
    namespace App;

    use \PDO;

    class Database
    {
        private $db_name;
        private $db_host;
        private $db_port;
        private $db_user;
        private $db_passwd;
        private $pdo;

        /**
         * @param $db_name string 
         * @param $db_host string 
         * @param $db_port int 
         * @param $db_user string 
         * @param $db_passwd string
         */
        public function __construct($db_name, $db_host = '192.168.18.9',
            $db_port = 3306, $db_user = 'koala33', $db_passwd = 'Ko@l@tr3379') {
            $this->db_name = $db_name;
            $this->db_host = $db_host;
            $this->db_port = $db_port;
            $this->db_user = $db_user;
            $this->db_passwd = $db_passwd;
        }

        /**
         * @return $this->pdo array
         */
        private function getPdo() {
            if ($this->pdo === null) {
                $pdo = new PDO('mysql:dbname=mytable;host=192.168.18.9;port=3306', 'koala33', 'Ko@l@tr3379');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo;
            }
            return $this->pdo;   
        }

        /**
         * @param $statement string
         * @param $class_name string
         * @return $data object
         */
        public function query($statement, $class_name) {
            $req = $this->getPdo()->query($statement);
            $data = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
            return $data;
        }
        
        /**
         * @param $statement array
         * @param $arg string
         * @param $class_name string
         * @param $one boolean
         * @return $data array or object of arrays
         */
        public function prepare($statement, $arg, $class_name, $one = false) {
            $req = $this-> getPdo()->prepare($statement);
            $req->execute($arg);
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
            if ($one) {
                $data = $req->fetch();
            } else {
                $data = $req->fetchAll();
            }
            //$data = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
            return $data;
        }
    }
?>
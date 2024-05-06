<?php
    declare(strict_types=1);

    namespace App;

    class Game
    {
        private $username;
        private $atk;
        private $score;

        /**
         * @param $u string
         * @param $a int
         * @param $s int
         */
        public function __construct(string $u = null, int $a, int $s) {
            $this->username = $u;
            $this->atk = $a;
            $this->score = $s;
        }

        /**
         * @return $username string
         */
        public function get_name(): string {
            return $this->username;
        }

        /**
         * @return $username int
         */
        public function get_atk(): int {
            return $this->atk;
        }

        /**
         * @return $username int
         */
        public function get_life(): int {
            return $this->score;
        }
    }
?>
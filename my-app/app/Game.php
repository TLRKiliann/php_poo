<?php
    declare(strict_types=1);

    namespace App;

    class Game
    {
        private $username;
        private $atk;
        private $score;

        public function __construct(string $u = null, int $a, int $s) {
            $this->username = $u;
            $this->atk = $a;
            $this->score = $s;
        }

        public function get_name(): string {
            return $this->username;
        }

        public function get_atk(): int {
            return $this->atk;
        }

        public function get_life(): int {
            return $this->score;
        }
    }
?>
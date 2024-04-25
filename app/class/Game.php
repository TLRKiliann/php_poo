<?php
    declare(strict_types=1);

    class Game
    {
        private $username;
        private $score;

        public function __construct(string $u ,int $s) {
            $this->username = $u;
            $this->score = $s;
        }

        public function getData(): void {
            echo $this->username . " " . $this->score;
        }

        public function getScore(): int {
            return $this->score;
        }
    }
?>
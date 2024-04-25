<?php
    declare(strict_types=1);

    class Game
    {
        private $username;
        private $atk;
        private $score;

        public function __construct(string $u , int $a, int $s) {
            $this->username = $u;
            $this->atk = $a;
            $this->score = $s;
        }

        public function get_atk(): int {
            $this->atk += 20;
            return $this->atk;
        }

        public function get_data(): void {
            echo '<p>Player: ' . $this->username . ' Score: ' . $this->score . '</p>';
        }

        public function get_score(): int {
            $this->score -= $this->atk;
            return $this->score;
        }
    }
?>
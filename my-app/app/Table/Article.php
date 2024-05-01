<?php
    namespace App\Table;

    class Article
    {
        public function getUrl() {
            return '../public/index.php?p=article&id=' . $this->id;
        }
    
        public function getExtrait() {
            return $this->content;
        }
    }
?>
<?php
    namespace App\Table;

    class Article
    {
        /*
            Avoid SQL injection by $_GET['id']
        */
        public function getUrl() {
            return '../public/index.php?p=article&id=' . $this->id;
        }
    
        public function getExtrait() {
            $html = '<p>' . $this->content . '</p>';
            $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';
            return $html;
        }
    }
?>
<?php
    namespace App\Table;

    use App\App;

    class Article
    {
        /*
        public function __get($key)
        {
            var_dump($key)
            $method = 'get' . ucfirst($key); //depreciated
            $this->$key = $this->$method();
            return $this->$key;
        }
        */

        public static function getLast()
        {
            return App::getDatabase()->query('SELECT * FROM articles', __CLASS__);
        }

        public static function getArt()
        {
            return App::getDatabase()->prepare('SELECT * FROM articles WHERE id = ?', [$_GET['id']], __CLASS__, true); 
        }

        //Avoid SQL injection by $_GET['id']
        public function getUrl() {
            return 'index.php?p=article&id=' . $this->id;
        }
    
        public function getExtrait() {
            $html = '<p>' . $this->content . '</p>';
            $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';
            return $html;
        }
    }
?>
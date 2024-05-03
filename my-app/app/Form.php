<?php
    declare(strict_types=1);

    namespace App;
    use PDO;
    
    class Form
    {
        private $fields = array();

        public function add_fields(string $name, string $type, string $label) {
            $this->fields[] = array(
                'name' => $name,
                'type' => $type,
                'label' => $label
            );
        }

        public function generator(): string {
            $formHtml = '<form action="confirmation.php" method="post">';
            foreach($this->fields as $field) {
                $formHtml .= '<div class="input-lbl">';
                $formHtml .= '<label>' . $field['label'] . ': </label>';
                /*
                    Just for fun you can test :
                    $formHtml .= htmlspecialchars('<input type="' . $field['type'] . '" name="' . $field['name'] . '">');
                */
                $formHtml .= '<input type="' . $field['type'] . '" name="' . $field['name'] . '">';
                $formHtml .= '</div>';
            }
            $formHtml .= '<input type="submit" value="submit" class="submit-btn">';
            $formHtml .= '</form>';
            return $formHtml;
        }

        public function validate_credentials($username, $password): bool {

            $pdo = new PDO("mysql:host=192.168.18.9;dbname=mytable", "koala33", "Ko@l@tr3379");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $pdo->prepare("SELECT password FROM users WHERE username = :username");
            $stmt->execute(array(':username' => $username));
        
            $hashed_password = $stmt->fetchColumn();
        
            if ($hashed_password && password_verify($password, $hashed_password)) {
                return true;
            } else {
                return false;
            }
        }
    }

/*
        public function validate_credentials($username, $password): bool {
            $simulated_database = array(
                array("username" => "Esteban", "password" => "123456"),
                array("username" => "utilisateur2", "password" => "motdepasse2"),
            );
    
            foreach ($simulated_database as $user) {
                if ($user['username'] === $username && $user['password'] === $password) {
                    return true;
                }
            }
            return false;
        }
*/
?>
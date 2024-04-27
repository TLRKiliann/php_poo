<?php
    declare(strict_type=1);

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

            $formHtml = '<form action="Pages/Confirmation.php" method="post">';

            foreach($this->fields as $field) {
                $formHtml .= '<div class="input-lbl">';
                $formHtml .= '<label>' . $field['label'] . ': </label>';
                $formHtml .= '<input type="' . $field['type'] . '" name="' . $field['name'] . '" >';
                $formHtml .= '</div>';
            }
            $formHtml .= '<input type="submit" value="submit" class="submit-btn">';
            $formHtml .= '</form>';
            return $formHtml;
        }

        public function validate_credentials($username, $password): bool {
            // Simulated database
            $simulated_database = array(
                array("name" => "esteban", "password" => "123456"),
                array("name" => "utilisateur2", "password" => "motdepasse2"),
            );
    
            foreach ($simulated_database as $user) {
                if ($user['name'] === $username && $user['password'] === $password) {
                    return true;
                }
            }
            return false;
        }
    }
?>
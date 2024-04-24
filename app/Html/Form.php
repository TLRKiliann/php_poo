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

            $formHtml = '<form method="post">';

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
    }
?>
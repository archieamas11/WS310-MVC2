<?php
class Validator {
    private $errors = [];

    public function validate($data, $rules) {
        foreach ($rules as $field => $validations) {
            foreach ($validations as $validation) {
                if (is_array($validation)) {
                    $method = $validation[0];
                    $param = $validation[1];
                    $this->$method($field, $data[$field] ?? null, $param);
                } else {
                    $this->$validation($field, $data[$field] ?? null);
                }
            }
        }
        return $this->errors;
    }

    private function required($field, $value) {
        if (empty($value)) {
            $this->errors[$field][] = "$field is required.";
        }
    }

    private function string($field, $value) {
        if (!is_string($value)) {
            $this->errors[$field][] = "$field must be a string.";
        }
    }

    private function min($field, $value, $min) {
        if (strlen($value) < $min) {
            $this->errors[$field][] = "$field must be at least $min characters.";
        }
    }

    private function max($field, $value, $max) {
        if (strlen($value) > $max) {
            $this->errors[$field][] = "$field must not exceed $max characters.";
        }
    }

    private function no_double_spaces($field, $value) {
        if (strpos($value, '  ') !== false) {
            $this->errors[$field][] = "$field must not contain double spaces.";
        }
    }

    private function email($field, $value) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = "$field must be a valid email address.";
        }
    }
}
?>
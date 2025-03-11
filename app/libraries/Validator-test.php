<?php
require_once "../controllers/fieldNames.php";

class Validator {
    public $errors = [];

    public function validate($data, $rules) {
        foreach ($rules as $field => $fieldRules) {
            $value = isset($data[$field]) ? trim($data[$field]) : '';

            foreach ($fieldRules as $rule) {
                if (is_array($rule)) {
                    $ruleName = $rule[0];
                    $param = $rule[1];

                    if (method_exists($this, "validate$ruleName")) {
                        $this->{"validate$ruleName"}($field, $value, $param);
                    }
                } else {
                    if (method_exists($this, "validate$rule")) {
                        $this->{"validate$rule"}($field, $value);
                    }
                }
            }
        }

        return $this->errors;
    }

    private function validateRequired($field, $value) {
        if ($value === '') {
            $this->errors[$field][] = getFieldLabel($field) . " is required.";
        }
    }

    private function validateString($field, $value) {
        if (!is_string($value)) {
            $this->errors[$field][] = getFieldLabel($field) . " must be text.";
        }
    }

    private function validateEmail($field, $value) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = getFieldLabel($field) . " must be a valid email.";
        }
    }

    private function validateNoDoubleSpaces($field, $value) {
        if (strpos($value, "  ") !== false) {
            $this->errors[$field][] = getFieldLabel($field) . " must not have double spaces.";
        }
    }

    private function validateDate($field, $value) {
        if (strtotime($value) > strtotime('18 years ago')) {
            $this->errors[$field][] = getFieldLabel($field) . " must be 18 years old or above.";
        }
    }

    private function validateMin($field, $value, $min) {
        if (strlen($value) < $min) {
            $this->errors[$field][] = getFieldLabel($field) . " must have at least $min characters.";
        }
    }

    private function validateMax($field, $value, $max) {
        if (strlen($value) > $max) {
            $this->errors[$field][] = getFieldLabel($field) . " must have no more than $max characters.";
        }
    }
}

<?php
class Validator {
    private $errors = [];
    private const RULES = [
        'email' => 'validateEmail',
        'number' => 'validateNumber',
        'password' => 'validatePassword',
        'string' => 'validateString',
        'min' => 'validateMin',
        'max' => 'validateMax',
        'required' => 'validateRequired',
        'tel' => 'validateTelephone',
        'date' => 'validateDate',
        'no_double_spaces' => 'validateNoDoubleSpaces'
    ];

    public function validate($data, $rules) {
        foreach ($rules as $field => $validations) {
            if (is_array($validations)) {
                foreach ($validations as $validation) {
                    $this->applyValidation($field, $data[$field] ?? null, $validation);
                }
            } else {
                $this->applyValidation($field, $data[$field] ?? null, $validations);
            }
        }
        return $this->errors;
    }

    private function validateDate($field, $value) {
        if (empty($value) || !is_numeric($value) || $value < 18) {
            $this->errors[$field][] = ucfirst($field) . " must be a date and must be 18 years old or above.";
        }
    }

    private function applyValidation($field, $value, $validation) {
        if (is_string($validation)) {
            if (isset(self::RULES[$validation])) {
                $this->{self::RULES[$validation]}($field, $value);
            }
        } elseif (is_array($validation)) {
            $ruleName = $validation[0];
            $param = $validation[1] ?? null;
            if (isset(self::RULES[$ruleName])) {
                $this->{self::RULES[$ruleName]}($field, $value, $param);
            }
        }
    }

    // Validation functions
    private function validateEmail($field, $value) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = "Invalid email format.";
        }
    }

    private function validateRequired($field, $value) {
        if (empty($value)) {
            $this->errors[$field][] = ucfirst($field) . " is required.";
        }
    }

    private function validateNumber($field, $value) {
        if (!is_numeric($value)) {
            $this->errors[$field][] = ucfirst($field) . " must be a number.";
        }
    }

    private function validatePassword($field, $value) {
        if (strlen($value) < 6) {
            $this->errors[$field][] = "Password must be at least 6 characters.";
        }
    }

    private function validateString($field, $value) {
        if (!preg_match("/^[a-zA-Z\s]+$/", $value)) {
            $this->errors[$field][] = ucfirst($field) . " must contain only letters and spaces.";
        }
    }

    private function validateMin($field, $value, $min) {
        if (strlen($value) < $min) {
            $this->errors[$field][] = ucfirst($field) . " must be at least $min characters.";
        }
    }

    private function validateMax($field, $value, $max) {
        if (strlen($value) > $max) {
            $this->errors[$field][] = ucfirst($field) . " must not exceed $max characters.";
        }
    }

    private function validateNoDoubleSpaces($field, $value) {
        if (preg_match("/\s{2,}/", $value)) {
            $this->errors[$field][] = ucfirst($field) . " should not contain double spaces.";
        }
    }

    private function validateTelephone($field, $value) {
        if (!preg_match("/^\+?[0-9]{7,15}$/", $value)) {
            $this->errors[$field][] = ucfirst(str_replace("_", " ", $field)) . " must be a valid telephone number.";
        }
    }
}

?>

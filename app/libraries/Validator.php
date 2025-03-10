<?php
class Validator {
    public $errors = [];

    public function validate($data, $rules) {
        foreach ($rules as $field => $fieldRules) {
            $value = isset($data[$field]) ? trim($data[$field]) : '';

            foreach ($fieldRules as $rule) {
                if (is_array($rule)) {
                    $ruleName = $rule[0];
                    $param = $rule[1];
                    if ($ruleName == 'min') {
                        if (strlen($value) < $param) {
                            $this->errors[$field][] = ucfirst($field) . " must have at least $param characters.";
                        }
                    }
                    if ($ruleName == 'max') {
                        if (strlen($value) > $param) {
                            $this->errors[$field][] = ucfirst($field) . " must have no more than $param characters.";
                        }
                    }
                } else {
                    if ($rule == 'required') {
                        if ($value === '') {
                            $this->errors[$field][] = ucfirst($field) . " is required.";
                        }
                    }
                    if ($rule == 'string') {
                        if (!is_string($value)) {
                            $this->errors[$field][] = ucfirst($field) . " must be text.";
                        }
                    }
                    if ($rule == 'email') {
                        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            $this->errors[$field][] = ucfirst($field) . " must be a valid email.";
                        }
                    }
                    if ($rule == 'no_double_spaces') {
                        if (strpos($value, "  ") !== false) {
                            $this->errors[$field][] = ucfirst($field) . " must not have double spaces.";
                        }
                    }
                    if ($rule == 'date') {
                        if (strtotime($value) > strtotime('18 years ago')) {
                            $this->errors[$field][] = ucfirst($field) . " must be 18 years old or above.";
                        }
                    }
                }
            }
        }
        return $this->errors;
    }
}
?>

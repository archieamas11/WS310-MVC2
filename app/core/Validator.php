<?php
class Validator {
    public static function validate($data, $rules) {
        $errors = [];

        foreach ($rules as $field => $fieldRules) {
            $value = $data[$field] ?? '';

            foreach ($fieldRules as $rule) {
                if (is_array($rule)) {
                    $ruleName = $rule[0];
                    $param = isset($rule[1]) ? $rule[1] : null;
                } else {
                    $ruleName = $rule;
                    $param = null;
                }

                if ($ruleName === 'required' && empty($value)) {
                    $errors[$field][] = ucfirst($field) . " is required.";
                }

                if ($ruleName === 'string' && !is_string($value)) {
                    $errors[$field][] = ucfirst($field) . " must be a string.";
                }

                if ($ruleName === 'date' && !is_string($value) || (strtotime($value) < strtotime('18 years ago'))) {
                    $errors[$field][] = ucfirst($field) . " must be 18 years old or above.";
                }

                if ($ruleName === 'min' && strlen($value) < $param) {
                    $errors[$field][] = ucfirst($field) . " must be at least $param characters.";
                }

                if ($ruleName === 'max' && strlen($value) > $param) {
                    $errors[$field][] = ucfirst($field) . " must not exceed $param characters.";
                }

                if ($ruleName === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errors[$field][] = "Invalid email format.";
                }

                if ($ruleName === 'no_double_spaces' && preg_match('/\s{2,}/', $value)) {
                    $errors[$field][] = ucfirst($field) . " cannot contain double spaces.";
                }
            }
        }
        return $errors;
    }
}
?>

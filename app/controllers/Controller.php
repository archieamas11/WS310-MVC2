<?php
session_start();
require_once "../models/Model.php";
require_once "../libraries/Validator.php";

class Controller {
    private $model;
    private $validator;

    public function __construct() {
        $this->model = new Model();
        $this->validator = new Validator();
    }

    public function submit() {
        $data = [
            "first_name" => $_POST['first_name'] ?? '',
            "dob"        => $_POST['dob'] ?? ''
        ];

        $validationRules = [
            "first_name" => ['string', ['min', 3], ['max', 60], 'no_double_spaces', 'required'],
            "dob"        => ['date', 'required']
        ];

        $errors = $this->validator->validate($data, $validationRules);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors; // ✅ Store errors in session
            $_SESSION['old_data'] = $data; // ✅ Store old input in session
            header("Location: ../public/index.php?page=insert");
            exit();
        } else {
            if ($this->model->insert("test", $data)) {
                header("Location: ../public/index.php?page=insert&success=inserted");
                exit();
            } else {
                header("Location: ../public/index.php?page=insert&error=insert_failed");
                exit();
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new Controller();
    $controller->submit();
}
?>

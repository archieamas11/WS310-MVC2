<?php
require_once "../models/UserModel.php";
require_once "../validators/Validator.php";

class UserController {
    private $model;
    private $validator;

    public function __construct() {
        $this->model = new UserModel();
        $this->validator = new Validator();
    }

    public function create() {
        $errors = [];
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $_POST['first_name'],
                'date_of_birth' => $_POST['date_of_birth']
            ];

            $rules = [
                'first_name' => ['string', ['min', 3], ['max', 60], 'no_double_spaces', 'required'],
                'date_of_birth' => ['required']
            ];

            $errors = $this->validator->validate($data, $rules);

            if (empty($errors)) {
                if ($this->model->insert('users', $data)) {
                    echo "Data inserted successfully!";
                } else {
                    echo "Failed to insert data.";
                }
            }
        }

        require_once "../views/user_form.php";
    }
}
?>
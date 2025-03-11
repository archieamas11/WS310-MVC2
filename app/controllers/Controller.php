<?php
session_start();
require_once "../models/Model.php";
require_once "../libraries/Validator.php";
require_once "../controllers/user-data.php";

class Controller {
    private $model;
    private $validator;


    public function __construct() {
        $this->model = new Model();
        $this->validator = new Validator();
    }

    public function submit() {
        $_POST['full_name']         = trim($_POST['first_name'] . ' ' . $_POST['middle_name'] . ' ' . $_POST['last_name']);
        $_POST['fathers_full_name'] = trim($_POST['father_first_name'] . ' ' . $_POST['father_middle_name'] . ' ' . $_POST['father_last_name']);
        $_POST['mothers_full_name'] = trim($_POST['mother_first_name'] . ' ' . $_POST['mother_middle_name'] . ' ' . $_POST['mother_last_name']);
        $data = getUserData();
        $data["date_created"] = date('Y-m-d H:i:s');
        $validationRules = [
            "first_name"                => ['string', ['min', 3], ['max', 60], 'no_double_spaces', 'required'],
            "middle_name"               => ['string', 'no_double_spaces'],
            "last_name"                 => ['string', ['min', 3], ['max', 60], 'no_double_spaces', 'required'],
            "father_first_name"         => ['string', 'no_double_spaces'],
            "father_middle_name"        => ['string', 'no_double_spaces'],
            "father_last_name"          => ['string', 'no_double_spaces'],
            "mother_first_name"         => ['string', 'no_double_spaces'],
            "mother_middle_name"        => ['string', 'no_double_spaces'],
            "mother_last_name"          => ['string', 'no_double_spaces'],
            "dob"                       => ['date', 'required'],
            "sex"                       => ['select', 'required'],
            "civil_status"              => ['select', 'required'],
            "tin"                       => ['number'],
            "nationality"               => ['string', 'required', 'no_double_spaces'],
            "religion"                  => ['string', 'no_double_spaces'],
            "place_of_birth"            => ['string', 'no_double_spaces'],
            "contact_number"            => ['number', 'required'],
            "email_address"             => ['email', 'required'],
            "telephone_number"          => ['number'],
            "region_code"               => ['select', 'required'],
            "province_code"             => ['select', 'required'],
            "city_code"                 => ['select', 'required'],
            "barangay_code"             => ['select', 'required'],
            "home_address"              => ['string', 'required', 'no_double_spaces'],
            "zipcode"                   => ['number', 'required'],
        ];

        $errors = $this->validator->validate($_POST, $validationRules);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors; // ✅ Store errors in session
            $_SESSION['old_data'] = $_POST; // ✅ Store old input in session
            header("Location: ../public/index.php?page=insert");
            exit();
        } else {
            if ($this->model->insert("tbl_users", $data)) {
                header("Location: ../public/index.php?page=dashboard&success=inserted");
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

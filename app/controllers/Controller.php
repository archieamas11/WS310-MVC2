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

    public function insert() {
        $_POST['full_name']         = trim($_POST['first_name'] . ' ' . $_POST['middle_name'] . ' ' . $_POST['last_name']);
        $_POST['fathers_full_name'] = trim($_POST['father_first_name'] . ' ' . $_POST['father_middle_name'] . ' ' . $_POST['father_last_name']);
        $_POST['mothers_full_name'] = trim($_POST['mother_first_name'] . ' ' . $_POST['mother_middle_name'] . ' ' . $_POST['mother_last_name']);
        $data = getUserData();
        $data["date_created"] = date('Y-m-d H:i:s');
        $validationRules = $this->getValidationRules();
        $errors = $this->validator->validate($_POST, $validationRules);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old_data'] = $_POST;
            header("Location: ../public/index.php?page=insert");
            exit();
        }

        if ($this->model->insert("tbl_users", $data)) {
            header("Location: ../public/index.php?page=dashboard&success=inserted");
            exit();
        } else {
            header("Location: ../public/index.php?page=insert&error=insert_failed");
            exit();
        }
    }

    public function retrieve($id = null) {
        if ($id) {
            return $this->model->get("tbl_users", ["user_id" => $id]);
        }
        return $this->model->getAll("tbl_users");
    }

    public function update($id) {
        if (empty($id)) {
            header("Location: ../public/index.php?page=dashboard&error=missing_id");
            exit();
        }
        $updateData = getUserData();
        if ($this->model->update("tbl_users", $updateData, ["user_id" => $id])) {
            header("Location: ../public/index.php?page=dashboard&success=updated");
            exit();
        } else {
            header("Location: ../public/index.php?page=dashboard&id=$id&error=update_failed");
            exit();
        }
    }

    public function delete($id) {
        if (empty($id)) {
            header("Location: ../public/index.php?page=dashboard&error=missing_id");
            exit();
        }

        if ($this->model->delete("tbl_users", ["user_id" => $id])) {
            header("Location: ../public/index.php?page=dashboard&success=deleted");
            message("Successfully deleted user", "success");
            exit();
        } else {
            header("Location: ../public/index.php?page=dashboard&error=delete_failed");
            exit();
        }
    }

    private function getValidationRules() {
        return [
            "first_name"                => ['string', ['min', 2], ['max', 60], 'no_double_spaces', 'required'],
            "middle_name"               => ['string', 'no_double_spaces'],
            "last_name"                 => ['string', ['min', 2], ['max', 60], 'no_double_spaces', 'required'],
            "father_first_name"         => ['string', ['min', 2], ['max', 60], 'no_double_spaces'],
            "father_middle_name"        => ['string', ['min', 2], ['max', 60], 'no_double_spaces'],
            "father_last_name"          => ['string', ['min', 2], ['max', 60], 'no_double_spaces'],
            "mother_first_name"         => ['string', ['min', 2], ['max', 60], 'no_double_spaces'],
            "mother_middle_name"        => ['string', ['min', 2], ['max', 60], 'no_double_spaces'],
            "mother_last_name"          => ['string', ['min', 2], ['max', 60], 'no_double_spaces'],
            "dob"                       => ['date', 'required'],
            "sex"                       => ['select', 'required'],
            "civil_status"              => ['select', 'required'],
            "tin"                       => ['number', ['min', 9], ['max', 12]],
            "nationality"               => ['string', ['min', 3], ['max', 60], 'required', 'no_double_spaces'],
            "religion"                  => ['string', ['min', 3], ['max', 60], 'no_double_spaces'],
            "place_of_birth"            => ['string', ['min', 3], ['max', 60], 'no_double_spaces'],
            "contact_number"            => ['number', ['min', 7], ['max', 15], 'required'],
            "email_address"             => ['email', ['min', 5], ['max', 60]],
            "telephone_number"          => ['number', ['min', 7], ['max', 15]],
            "region_code"               => ['select', 'required'],
            "province_code"             => ['select', 'required'],
            "city_code"                 => ['select', 'required'],
            "barangay_code"             => ['select', 'required'],
            "home_address"              => ['string', ['min', 3], ['max', 60], 'required', 'no_double_spaces'],
            "zipcode"                   => ['number', ['min', 4], ['max', 10], 'required'],
        ];
    }
}

// Handle Requests
$controller = new Controller();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user_id']) && isset($_POST['update'])) {
        $controller->update($_POST['user_id']);
    } else {
        $controller->insert();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['delete_id'])) {
        $controller->delete($_GET['delete_id']);
    } elseif (isset($_GET['retrieve_id'])) {
        $user = $controller->retrieve($_GET['retrieve_id']);
        echo json_encode($user);
    } else {
        $users = $controller->retrieve();
        echo json_encode($users);
    }
}
?>

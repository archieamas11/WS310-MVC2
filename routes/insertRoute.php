<?php
require_once "../controllers/UserController.php";
require_once "../validations/validator.php";

session_start();
$validator = new Validator();
$userController = new UserController();



$rules = [
    "first_name" => ['string', ['min', 3], ['max', 60], 'no_double_spaces', 'required'],
    "middle_name" => ['string', ['min', 3], ['max', 60], 'no_double_spaces'],
    "last_name" => ['string', ['min', 3], ['max', 60], 'no_double_spaces', 'required'],
    "dob" => ['date', 'required'],
    "sex" => ['string', 'required'],
    "civil_status" => ['required'],
    "tin" => ['string', ['min', 3], ['max', 20]], // Updated: Allow string for TIN
    "nationality" => ['string', ['min', 3], ['max', 60], 'no_double_spaces'],
    "religion" => ['string', ['min', 3], ['max', 60], 'no_double_spaces', 'required'],
    "place_of_birth" => ['string', 'required'],
    "zipcode" => ['string', ['min', 3], ['max', 10], 'required'], // Updated: Allow string for zipcode
    "home_address" => ['string', 'required'],
    "email_address" => ['email', 'required'],
    "contact_number" => ['string', ['min', 3], ['max', 20], 'required'], // Updated: Allow string for contact number
    "telephone_number" => ['string', ['min', 3], ['max', 20]], // Updated: Allow string for telephone number
    // "region_code" => ['string'], // Updated: Allow empty or string
    // "province_code" => ['string'], // Updated: Allow empty or string
    // "city_code" => ['string'], // Updated: Allow empty or string
    // "barangay_code" => ['string'], // Updated: Allow empty or string
    "father_first_name" => ['string', ['min', 3], ['max', 60], 'no_double_spaces'],
    "father_middle_name" => ['string', ['min', 3], ['max', 60], 'no_double_spaces'],
    "father_last_name" => ['string', ['min', 3], ['max', 60], 'no_double_spaces'],
    "mother_first_name" => ['string', ['min', 3], ['max', 60], 'no_double_spaces'],
    "mother_middle_name" => ['string', ['min', 3], ['max', 60], 'no_double_spaces'],
    "mother_last_name" => ['string', ['min', 3], ['max', 60], 'no_double_spaces'],
];

// Validate input data
$validationResult = $validator->validate($_POST, $rules);

$errors = $validationResult['errors'] ?? [];
$validatedData = $validationResult['validatedData'] ?? [];

if (count($errors) > 0) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old_data'] = $_POST;
    header("Location: ../views/insert_data.php");
    exit();
}

$result = $userController->addUser($validatedData);
if ($result) {
    echo "User registered successfully!";
} else {
    echo "Error registering user.";
    // var_dump($validatedData); // Debugging: Show the validated data
}
?>
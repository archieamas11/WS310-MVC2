<?php
function getFieldLabel($field) {
    $fieldNames = [
        'first_name'            => 'First Name',
        'middle_name'           => 'Middle Name',
        'last_name'             => 'Last Name',
        'dob'                   => 'Date of Birth',
        'sex'                   => 'Sex',
        'civil_status'          => 'Civil Status',
        'tin'                   => 'TIN Number',
        'nationality'           => 'Nationality',
        'religion'              => 'Religion',
        'place_of_birth'        => 'Place of Birth',
        'contact_number'        => 'Phone Number',
        'email_address'         => 'Email Address',
        'telephone_number'      => 'Telephone Number',
        'region_code'           => 'Region',
        'province_code'         => 'Province',
        'city_code'             => 'City/Municipality',
        'barangay_code'         => 'Barangay',
        'home_address'          => 'Home Address',
        'zipcode'               => 'Zip Code',
        'father_first_name'     => 'Fathers First Name',
        'father_middle_name'    => 'Fathers Middle Name', 
        'father_last_name'      => 'Fathers Last Name',
        'mother_first_name'     => 'Mother First Name',
        'mother_middle_name'    => 'Mother Middle Name',
        'mother_last_name'      => 'Mother Last Name'
    ];

    return $fieldNames[$field] ?? ucfirst($field);
}
?>

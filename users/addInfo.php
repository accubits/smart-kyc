<?php
/**
 * Created by PhpStorm.
 * User: maria
 * Date: 24/8/17
 * Time: 1:08 PM
 */

include '../libraries/header.php';
include '../class/Authenticate.php';

function onSuccessHandler() {

    global $config,$db,$error,$redis;
    $users = new Users($db,$config,$error,$redis);
    $users->setFirstName($_POST[$config->COL_users_first_name]);
    $users->setLastName($_POST[$config->COL_users_last_name]);
    $users->setGender($_POST[$config->COL_users_gender]);
    $users->setAddress($_POST[$config->COL_users_address]);
    $users->setCity($_POST[$config->COL_users_city]);
    $users->setState($_POST[$config->COL_users_state]);
    $users->setCountryResidence($_POST[$config->COL_users_country_residence]);
    $users->setZip($_POST[$config->COL_users_zip]);
    $users->setMobileCode($_POST[$config->COL_users_mobile_code]);
    $users->setMobileNumber($_POST[$config->COL_users_mobile_number]);
    $users->setDateOfBirth($_POST[$config->COL_users_date_of_birth]);
    $users->setPassportId($_POST[$config->COL_users_passport_id]);
    $users->setIdIssueDate($_POST[$config->COL_users_id_issue_date]);
    $users->setIdValidDate($_POST[$config->COL_users_id_valid_date]);
    $response=$users->addInfo();
    echo json_encode($response);


}


$required = array(
    $config->COL_users_first_name,
    $config->COL_users_last_name,
    $config->COL_users_gender,
    $config->COL_users_address,
    $config->COL_users_city,
    $config->COL_users_state,
    $config->COL_users_country_residence,
    $config->COL_users_zip,
    $config->COL_users_mobile_code,
    $config->COL_users_mobile_number,
    $config->COL_users_date_of_birth,
    $config->COL_users_passport_id,
    $config->COL_users_id_issue_date,
    $config->COL_users_id_valid_date
);

NvooyUtils::onSetAndEmptyCheckHandler($_POST, $required, $required, "onSuccessHandler", "onEmptyHandler", "onNotSetHandler", true);
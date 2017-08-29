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
    $users->setAddress1($_POST[$config->COL_users_address1]);
    $users->setCity($_POST[$config->COL_users_city]);
    $users->setCountryResidence($_POST[$config->COL_users_country_residence]);
    $users->setMobileNumber($_POST[$config->COL_users_mobile_number]);
    $users->setDateOfBirth($_POST[$config->COL_users_date_of_birth]);
    $users->setIdType($_POST[$config->COL_users_id_type]);
    $users->setIdNumber($_POST[$config->COL_users_id_number]);
    $users->setIdIssueDate($_POST[$config->COL_users_id_issue_date]);
    $users->setRegistrationId($_POST[$config->COL_users_userRegistration_unique_id]);

    if(isset($_POST[$config->COL_users_gender])) {

        $users->setGender($_POST[$config->COL_users_gender]);
    }
    if(isset($_POST[$config->COL_users_address2])) {

        $users->setAddress2($_POST[$config->COL_users_address2]);
    }
    if(isset($_POST[$config->COL_users_address3])) {

        $users->setAddress3($_POST[$config->COL_users_address3]);
    }
    if(isset($_POST[$config->COL_users_state])) {

        $users->setState($_POST[$config->COL_users_state]);
    }
    if(isset($_POST[$config->COL_users_zip])) {

        $users->setZip($_POST[$config->COL_users_zip]);
    }
    if(isset($_POST[$config->COL_users_id_valid_date])) {

        $users->setIdValidDate($_POST[$config->COL_users_id_valid_date]);
    }
    $response=$users->addInfo();
    echo json_encode($response);
}

$required = array(

    $config->COL_users_first_name,
    $config->COL_users_last_name,
    $config->COL_users_address1,
    $config->COL_users_city,
    $config->COL_users_country_residence,
    $config->COL_users_mobile_number,
    $config->COL_users_date_of_birth,
    $config->COL_users_id_type,
    $config->COL_users_id_number,
    $config->COL_users_id_issue_date,
    $config->COL_users_userRegistration_unique_id

);

NvooyUtils::onSetAndEmptyCheckHandler($_POST, $required, $required, "onSuccessHandler", "onEmptyHandler", "onNotSetHandler", true);
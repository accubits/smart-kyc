<?php
/**
 * Created by PhpStorm.
 * User: maria
 * Date: 24/8/17
 * Time: 5:50 PM
 */

include '../libraries/header.php';
include '../class/Authenticate.php';

function onSuccessHandler() {

    global $config,$db,$error,$redis;
    $company = new Company($db,$config,$error,$redis);
    $company->setName($_POST[$config->COL_company_name]);
    $company->setPhoneNumber($_POST[$config->COL_company_phone_number]);
    $company->setCompanyUrl($_POST[$config->COL_company_url]);
    $company->setBussinessNature($_POST[$config->COL_company_bussiness_nature]);
    $company->setCustomerTypeQ($_POST[$config->COL_company_customer_type_q]);
    $company->setInfoQ($_POST[$config->COL_company_customer_info_q]);
    $company->setUserUrl($_POST[$config->COL_company_user_url_q]);
    $company->setExptAvgorder($_POST[$config->COL_company_expt_avgorder_q]);
    $company->setActivityNatureQ($_POST[$config->COL_company_activity_nature_q]);
    $company->setBankdetailsQ($_POST[$config->COL_company_bankdetails_q]);
    $company->setUserId($_POST[$config->COL_users_userRegistration_unique_id]);
    $response=$company->addCompanyInfo();
    echo json_encode($response);

}


$required = array(
    $config->COL_company_name,
    $config->COL_company_phone_number,
    $config->COL_company_url,
    $config->COL_company_bussiness_nature,
    $config->COL_company_customer_type_q,
    $config->COL_company_customer_info_q,
    $config->COL_company_user_url_q,
    $config->COL_company_expt_avgorder_q,
    $config->COL_company_activity_nature_q,
    $config->COL_company_bankdetails_q,
    $config->COL_users_userRegistration_unique_id
);

NvooyUtils::onSetAndEmptyCheckHandler($_POST, $required, $required, "onSuccessHandler", "onEmptyHandler", "onNotSetHandler", true);
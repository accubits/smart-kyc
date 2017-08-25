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
    $company->setTaxId($_POST[$config->COL_company_tax_id]);
    $company->setAddress($_POST[$config->COL_company_address]);
    $company->setCity($_POST[$config->COL_company_city]);
    $company->setState($_POST[$config->COL_company_state]);
    $company->setCountryResidence($_POST[$config->COL_company_country_residence]);
    $company->setZip($_POST[$config->COL_company_zip]);
    $company->setPhoneNumber($_POST[$config->COL_company_phone_number]);
    $company->setUrl($_POST[$config->COL_company_url]);
    $company->setBussinessNature($_POST[$config->COL_company_bussiness_nature]);
    $company->setCustomerTypeQ($_POST[$config->COL_company_customer_type_q]);
    $company->setInfoQ($_POST[$config->COL_company_info_q]);
    $company->setBankdetailsQ($_POST[$config->COL_company_bankdetails_q]);
    $company->setExptMonthvolumeQ($_POST[$config->COL_company_expt_monthvolume_q]);
    $company->setActivityAntureQ($_POST[$config->COL_company_activity_anture_q]);
    $company->setOthers($_POST[$config->COL_company_others]);
    $response=$company->addCompanyInfo();
    echo json_encode($response);


}


$required = array(
    $config->COL_company_name,
    $config->COL_company_tax_id,
    $config->COL_company_address,
    $config->COL_company_city,
    $config->COL_company_state,
    $config->COL_company_country_residence,
    $config->COL_company_zip,
    $config->COL_company_phone_number,
    $config->COL_company_url,
    $config->COL_company_bussiness_nature,
    $config->COL_company_customer_type_q,
    $config->COL_company_info_q,
    $config->COL_company_bankdetails_q,
    $config->COL_company_expt_monthvolume_q,
    $config->COL_company_activity_anture_q,
    $config->COL_company_others
);

NvooyUtils::onSetAndEmptyCheckHandler($_POST, $required, $required, "onSuccessHandler", "onEmptyHandler", "onNotSetHandler", true);
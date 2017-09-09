<?php

/**
 * Created by PhpStorm.
 * User: maria
 * Date: 24/8/17
 * Time: 5:57 PM
 */
class Company
{
    public $unique_id;
    public $name;
    public $phone_number;
    public $company_url;
    public $bussiness_nature;
    public $customer_type_q;
    public $info_q;
    public $user_url;
    public $expt_avgorder;
    public $activity_nature_q;
    public $bankdetails_q;
    public $user_id;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUniqueId()
    {
        return $this->unique_id;
    }

    /**
     * @param mixed $unique_id
     */
    public function setUniqueId($unique_id)
    {
        $this->unique_id = $unique_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return mixed
     */
    public function getCompanyUrl()
    {
        return $this->company_url;
    }

    /**
     * @param mixed $company_url
     */
    public function setCompanyUrl($company_url)
    {
        $this->company_url = $company_url;
    }

    /**
     * @return mixed
     */
    public function getBussinessNature()
    {
        return $this->bussiness_nature;
    }

    /**
     * @param mixed $bussiness_nature
     */
    public function setBussinessNature($bussiness_nature)
    {
        $this->bussiness_nature = $bussiness_nature;
    }

    /**
     * @return mixed
     */
    public function getCustomerTypeQ()
    {
        return $this->customer_type_q;
    }

    /**
     * @param mixed $customer_type_q
     */
    public function setCustomerTypeQ($customer_type_q)
    {
        $this->customer_type_q = $customer_type_q;
    }

    /**
     * @return mixed
     */
    public function getInfoQ()
    {
        return $this->info_q;
    }

    /**
     * @param mixed $info_q
     */
    public function setInfoQ($info_q)
    {
        $this->info_q = $info_q;
    }

    /**
     * @return mixed
     */
    public function getUserUrl()
    {
        return $this->user_url;
    }

    /**
     * @param mixed $user_url
     */
    public function setUserUrl($user_url)
    {
        $this->user_url = $user_url;
    }

    /**
     * @return mixed
     */
    public function getExptAvgorder()
    {
        return $this->expt_avgorder;
    }

    /**
     * @param mixed $expt_avgorder
     */
    public function setExptAvgorder($expt_avgorder)
    {
        $this->expt_avgorder = $expt_avgorder;
    }

    /**
     * @return mixed
     */
    public function getActivityNatureQ()
    {
        return $this->activity_nature_q;
    }

    /**
     * @param mixed $activity_nature_q
     */
    public function setActivityNatureQ($activity_nature_q)
    {
        $this->activity_nature_q = $activity_nature_q;
    }

    /**
     * @return mixed
     */
    public function getBankdetailsQ()
    {
        return $this->bankdetails_q;
    }

    /**
     * @param mixed $bankdetails_q
     */
    public function setBankdetailsQ($bankdetails_q)
    {
        $this->bankdetails_q = $bankdetails_q;
    }



    function __construct(DataBaseHandler $dataBaseHandler, dbconfig $config, Error $error, RedisSession $redis)
    {

        $this->db = $dataBaseHandler;
        $this->config = $config;
        $this->error = $error;
        $this->redis = $redis;

    }

    public function addCompanyInfo()
    {
        $sql = "Select * from ".$this->config->Table_company." where ".
            $this->config->COL_users_userRegistration_unique_id." = '".$this->getUserId()."'";
        $result = $this->db->executeQuery($sql);
        if ($result['CODE'] != 1) {
            $this->error->internalServer();
        }
        $dataArr = array(
            $this->config->COL_company_unique_id => TagdToUtils::getUniqueId(),
            $this->config->COL_company_name => $this->getName(),
            $this->config->COL_company_phone_number => $this->getPhoneNumber(),
            $this->config->COL_company_url => $this->getCompanyUrl(),
            $this->config->COL_company_bussiness_nature => $this->getBussinessNature(),
            $this->config->COL_company_customer_type_q => $this->getCustomerTypeQ(),
            $this->config->COL_company_customer_info_q => $this->getInfoQ(),
            $this->config->COL_company_user_url_q => $this->getUserUrl(),
            $this->config->COL_company_expt_avgorder_q => $this->getExptAvgorder(),
            $this->config->COL_company_activity_nature_q => $this->getActivityNatureQ(),
            $this->config->COL_company_bankdetails_q => $this->getBankdetailsQ(),
            $this->config->COL_users_userRegistration_unique_id => $this->getUserId()
        );

        if (count($result['RESULT']) > 0) {

            foreach ($dataArr as $k => $v) {
                $data[] = "$k='$v'";
            }
            $sql1 = "Update " . $this->config->Table_company . " set " . implode(",", $data) . " where " .
                $this->config->COL_users_userRegistration_unique_id . " = '" . $this->getUserId() . "'";
            $result = $this->db->executeQuery($sql1);
            if ($result['CODE'] != 1) {
                $this->error->internalServer();
            } 
        }
        else {
            $sql1 = $this->db->createInsertQuery($this->config->Table_company, $dataArr);
            $result = $this->db->executeQuery($sql1);
            if ($result['CODE'] != 1) {
                $this->error->internalServer();
            }
            
        }

        $sql = "Update ".$this->config->Table_users." set ".$this->config->COL_users_account_type." = 1 where ".$this->config->COL_users_userRegistration_unique_id." = '".
            $this->getUserId()."' ";

        $result = $this->db->executeQuery($sql);

        if ($result['CODE'] != 1) {

            $this->error->internalServer();
        }

        $response['success'] = true;
        $response['result'] = $dataArr;
        return $response;
    }

}
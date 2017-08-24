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
    public $tax_id;
    public $address;
    public $city;
    public $state;
    public $country_residence;
    public $zip;
    public $country_code;
    public $phone_number;
    public $url;
    public $bussiness_nature;
    public $customer_type_q;
    public $info_q;
    public $bankdetails_q;
    public $expt_monthvolume_q;
    public $activity_anture_q;
    public $others;

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
    public function getTaxId()
    {
        return $this->tax_id;
    }

    /**
     * @param mixed $tax_id
     */
    public function setTaxId($tax_id)
    {
        $this->tax_id = $tax_id;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getCountryResidence()
    {
        return $this->country_residence;
    }

    /**
     * @param mixed $country_residence
     */
    public function setCountryResidence($country_residence)
    {
        $this->country_residence = $country_residence;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * @param mixed $country_code
     */
    public function setCountryCode($country_code)
    {
        $this->country_code = $country_code;
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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
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

    /**
     * @return mixed
     */
    public function getExptMonthvolumeQ()
    {
        return $this->expt_monthvolume_q;
    }

    /**
     * @param mixed $expt_monthvolume_q
     */
    public function setExptMonthvolumeQ($expt_monthvolume_q)
    {
        $this->expt_monthvolume_q = $expt_monthvolume_q;
    }

    /**
     * @return mixed
     */
    public function getActivityAntureQ()
    {
        return $this->activity_anture_q;
    }

    /**
     * @param mixed $activity_anture_q
     */
    public function setActivityAntureQ($activity_anture_q)
    {
        $this->activity_anture_q = $activity_anture_q;
    }

    /**
     * @return mixed
     */
    public function getOthers()
    {
        return $this->others;
    }

    /**
     * @param mixed $others
     */
    public function setOthers($others)
    {
        $this->others = $others;
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

//        $sql = "select " . $this->config->COL_users_passport_id . " from " . $this->config->Table_users . "
//            where " . $this->config->COL_users_passport_id . " = '" . $this->getPassportId() . "'";
//        $result = $this->db->executeQuery($sql);
//
//        if ($result['CODE'] != 1) {
//
//            $this->error->internalServer();
//        }
//
//        if (empty($result['RESULT'])) {
            $dataArr = array(
                $this->config->COL_company_unique_id => TagdToUtils::getUniqueId(),
                $this->config->COL_company_name => $this->getName(),
                $this->config->COL_company_tax_id => $this->getTaxId(),
                $this->config->COL_company_address => $this->getAddress(),
                $this->config->COL_company_city => $this->getCity(),
                $this->config->COL_company_state => $this->getState(),
                $this->config->COL_company_country_residence => $this->getCountryResidence(),
                $this->config->COL_company_zip => $this->getZip(),
                $this->config->COL_company_country_code => $this->getCountryCode(),
                $this->config->COL_company_phone_number => $this->getPhoneNumber(),
                $this->config->COL_company_url => $this->getUrl(),
                $this->config->COL_company_bussiness_nature => $this->getBussinessNature(),
                $this->config->COL_company_customer_type_q => $this->getCustomerTypeQ(),
                $this->config->COL_company_info_q => $this->getInfoQ(),
                $this->config->COL_company_bankdetails_q => $this->getBankdetailsQ(),
                $this->config->COL_company_expt_monthvolume_q => $this->getExptMonthvolumeQ(),
                $this->config->COL_company_activity_anture_q => $this->getActivityAntureQ(),
                $this->config->COL_company_others => $this->getOthers()
            );

            $sql1 = $this->db->createInsertQuery($this->config->Table_company, $dataArr);
            $result = $this->db->executeQuery($sql1);
            if ($result['CODE'] != 1) {
                $this->error->internalServer();
            } else {
                $response['success'] = true;
                $response['result'] = $dataArr;
                return $response;
            }
//        } else {
//            $out['success'] = true;
//            $out['result']['msg'] = "id in list";
//            return $out;
//        }


    }

}
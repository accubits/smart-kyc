<?php

/**
 * Created by PhpStorm.
 * User: maria
 * Date: 24/8/17
 * Time: 2:36 PM
 */
class Users
{
    public $uniqueId;
    public $first_name;
    public $last_name;
    public $gender;
    public $address;
    public $city;
    public $state;
    public $country_residence;
    public $zip;
    public $mobile_code;
    public $mobile_number;
    public $date_of_birth;
    public $passport_id;
    public $id_issue_date;
    public $id_valid_date;
    public $image;

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


    function __construct(DataBaseHandler $dataBaseHandler, dbconfig $config, Error $error, RedisSession $redis)
    {

        $this->db = $dataBaseHandler;
        $this->config = $config;
        $this->error = $error;
        $this->redis = $redis;

    }


    /**
     * @return mixed
     */
    public function getUniqueId()
    {
        return $this->uniqueId;
    }

    /**
     * @param mixed $uniqueId
     */
    public function setUniqueId($uniqueId)
    {
        $this->uniqueId = $uniqueId;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
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
    public function getMobileCode()
    {
        return $this->mobile_code;
    }

    /**
     * @param mixed $mobile_code
     */
    public function setMobileCode($mobile_code)
    {
        $this->mobile_code = $mobile_code;
    }

    /**
     * @return mixed
     */
    public function getMobileNumber()
    {
        return $this->mobile_number;
    }

    /**
     * @param mixed $mobile_number
     */
    public function setMobileNumber($mobile_number)
    {
        $this->mobile_number = $mobile_number;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    /**
     * @param mixed $date_of_birth
     */
    public function setDateOfBirth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;
    }

    /**
     * @return mixed
     */
    public function getPassportId()
    {
        return $this->passport_id;
    }

    /**
     * @param mixed $passport_id
     */
    public function setPassportId($passport_id)
    {
        $this->passport_id = $passport_id;
    }

    /**
     * @return mixed
     */
    public function getIdIssueDate()
    {
        return $this->id_issue_date;
    }

    /**
     * @param mixed $id_issue_date
     */
    public function setIdIssueDate($id_issue_date)
    {
        $this->id_issue_date = $id_issue_date;
    }

    /**
     * @return mixed
     */
    public function getIdValidDate()
    {
        return $this->id_valid_date;
    }

    /**
     * @param mixed $id_valid_date
     */
    public function setIdValidDate($id_valid_date)
    {
        $this->id_valid_date = $id_valid_date;
    }

    public function addInfo()
    {

        $sql = "select " . $this->config->COL_users_passport_id . " from " . $this->config->Table_users . " 
            where " . $this->config->COL_users_passport_id . " = '" . $this->getPassportId() . "'";
        $result = $this->db->executeQuery($sql);

        if ($result['CODE'] != 1) {

            $this->error->internalServer();
        }

        if (empty($result['RESULT'])) {
            $dataArr = array(
                $this->config->COL_users_unique_id => TagdToUtils::getUniqueId(),
                $this->config->COL_users_first_name => $this->getFirstName(),
                $this->config->COL_users_last_name => $this->getLastName(),
                $this->config->COL_users_gender => $this->getGender(),
                $this->config->COL_users_address => $this->getAddress(),
                $this->config->COL_users_city => $this->getCity(),
                $this->config->COL_users_state => $this->getState(),
                $this->config->COL_users_country_residence => $this->getCountryResidence(),
                $this->config->COL_users_zip => $this->getZip(),
                $this->config->COL_users_mobile_code => $this->getMobileCode(),
                $this->config->COL_users_mobile_number => $this->getMobileNumber(),
                $this->config->COL_users_date_of_birth => $this->getDateOfBirth(),
                $this->config->COL_users_passport_id => $this->getPassportId(),
                $this->config->COL_users_id_issue_date => $this->getIdIssueDate(),
                $this->config->COL_users_id_valid_date => $this->getIdValidDate()
            );

            $sql1 = $this->db->createInsertQuery($this->config->Table_users, $dataArr);
            $result = $this->db->executeQuery($sql1);

            if ($result['CODE'] != 1) {
                $this->error->internalServer();
            } else {
                $response['success'] = true;
                $response['result'] = $dataArr;
                return $response;
            }
        } else {
            $out['success'] = true;
            $out['result']['msg'] = "id in list";
            return $out;
        }


    }

    public function uploadImage($files) {

        $uploader     = new FileUploader();
        $uploader->setPath('images');
        $uploadStatus = $uploader->upload($files);

        return $uploadStatus;
//        if ($uploadStatus) {
//            return  $uploader->getFilename();
//        }
//        else
//        {
//            return null;
//        }

    }

    public function insertImage($image){

        $dataArr = array(
            $this->config->COL_usersImage_unique_id => TagdToUtils::getUniqueId(),
            $this->config->COL_usersImage_image => $image,
            $this->config->COL_usersImage_users_unique_id => $this->getUniqueId()
        );
        $sql1 = $this->db->createInsertQuery($this->config->Table_usersImage, $dataArr);
        $result = $this->db->executeQuery($sql1);

        if ($result['CODE'] != 1) {
            $this->error->internalServer();
        } else {
            $response['success'] = true;
            $response['result'] = $dataArr;
            return $response;
        }
    }
}
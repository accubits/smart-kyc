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
    public $address1;
    public $address2;
    public $address3;
    public $city;
    public $state;
    public $country_residence;
    public $zip;
    public $mobile_number;
    public $date_of_birth;
    public $id_issue_date;
    public $id_valid_date;
    public $image;
    public $id_type;
    public $id_number;
    public $userName;
    public $password;
    public $email;
    public $status;
    public $registrationId;

    /**
     * @return mixed
     */
    public function getRegistrationId()
    {
        return $this->registrationId;
    }

    /**
     * @param mixed $registrationId
     */
    public function setRegistrationId($registrationId)
    {
        $this->registrationId = $registrationId;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = TagdToUtils::createPasswordHash($password);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getIdType()
    {
        return $this->id_type;
    }

    /**
     * @param mixed $id_type
     */
    public function setIdType($id_type)
    {
        $this->id_type = $id_type;
    }

    /**
     * @return mixed
     */
    public function getIdNumber()
    {
        return $this->id_number;
    }

    /**
     * @param mixed $id_number
     */
    public function setIdNumber($id_number)
    {
        $this->id_number = $id_number;
    }

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
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @param mixed $address1
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    }

    /**
     * @return mixed
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param mixed $address2
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    }

    /**
     * @return mixed
     */
    public function getAddress3()
    {
        return $this->address3;
    }

    /**
     * @param mixed $address3
     */
    public function setAddress3($address3)
    {
        $this->address3 = $address3;
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



    /*Personal Data Insertion*/

    public function addInfo()
    {

        $sql = "select " . $this->config->COL_users_id_number . " from " . $this->config->Table_users . " 
            where " . $this->config->COL_users_id_number . " = '" . $this->getIdNumber() . "'";
        $result = $this->db->executeQuery($sql);

        if ($result['CODE'] != 1) {

            $this->error->internalServer();
        }

        if (empty($result['RESULT'])) {
            $dataArr = array(
                $this->config->COL_users_unique_id                  => TagdToUtils::getUniqueId(),
                $this->config->COL_users_first_name                 => $this->getFirstName(),
                $this->config->COL_users_last_name                  => $this->getLastName(),
                $this->config->COL_users_gender                     => $this->getGender(),
                $this->config->COL_users_address1                   => $this->getAddress1(),
                $this->config->COL_users_address2                   => $this->getAddress2(),
                $this->config->COL_users_address3                   => $this->getAddress3(),
                $this->config->COL_users_city                       => $this->getCity(),
                $this->config->COL_users_state                      => $this->getState(),
                $this->config->COL_users_country_residence          => $this->getCountryResidence(),
                $this->config->COL_users_zip                        => $this->getZip(),
                $this->config->COL_users_mobile_number              => $this->getMobileNumber(),
                $this->config->COL_users_date_of_birth              => $this->getDateOfBirth(),
                $this->config->COL_users_id_type                    => $this->getIdType(),
                $this->config->COL_users_id_number                  => $this->getIdNumber(),
                $this->config->COL_users_id_issue_date              => $this->getIdIssueDate(),
                $this->config->COL_users_id_valid_date              => $this->getIdValidDate(),
                $this->config->COL_users_userRegistration_unique_id => $this->getRegistrationId()
            );

            $sql1 = "Update ".$this->config->Table_users." set ".implode(",",$dataArr)." where ".
                $this->config->COL_userRegistration_unique_id." = '".$this->getRegistrationId()."'";
//            $sql1 = $this->db->createInsertQuery($this->config->Table_users, $dataArr);
            $result = $this->db->executeQuery($sql1);

            if ($result['CODE'] != 1) {

                $this->error->internalServer();

            } else {

                $response['success'] = true;
                $response['result'] = $dataArr;
                return $response;

            }
        } else {

            $out['success'] = false;
            $out['result']['msg'] = "Already inserted Id Number";
            return $out;
        }

    }

    /*Upload Documents*/

    public function uploadImage($files) {

        $uploader     = new FileUploader();
        $uploader->setPath('images');
        $uploadStatus = $uploader->upload($files);

        return $uploadStatus;
    }

    /*Uploaded Documents save to DB*/

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

    /*Insertion of each doc*/

public function addAllImage($images){

    foreach ($images as $image)
    {
         $this->insertImage($image);
    }

    $response['success'] = true;
    return $response;
}

/*User Registration*/

public function userRegistration(){

    $sql = "select " . $this->config->COL_userRegistration_username . ",".$this->config->COL_userRegistration_email." 
    from " . $this->config->Table_userRegistration . " where 
    " . $this->config->COL_userRegistration_email . " = '" . $this->getEmail() . "' limit 1";
    $result = $this->db->executeQuery($sql);

    if ($result['CODE'] != 1) {

        $this->error->internalServer();
    }

    if (empty($result['RESULT'])) {
        $dataArr = array(
            $this->config->COL_userRegistration_unique_id    => TagdToUtils::getUniqueId(),
            $this->config->COL_userRegistration_username     => $this->getUserName(),
            $this->config->COL_userRegistration_email        => $this->getEmail(),
            $this->config->COL_userRegistration_password     => $this->getPassword()
        );

        $sql1 = $this->db->createInsertQuery($this->config->Table_userRegistration, $dataArr);
        $result = $this->db->executeQuery($sql1);

        if ($result['CODE'] != 1) {

            $this->error->internalServer();

        } else {

            $response['success'] = true;
            $response['result'] = $dataArr;
            return $response;
        }
    } else {

        $out['success'] = false;
        $out['result']['msg'] = "Already Existing Emailid";
        return $out;
    }

}

/*User Login*/

public function signIn(){

    $sql = "Select " . $this->config->COL_userRegistration_unique_id . " from 
    " . $this->config->Table_userRegistration . " where 
    " . $this->config->COL_userRegistration_email . " = '" . $this->getEmail() . "' and 
    " . $this->config->COL_userRegistration_password . " = '" . $this->getPassword() . "' Limit 1";
    $result = $this->db->executeQuery($sql);

    if ($result['CODE'] != 1) {

        $this->error->internalServer();

    } elseif (count($result['RESULT']) == 0) {

        $this->error->string = "Invalid Credentials";
        $this->error->responseCode = 400;
        $this->error->errorHandler();

    } else {

        $token = TagdToUtils::getUniqueId();
        $this->redis->key = $token;
        $unique_id = $result['RESULT'][0][$this->config->COL_userRegistration_unique_id];
        $data = array('uid' => $unique_id);
        $this->redis->setSessionValue($data);
        return array('success' => true,
            'token' => $token,
             'unique_id' => $unique_id);
    }
}


public function readInfo(){

//    $sql = "Select u.*,r.*,i.* from ".$this->config->Table_users." u
//    inner join ".$this->config->Table_userRegistration." r
//    on r.".$this->config->COL_userRegistration_unique_id." = u.".$this->config->COL_users_userRegistration_unique_id."
//    where u.".$this->config->COL_users_userRegistration_unique_id." = '".$this->getRegistrationId()."'";
//    $result = $this->db->executeQuery($sql);

    $sql = "Select u.*,r.* from ".$this->config->Table_userRegistration." r 
    inner join ".$this->config->Table_users." u 
    on r.".$this->config->COL_userRegistration_unique_id." = u.".$this->config->COL_users_userRegistration_unique_id." 
    where u.".$this->config->COL_users_userRegistration_unique_id." = '".$this->getRegistrationId()."'";
    $result = $this->db->executeQuery($sql);

    if($result['CODE']!=1){
        $this->error->internalServer();
    }else {

        $response['success'] = true;
        $response['result'] = $result['RESULT'];
        return $response;
    }

}

    public function addAdmin(){

        $sql = "select " . $this->config->COL_userRegistration_username . ",".$this->config->COL_userRegistration_email.",
         ".$this->config->COL_userRegistration_status." from " . $this->config->Table_userRegistration . " where 
    " . $this->config->COL_userRegistration_email . " = '" . $this->getEmail() . "' limit 1";
        $result = $this->db->executeQuery($sql);

        if ($result['CODE'] != 1) {

            $this->error->internalServer();
        }

        if (empty($result['RESULT'])) {
            $dataArr = array(
                $this->config->COL_userRegistration_unique_id    => TagdToUtils::getUniqueId(),
                $this->config->COL_userRegistration_username     => $this->getUserName(),
                $this->config->COL_userRegistration_email        => $this->getEmail(),
                $this->config->COL_userRegistration_password     => $this->getPassword(),
                $this->config->COL_userRegistration_status       => $this->getStatus()
            );

            $sql1 = $this->db->createInsertQuery($this->config->Table_userRegistration, $dataArr);
            $result = $this->db->executeQuery($sql1);

            if ($result['CODE'] != 1) {

                $this->error->internalServer();

            } else {

                $response['success'] = true;
                $response['result'] = $dataArr;
                return $response;
            }
        } else {

            $out['success'] = false;
            $out['result']['msg'] = "Already Existing Emailid";
            return $out;
        }

    }



    public function readAllInfo(){

        $sql = "Select ".$this->config->COL_userRegistration_status." from 
        ".$this->config->Table_userRegistration." where 
        ".$this->config->COL_userRegistration_unique_id." = '".$this->getUniqueId()."'";
        $result = $this->db->executeQuery($sql);

        if($result['CODE']!=1){

            $this->error->internalServer();
        }
        if (($result['RESULT'][0][$this->config->COL_userRegistration_status]) == "1"){

            $sql = "Select * from ".$this->config->Table_users." ";
            $result = $this->db->executeQuery($sql);

            if($result['CODE']!=1){

                $this->error->internalServer();

            }else {

                $response['success'] = true;
                $response['result'] = $result['RESULT'];
                return $response;
            }
        }

    }

    public function readDetails(){

        $sql = "Select * from 
        ".$this->config->Table_userRegistration." u join ".$this->config->Table_company." c 
        on c.".$this->config->COL_users_userRegistration_unique_id." = u.".
            $this->config->COL_users_userRegistration_unique_id." where 
        ".$this->config->COL_userRegistration_unique_id." = '".$this->getUniqueId()."'";
        $result = $this->db->executeQuery($sql);

        if($result['CODE']!=1){

            $this->error->internalServer();
        }
        $response['success'] = true;
        $response['result'] = $result['RESULT'];
        return $response;

    }

}
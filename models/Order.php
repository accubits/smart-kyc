<?php

/**
 * Created by PhpStorm.
 * User: accubits
 * Date: 04/09/17
 * Time: 2:44 PM
 */
class Order
{

    private $uniqueId;
    private $user_unique;
    private $name;
    private $country;
    private $email;
    private $phone;
    private $amount;
    private $type;
    private $message;
    private $status;

    function __construct(DataBaseHandler $dataBaseHandler, dbconfig $config, Error $error)
    {
        $this->db = $dataBaseHandler;
        $this->config = $config;
        $this->error = $error;
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
    public function getUserUnique()
    {
        return $this->user_unique;
    }

    /**
     * @param mixed $user_unique
     */
    public function setUserUnique($user_unique)
    {
        $this->user_unique = $user_unique;
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
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
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
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
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

    public function addOrder() {

        $dataArr = [
            $this->config->COL_order_uniqueId=> TagdToUtils::getUniqueId(),
            $this->config->COL_order_user_uniqueId=> $this->getUserUnique(),
            $this->config->COL_order_name         => $this->getName(),
            $this->config->COL_order_country => $this->getCountry(),
            $this->config->COL_order_email        => $this->getEmail(),
            $this->config->COL_order_phone        => $this->getPhone(),
            $this->config->COL_order_amount    => $this->getAmount(),
            $this->config->COL_order_type         => $this->getType(),
            $this->config->COL_order_message      => $this->getMessage()
        ];

        $sql1 = $this->db->createInsertQuery($this->config->Table_order, $dataArr);
        $result = $this->db->executeQuery($sql1);

        if ($result['CODE'] != 1) {

            $this->error->internalServer();

        } else {

            $response['success'] = true;
            $response['result'] = 'Order placed successfully';
            return $response;
        }
        
    }
}
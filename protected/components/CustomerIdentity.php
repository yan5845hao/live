<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class CustomerIdentity extends CUserIdentity
{
    const ERROR_EMPTY_PASSWORD = 11 ;
    const ERROR_NOT_ACTIVE = 10;

    private $_id;
    private $user = null;

    public function __construct($username = '', $password = '')
    {
        parent::__construct($username, $password);
    }
    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $customer = Customer::model()->findByAttributes(array('phone'=>$this->username));
        if ($customer === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (!$this->validatePassword($customer->password,$this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID_INVALID;
        else {
            $this->_id = $customer->customer_id;
            $this->username = $customer->phone;
            $this->user = $customer ;
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode == self::ERROR_NONE;
    }
    public function validatePassword($encrypted , $plain){
        if ($encrypted == Customer::model()->md5($plain)) {
            return true;
        } else {
            return false;
        }
    }
    public function assignCustomer($customer){
        $this->_id = $customer->customer_id;
        $this->username = $customer->phone;
        $this->user = $customer;
        $this->errorCode = self::ERROR_NONE;
        $this->errorCode = self::ERROR_NONE;
        return $this->errorCode == self::ERROR_NONE;
    }

    /**
     * @return integer the ID of the user record
     */
    public function getId()
    {
        return $this->_id;
    }
}
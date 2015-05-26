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

    private $user_id;
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
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->user_id = $customer->customer_id;
            $phone = @substr($customer->phone, 0, 3) . '****' . @substr($customer->phone, 7, 11);
            $this->username = $customer->nick_name ? $customer->nick_name : $phone;
            $this->user = $customer;
            $customer->last_login = new CDbExpression('NOW()');
            $customer->save();
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
        $this->user_id = $customer->customer_id;
        $phone = @substr($customer->phone, 0, 3) . '****' . @substr($customer->phone, 7, 11);
        $this->username = $customer->nick_name ? $customer->nick_name : $phone;
        $this->user = $customer;
        $customer->last_login = new CDbExpression('NOW()');
        $customer->save();
        $this->errorCode = self::ERROR_NONE;
        return $this->errorCode == self::ERROR_NONE;
    }

    /**
     * @return integer the ID of the user record
     */
    public function getId()
    {
        return $this->user_id;
    }

    public function getPersistentStates()
    {
        return array(
            'level' => $this->user->vip_code,
            'type' => $this->user->customer_type,
            'user_name' => $this->user->user_name,
            'nick_name' => $this->user->nick_name,
            'gender' => $this->user->gender,
            'email' => $this->user->email,
            'last_login' => $this->user->last_login,
            'is_mer' => $this->user->is_mer
        );
    }
}
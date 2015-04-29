<?php
/**
 * Class RegisterForm
 */
class RegisterForm extends CFormModel
{
    public $email = '';
    public $cell_confirm = '';
    public $first_name = '';
    public $password = '';
    public $password_repeat = '';
    public $vvc = '';

    public function rules()
    {
        return array(
            array('password', 'required'),
            array('phone', 'length', 'min' => 7, 'max' => 13),
            array('password', 'length', 'min' => 5, 'max' => 12, 'tooLong' => '请输入5-12个字符的密码。'),
            array('password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => '两次密码输入不一致。')
        );
    }

    public function parseRefererUrl()
    {
        if (!isset($_COOKIE['referer_url'])) {
            if ($_SERVER['HTTP_REFERER'] && !preg_match('/' . $_SERVER['HTTP_HOST'] . '/i', $_SERVER['HTTP_REFERER'])) {
                $referer_url11 = secure_string($_SERVER['HTTP_REFERER']);
                $affiliate_ref_url_cookie = new CHttpCookie('referer_url', $referer_url11);
                $affiliate_ref_url_cookie->expire = time() + AFFILIATE_COOKIE_LIFETIME;
                $affiliate_ref_url_cookie->domain = $this->cookie_domain;
                $affiliate_ref_url_cookie->path = $this->cookie_path;
                Yii::app()->request->cookies['referer_url'] = $affiliate_ref_url_cookie;
            }
        }
    }

    public function attributeLabels()
    {
        return array(
            'cell_confirm' => '手机号',
            'password' => '密码',
            'password_repeat' => '确认密码'
        );
    }

}
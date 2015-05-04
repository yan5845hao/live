<?php
/**
 * Class RegisterForm
 */
class RegisterForm extends CFormModel
{
    public $phone = '';
    public $password = '';

    public function rules()
    {
        return array(
            array('password', 'required', 'message' => '密码不能为空。'),
            array('phone', 'length', 'min' => 7, 'max' => 13, 'tooLong'=>'手机号码不正确', 'tooShort' => '手机号码不正确。'),
            array('password', 'length', 'min' => 5, 'max' => 12, 'tooLong' => '请输入5-12个字符的密码。', 'tooShort' => '请输入5-12个字符的密码。')
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
        );
    }

}
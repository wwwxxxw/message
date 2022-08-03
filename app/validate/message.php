<?php
namespace app\validate;
use think\validate;
class message extends validate
{
        protected $rule = [
            'name' => 'require',
            'mobile' => 'require|mobile',
            'email' => 'require|email',
        ];
        protected $message = [
            'name.require' => '1名称必须填写',
            'mobile.require' => '请输入手机号',
            'mobile.mobile' => '请输入合法的手机号',
            'email.require' => '请输入合法的邮箱',
            'email.email' => '请输入的邮箱',



        ];
}
?>
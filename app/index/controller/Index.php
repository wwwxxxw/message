<?php
namespace app\index\controller;

use app\BaseController;
use think\facade\View;
use think\facade\Db;/*DB门面模式  加载DB连接数据库*/
use app\validate\message;
class Index extends BaseController
{
    public function index()
    {
        {
            $messageDate=Db::name('message')->order('id', 'desc')->paginate(3);
            //print_r($messageDate);
            return View('',[
                'messageDate'=>$messageDate/* 变成二维数组，html调用需要*/
            ]);

        }

    }

    public function hello($name = 'ThinkPHP6')
    {
        return 'hello111,' . $name;
    }


    public function company()
    {
        return '公司简介';
    }
    public function message()
    {

        $data = input('post.'); //input thinkphp中input 是助手函数，点代表POST所有字段过来的都能接收


        try {
            validate(message::class)->check([
                'name' => $data['name'],
                'mobile' => $data['mobile'],
                'email' => $data['email'],
            ]);
        } catch (ValidateException $e) {
                // 验证失败 输出错误信息
          //  dump($e->getError());
           // return json($return);
        }

        $data['time'] =time();  // 获取时间
        $res = Db::name('message') -> insert ($data);
        if($res) {
            return json(['msg'=>'success','code'=>1]);
        }else{
            return json(['msg'=>'失败','code'=>1]);
    }







    }

}

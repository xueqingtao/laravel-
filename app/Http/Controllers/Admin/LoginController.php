<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AdminUsers;
class LoginController extends Controller
{
    //
    /*
     * 登陆页面
     * */
    public function index(Request $request)
    {
                $session=$request->session();
               if($session->has('user')){//如果存在session信息不用登陆
                   return redirect('/admin/home');

               }

            return view('admin.login');
    }

    /*
     * 执行登陆页面
     * 先根据同户名查询账号是否存在
     * 如果不存在提示用户不存在
     * 效验密码是否正确
     * 如果正确登陆成功，否则提示密码错误
     * */
    public function doLogin(Request $request)
    {
            $params=$request->all();


            $return=[
                'code'=>2000,
                'msg'=>'登陆成功'
            ];
                //用户名不能为空
            if(!isset($params['username']) || empty($params['username'])){
                $return=[
                    'code'=>4001,
                    'msg'=>'用户名不能为空'
                ];
                return json_encode($return);
            }

            //密码不能为空
        if(!isset($params['password'])  ||  empty($params['password'])){
            $return=[
                'code'=>4002,
                'msg'=>'密码不能为空'
            ];
            return json_encode($return);
        }

        $userInfo=AdminUsers::getUserByName($params['username']);
      //用户不存在



        if(empty($userInfo)){

            $return=[
                'code'=>4003,
                'msg'=>'用户不存在',
            ];

            return json_encode($return);

        }else{

            //传递过来的参数密码
            $postPwd= md5($params['password']);
                //密码错误2
            if($postPwd !== $userInfo->password ){
                $return=[
                    'code'=>4004,
                    'msg'=>"密码不正确"
                         ];

                return json_encode($return);

            }else{
                //密码正确，执行登陆

                $session =$request->session();//获取session对象
                //存储用户id
                $session->put('user.user_id',$userInfo->id);
                $session->put('user.username',$userInfo->username);
                $session->put('user.image_url',$userInfo->image_url);
                    return json_encode($return);
            }
        }
}
            /*
             * 用户退出页面
             * */
            public function logout(Request $request){
                    //session删除
                $request->session()->forget('user');
                    return redirect('/admin/login');
            }

}


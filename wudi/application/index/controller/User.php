<?php
/**
 * Created by PhpStorm.
 * User: 我
 * Date: 2018/1/1
 * Time: 11:05
 */
namespace app\index\controller;
use think\Controller;

class User extends Controller{
    public function order(){
        $uid=1;
        $orderlist=model('Order')->where(['uid'=>$uid])->order('addtime desc')->select();
        $this->assign('orderlist',$orderlist);
        return $this->fetch();
    }
}
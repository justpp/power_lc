<?php
/**
 * Created by PhpStorm.
 * User: 我
 * Date: 2018/1/1
 * Time: 10:56
 */
namespace app\index\controller;
use think\Controller;

class Order extends Controller{
    public function add(){
        //dump(input('post.'));
        $out_trade_no=input('post.out_trade_no');//订单号
        $subject=input('post.subject');//商品名称
        $total_amount=input('post.total_amount');//商品总价
        $body=input('post.body');//商品描述
        $uid=1;//用户id,实际上线通过session获取登录用户id

        $rs=model('Order')->save([
            'ordersn'=>$out_trade_no,
            'uid'=>$uid,
            'total_amount'=>$total_amount,
            'addtime'=>time(),
            'status'=>0,
            'paystatus'=>0,
            'goodsname'=>$subject,//只限订单一个商品,如果一个订单多个商品的话，创建订单商品表
            'body'=>$body//只限订单一个商品
        ]);
        //添加成功去支付
        if($rs){
            $orderid=model('Order')->getLastInsID();//新增id
            $this->redirect('payment/pay',['orderid'=>$orderid]);
        }else{
            $this->error('订单添加失败');
        }
    }
}
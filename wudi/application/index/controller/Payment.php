<?php
/**
 * Created by PhpStorm.
 * User: 我
 * Date: 2017/12/30
 * Time: 16:30
 */
namespace app\index\controller;
use think\Controller;

class Payment extends Controller{
    public function pay($orderid=0){
        vendor('aliapp.pagepay.service.AlipayTradeService');
        vendor('aliapp.pagepay.buildermodel.AlipayTradePagePayContentBuilder');
        /*  //商户订单号，商户网站订单系统中唯一订单号，必填
                $out_trade_no = trim($_POST['WIDout_trade_no']);
                //订单名称，必填
                $subject = trim($_POST['WIDsubject']);
                //付款金额，必填
                $total_amount = trim($_POST['WIDtotal_amount']);
                //商品描述，可空
                $body = trim($_POST['WIDbody']);*/
        //查询订单表，获得订单信息
        $orderid=input('orderid');
        //dump($orderid);exit;
        $orderInfo=model('Order')->find($orderid);
        $body=$orderInfo['body'];
        $subject=$orderInfo['goodsname'];
        $total_amount=$orderInfo['total_amount'];
        $out_trade_no=$orderInfo['ordersn'];

        $payRequestBuilder= new \AlipayTradePagePayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setOutTradeNo($out_trade_no);

        $config=config('alipay');

        $aop = new \AlipayTradeService($config);
        $response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);


    }
    //跳转地址
    public function returnUrl(){
        //require_once 'pagepay/service/AlipayTradeService.php';
        vendor('aliapp.pagepay.service.AlipayTradeService');

        $arr=input('get.');
        $config=config('alipay');
        $alipaySevice =new \AlipayTradeService($config);
        $result = $alipaySevice->check($arr);
        //接受返回数据
        $ordersn=input('get.out_trade_no');//订单号
        $trade_no=input('get.trade_no');//交易流水号
        //返回信息提示页面
        $orderInfo=model('Order')->where(['ordersn'=>$ordersn])->find();
        $this->assign('orderinfo',$orderInfo);
        if($result){
            /*
             array(12) {
              ["total_amount"] => string(4) "0.01"
              ["timestamp"] => string(19) "2017-12-30 14:55:20"
              ["sign"] => string(344) "FVrjrzyF9tYwUu8wvgj7t9DNktlHLh90PfBex5qNQyLYLu+Kb0w34vx5HwKzJxuyiNezifU4ejiirHzdfOg0IZle2RfjwAeOs0tdPQOjyRnfUcAN7eXccVbwmMHGwDEj3GD5GgFYkH4Bw6RibBHtrimey2uE/uDbgRmpnnX+/Y6vWQAIg7DPIOKr7ESSwbS/zeLQimOSib7hs/R5Di2l0ZESPCDIlY0VhFbDWXhIjNXLegXOa9RzsSRrUxVTcFLx7yhd4fngDaHX/jcRWOPAtZUbVx6WF68GlakMDunq7T4vVgRVrIz2P1xvqFzVeAfvFw2wtp3AHaouUcTVoryX4g=="
              ["trade_no"] => string(28) "2017123021001004280244019266"
              ["sign_type"] => string(4) "RSA2"
              ["auth_app_id"] => string(16) "2016011601098992"
              ["charset"] => string(5) "UTF-8"
              ["seller_id"] => string(16) "2088121823127663"
              ["method"] => string(28) "alipay.trade.page.pay.return"
              ["app_id"] => string(16) "2016011601098992"
              ["out_trade_no"] => string(17) "20171230145327392"
              ["version"] => string(3) "1.0"
            }
            */
            //支付成功，修改订单状态
            $rs=model('Order')->save([
                'trade_no'=>$trade_no,
                'status'=>1,
                'paystatus'=>1
            ],['ordersn'=>$ordersn]);
            return $this->fetch('success');
        }else{
            return $this->fetch('error');
        }
    }
    //异步通知地址
    public function notifyUrl(){
//        require_once 'config.php';
//        require_once 'pagepay/service/AlipayTradeService.php';
        vendor('aliapp.pagepay.service.AlipayTradeService');
        $config=config('alipay');
        $arr=input('post.');
        $alipaySevice = new \AlipayTradeService($config);
        $alipaySevice->writeLog(var_export($_POST,true));//写日志
        $result = $alipaySevice->check($arr);
        if($result){
            $ordersn=$out_trade_no = $_POST['out_trade_no'];//商户订单号
            $trade_no = $_POST['trade_no'];//支付宝交易号
            $trade_status = $_POST['trade_status'];//交易状态
            if($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS'){
                //更改订单状态
                $rs=model('Order')->save([
                    'trade_no'=>$trade_no,
                    'status'=>1,
                    'paystatus'=>1
                ],['ordersn'=>$ordersn]);
            }
            echo "success";	//请不要修改或删除
        }else{
            echo "fail";
        }
    }

}
<?php 
			if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') == false ) {
			
			message('暂不支持非微信上进行微支付');
			}
		$weixinthirdlogin = mysqld_select("SELECT * FROM " . table('thirdlogin') . " WHERE enabled=1 and `code`='weixin'");

			if(empty($weixinthirdlogin)||empty($weixinthirdlogin['id']))
			{
							message('需开启微信登录功能！');
			}
				if($_GP['isok'] == '1') {
					message('支付成功！',WEBSITE_ROOT.mobile_url('myorder'),'success');
				}
				
				$payment = mysqld_select("SELECT * FROM " . table('payment') . " WHERE  enabled=1 and code='weixin' limit 1");
          $configs=unserialize($payment['configs']);
          
$settings=globaSetting(array("weixin_appId","weixin_appSecret"));
        
          	$_CMS['weixin_pay_appid'] = $settings['weixin_appId'];
	//受理商ID，身份标识
$_CMS['weixin_pay_mchId']  = $configs['weixin_pay_mchId'];
	//商户支付密钥Key。审核通过后，在微信发送的邮件中查看
	$_CMS['weixin_pay_paySignKey'] = $configs['weixin_pay_paySignKey'];
	//JSAPI接口中获取openid，审核后在公众平台开启开发模式后可查看
		$_CMS['weixin_pay_appSecret']= $settings['weixin_appSecret'];
          
      	include_once("WxPayPubHelper/WxPayPubHelper.php");
	
			$weixin_openid=get_weixin_openid();
		//=========步骤2：使用统一支付接口，获取prepay_id============
	//使用统一支付接口
	$unifiedOrder = new UnifiedOrder_pub();
	
	//设置统一支付接口参数
	//设置必填参数
	//appid已填,商户无需重复填写
	//mch_id已填,商户无需重复填写
	//noncestr已填,商户无需重复填写
	//spbill_create_ip已填,商户无需重复填写
	//sign已填,商户无需重复填写
	$unifiedOrder->setParameter("openid",$weixin_openid);//商品描述
	$unifiedOrder->setParameter("body",$goodtitle);//商品描述
	//自定义订单号，此处仅作举例
	$timeStamp = time();
	$unifiedOrder->setParameter("out_trade_no",$order['ordersn'].'-'.$order['id']);//商户订单号 
	$unifiedOrder->setParameter("total_fee",$order['price']*100);//总金额
	$unifiedOrder->setParameter("notify_url",WEBSITE_ROOT.'notify/weixin_notify.php');//通知地址 
	$unifiedOrder->setParameter("trade_type","JSAPI");//交易类型
	
	$unifiedOrder->setParameter("product_id",$order['id']);//商品ID
	//非必填参数，商户可根据实际情况选填
	//$unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号  
	//$unifiedOrder->setParameter("device_info","XXXX");//设备号 
	//$unifiedOrder->setParameter("attach","XXXX");//附加数据 
	//$unifiedOrder->setParameter("time_start","XXXX");//交易起始时间
	//$unifiedOrder->setParameter("time_expire","XXXX");//交易结束时间 
	//$unifiedOrder->setParameter("goods_tag","XXXX");//商品标记 
	//$unifiedOrder->setParameter("openid","XXXX");//用户标识
$jsApi = new JsApi_pub();
	$prepay_id = $unifiedOrder->getPrepayId();
	//=========步骤3：使用jsapi调起支付============
	$jsApi->setPrepayId($prepay_id);

	$jsApiParameters = $jsApi->getParameters();
?>

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>微信安全支付</title>

	<script type="text/javascript">

	document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {

			WeixinJSBridge.invoke(
				'getBrandWCPayRequest',
				<?php echo $jsApiParameters; ?>,
				 function(res) {
					if(res.err_msg == 'get_brand_wcpay_request:ok') {
						location.search += '&isok=1';
					} else {
					//	alert('启动微信支付失败, 请检查你的支付参数. 详细错误为: ' + res.err_msg);
							alert('微信支付未完成');
					
						history.go(-1);
					}
				}
			);
		});

	</script>
</head>
<body>
	
</body>
</html>
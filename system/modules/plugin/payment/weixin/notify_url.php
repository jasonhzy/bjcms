<?php
/**
 * 通用通知接口demo
 * ====================================================
 * 支付完成后，微信会把相关支付和用户信息发送到商户设定的通知URL，
 * 商户接收回调信息后，根据需要设定相应的处理流程。
 * 
 * 这里举例使用log文件形式记录回调信息。
*/
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

    //使用通用通知接口
	$notify = new Notify_pub();

	////存储微信的回调
	$xml = $GLOBALS['HTTP_RAW_POST_DATA'];	
	$notify->saveData($xml);
	
	//验证签名，并回应微信。
	//对后台通知交互时，如果微信收到商户的应答不是成功或超时，微信认为通知失败，
	//微信会通过一定的策略（如30分钟共8次）定期重新发起通知，
	//尽可能提高通知的成功率，但微信不保证通知最终能成功。
	if($notify->checkSign() == FALSE){
		$notify->setReturnParameter("return_code","FAIL");//返回状态码
		$notify->setReturnParameter("return_msg","签名失败");//返回信息
	}else{
		$notify->setReturnParameter("return_code","SUCCESS");//设置返回码
	}
	//echo $returnXml;
	
	//==商户根据实际情况设置相应的处理流程，此处仅作举例=======
	 
	
	if($notify->checkSign() == TRUE)
	{
		if ($notify->data["return_code"] == "FAIL") {
			//此处应该更新一下订单状态，商户自行增删操作
			  	mysqld_insert('paylog', array('typename'=>'通信出错','pdate'=>$xml,'ptype'=>'error','paytype'=>'weixin'));
      
					//message('通信出错，支付失败',WEBSITE_ROOT.'index.php?mod=mobile&name=shopwap&do=myorder','error');
		}
		elseif($notify->data["result_code"] == "FAIL"){
			//此处应该更新一下订单状态，商户自行增删操作
			  	mysqld_insert('paylog', array('typename'=>'业务出错','pdate'=>$xml,'ptype'=>'error','paytype'=>'weixin'));
      
			//	message('业务出错，支付失败',WEBSITE_ROOT.'index.php?mod=mobile&name=shopwap&do=myorder','error');
		}
		else{
				mysqld_insert('paylog', array('typename'=>'微支付成功返回','pdate'=>$xml,'ptype'=>'success','paytype'=>'weixin'));
      
				$array_data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);	
				$out_trade_no=explode('-',$array_data['out_trade_no']);
				$ordersn = $out_trade_no[0];
					$orderid = $out_trade_no[1];
				 $order = mysqld_select("SELECT * FROM " . table('shop_order') . " WHERE id = :id and ordersn=:ordersn", array(':id' => $orderid,':ordersn'=>$ordersn));
				if(!empty($order['id']))
				{
					if($order['status']==0)
					{
					mysqld_update('shop_order', array('status'=>1), array('id' =>  $order['id']));
      
					mysqld_insert('paylog', array('typename'=>'支付成功','pdate'=>$xml,'ptype'=>'success','paytype'=>'weixin'));
      
				//	message('支付成功！',WEBSITE_ROOT.mobile_url('myorder',array('status'=>1)),'success');
					}else
					{
								message('该订单不是支付状态无法支付',WEBSITE_ROOT.'index.php?mod=mobile&name=shopwap&do=myorder','error');
	
					}
				}else
				{
					mysqld_insert('paylog', array('typename'=>'未找到相关订单','pdate'=>$xml,'ptype'=>'error','paytype'=>'weixin'));
      
					//message('未找到相关订单',WEBSITE_ROOT.'index.php?mod=mobile&name=shopwap&do=myorder','error');
				}      
		}
		
		//商户自行增加处理流程,
		//例如：更新订单状态
		//例如：数据库操作
		//例如：推送支付完成信息
	}
	mysqld_insert('paylog', array('typename'=>'签名验证失败','pdate'=>$xml,'ptype'=>'error','paytype'=>'weixin'));
      
?>
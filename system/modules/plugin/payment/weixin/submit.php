<?php 
	if(empty($_GP['weixin_appId'])||empty($_GP['weixin_appSecret'])||empty($_GP['weixin_pay_mchId'])||empty($_GP['weixin_pay_paySignKey']))
	{
	message("请填写完整");	
	}
	
   $cfg = array(
						  	'weixin_appId' => $_GP['weixin_appId'],
				   		  'weixin_appSecret' => $_GP['weixin_appSecret']
            );
          refreshSetting($cfg);

$pay_submit_data=array('weixin_pay_mchId'=>
$_GP['weixin_pay_mchId'],'weixin_pay_paySignKey'=>
$_GP['weixin_pay_paySignKey']);

mysqld_update('payment',array('order' => $_GP['pay_order'],'configs'=> serialize($pay_submit_data)) , array('code' => 'weixin'));


	mysqld_update('payment', array('enabled' => '1') , array('code' => 'weixin'));
		      mysqld_update('thirdlogin', array('enabled' =>1) , array('code' => 'weixin'));
?>
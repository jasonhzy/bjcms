<?php 

            mysqld_update('shop_order', array('status' => '1','paytype' => '3'), array('id' => $orderid));

	
            message('订单提交成功，请您收到货时付款！', WEBSITE_ROOT.mobile_url('myorder'), 'success');

?>
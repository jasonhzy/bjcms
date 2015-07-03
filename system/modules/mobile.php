<?php
defined('SYSTEM_IN') or exit('Access Denied');
class modulesAddons  extends BjModule {
	public function do_weixin_notify()
	{		
		global $_CMS;
					include_once("plugin/payment/weixin/notify_url.php");
					exit;
	}
	
}



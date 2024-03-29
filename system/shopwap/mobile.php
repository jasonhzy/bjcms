<?php
defined('SYSTEM_IN') or exit('Access Denied');
class shopwapAddons  extends BjModule {
	public function do_third_loginqq()
	{
			$this->__mobile(__FUNCTION__);
	}
  public function do_myorder()
	{
		$this->__mobile(__FUNCTION__);
	}
	public function do_address()
	{
		$this->__mobile(__FUNCTION__);
	}
		public function do_member_pwd()
	{
		$this->__mobile(__FUNCTION__);
	}
		public function do_member()
	{
			$this->__mobile(__FUNCTION__);
	}
	 public function do_help()
	{
			$this->__mobile(__FUNCTION__);
	}
	 public function do_rechargegold()
	{	
		$this->__mobile(__FUNCTION__);
	}
	 public function do_pay()
	{
    	$this->__mobile(__FUNCTION__);
	}
  public function do_confirm()
	{	
			$this->__mobile(__FUNCTION__);
	}
		public function do_mycart()
	{
			$this->__mobile(__FUNCTION__);
	}
	public function do_detail()
	{
			$this->__mobile(__FUNCTION__);
	}
	public function do_listCategory()
	{
				$this->__mobile(__FUNCTION__);
	}
	public function do_goodlist()
	{
			$this->__mobile(__FUNCTION__);
	}
	public function do_shopindex()
	{
			$this->__mobile(__FUNCTION__);
	}
	public function do_index()
	{
				header("location:".mobile_url('shopindex'));		
	}
	public function do_regedit()
	{
	$this->__mobile(__FUNCTION__);
	}
	public function do_logout()
	{
			member_logout();
	}
	public function do_login()
	{
	$this->__mobile(__FUNCTION__);
	}

	public function do_fansindex()
	{
		$this->__mobile(__FUNCTION__);
	}
		
	 public function getCartTotal() {
       	$member=get_member_account(false);
				$openid =$member['openid'] ;
        $cartotal = mysqld_selectcolumn("select sum(total) from " . table('shop_cart') . " where session_id='".$openid."'");
        return empty($cartotal) ? 0 : $cartotal;
    }
   public function setOrderCredit($openid,$id , $minus = true,$remark='') {
  	 			$order = mysqld_selectall("SELECT * FROM " . table('shop_order') . " WHERE id='{$id}'");
       		if(!empty($order['credit']))
       		{
            if ($minus) {
            	member_credit($openid,$order['credit'],'addcredit',$remark);
                
            } else {
               member_credit($openid,$order['credit'],'usecredit',$remark);
            }
          }
    }
	public function getPaytypebycode($code)
	{
				$paytype=3;
   			if($code=='delivery')
   			{
   					$paytype=3;
   			}
   				if($code=='gold')
   			{
   					$paytype=1;
   			}
   			return $paytype;
	}
	
	  //设置订单商品的库存 minus  true 减少  false 增加
    public function setOrderStock($id = '', $minus = true) {
        $ordergoods = mysqld_selectall("SELECT * FROM " . table('shop_order_goods') . " WHERE orderid='{$id}'");
        foreach ($ordergoods as $item) {
        	$goods = mysqld_select("SELECT * FROM " . table('shop_goods') . "  WHERE id='".$item['goodsid']."'");
       	if($goods['totalcnf']==1)
        	{
        	return;	
        	}
            if ($minus) {
                //属性
                if (!empty($item['optionid'])) {
                    mysqld_query("update " . table('shop_goods_option') . " set stock=stock-:stock where id=:id", array(":stock" => $item['total'], ":id" => $item['optionid']));
                }
                $data = array();
                $data['sales'] = $goods['sales'] + $item['total'];
                mysqld_update('shop_goods', $data, array('id' => $item['goodsid']));
            } else {
                //属性
                if (!empty($item['optionid'])) {
                    mysqld_query("update " . table('shop_goods_option') . " set stock=stock+:stock where id=:id", array(":stock" => $item['total'], ":id" => $item['optionid']));
                }
                $data = array();
                $data['sales'] = $goods['sales'] - $item['total'];
                mysqld_update('shop_goods', $data, array('id' => $item['goodsid']));
            }
        }
    }

		  public function time_tran($the_time) {

        $timediff = $the_time - time();
        $days = intval($timediff / 86400);
        if (strlen($days) <= 1) {
            $days = "0" . $days;
        }
        $remain = $timediff % 86400;
        $hours = intval($remain / 3600);
        ;
        if (strlen($hours) <= 1) {
            $hours = "0" . $hours;
        }
        $remain = $remain % 3600;
        $mins = intval($remain / 60);
        if (strlen($mins) <= 1) {
            $mins = "0" . $mins;
        }
        $secs = $remain % 60;
        if (strlen($secs) <= 1) {
            $secs = "0" . $secs;
        }
        $ret = "";
        if ($days > 0) {
            $ret.=$days . " 天 ";
        }
        if ($hours > 0) {
            $ret.=$hours . ":";
        }
        if ($mins > 0) {
            $ret.=$mins . ":";
        }

        $ret.=$secs;

        return array("倒计时 " . $ret, $timediff);
    }

}



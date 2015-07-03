<?php
			 		$member=get_member_account(true,true);
			 if (checksubmit("submit")) {
					$openid =$member['openid'] ;
			 		if(empty($_GP['charge'])||round($_GP['charge'],2)<=0)
					{
					message("请输入要充值的金额");	
					}
					$crid= 'tr'.date('YmdHis',time()). random(4, 1);
				 $credit_order = pdo_fetch("SELECT * FROM " . tablename('credit_order') . " WHERE crid = '{$tid}'");
				         if(!empty($credit_order['crid']))
				         {
				         		$crid= 'tr'.date('YmdHis',time()). random(4, 1);
				         }
					     $data = array(
			                'openid' => $openid,	
			                'crid' => $crid,
			                'fee' => $_GP['charge'],
			                'status' => 0,
			                'createtime' => TIMESTAMP
			            );
			            pdo_insert('credit_order', $data);
			            
			            
			 	   $params['tid'] = $crid;
			        $params['user'] = $from_user;
			        $params['fee'] = $_GP['charge'];
			        $params['title'] = $_W['account']['name'];
			        $params['virtual'] = true;
			        
			        
			        
			        
			        
			    exit;
				
				}
        include themePage('rechargegold');
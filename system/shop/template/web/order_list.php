<?php defined('SYSTEM_IN') or exit('Access Denied');?>
<?php  include page('header');?>

	<link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/common/css/datetimepicker.css" />
		<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>/addons/common/js/datetimepicker.js"></script>
<style>.label {
  display: inline;
  padding: .2em .6em .3em;
  font-size: 75%;
  font-weight: 700;
  line-height: 1;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: .25em;
}
.label-danger{ background-color:#d9534f;}
.label-success {background-color:#5cb85c;}
 .label-warning{ background-color:#f0ad4e;}
.panel-heading {
  color: #333;
  background-color: #f5f5f5;
  border-color: #ddd;
  padding: 10px 15px;
  border-bottom: 1px solid transparent;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
}
.panel-title {
  margin-top: 0;
  margin-bottom: 0;
  font-size: 16px;
  color: inherit;
}
</style>
<script>
	function cleartime()
	{
	document.getElementById("begintime").value='';
	document.getElementById("endtime").value='';
	}
	</script>
<form action="" method="post">
	
				 <table id="general-table" class="table table-hover " style="width:95%;margin-top:10px" align="center">
					<tbody>
						<tr>
							<td style="vertical-align: middle;font-size: 14px;font-weight: bold;width:120px">订单编号：</td>
			<td  style="width:300px">
<input name="ordersn" type="text" value="<?php  echo $_GP['ordersn'];?>" /> 
			</td>	
			
					<td style="vertical-align: middle;font-size: 14px;font-weight: bold;width:130px">下单时间：</td>
			<td >
<input name="begintime" id="begintime" type="text" value="<?php  echo $_GP['begintime'];?>" readonly="readonly"  /> - <input id="endtime" name="endtime" type="text" value="<?php  echo $_GP['endtime'];?>" readonly="readonly"  /> <a href="javascript:;" onclick="cleartime()">清空</a>
		
			<script type="text/javascript">
		$("#begintime").datetimepicker({
			format: "yyyy-mm-dd hh:ii",
			minView: "0",
			//pickerPosition: "top-right",
			autoclose: true
		});
	</script> 
	<script type="text/javascript">
		$("#endtime").datetimepicker({
			format: "yyyy-mm-dd hh:ii",
			minView: "0",
			autoclose: true
		});
	</script>
			</td>	
						</tr>
					<tr>
											<td style="vertical-align: middle;font-size: 14px;font-weight: bold;">支付方式：</td>
			<td >
				<select style="margin-right:15px;" id="paytype" name="paytype" > 
					 <option value="" <?php  echo empty($_GP['paytype'])?'selected':'';?>>--未选择--</option>
				<?php  if(is_array($payments)) { foreach($payments as $item) { ?>
                 <option value="<?php  echo $item["code"];?>" <?php  echo $item['code']==$_GP['paytype']?'selected':'';?>><?php  echo $item['name']?></option>
                  	<?php  } } ?>
                   </select>
                   
			</td>	
			
					<td style="vertical-align: middle;font-size: 14px;font-weight: bold;">配送方式：</td>
			<td >
<select style="margin-right:15px;" id="dispatch" name="dispatch" >
		 <option value="" <?php  echo empty($_GP['dispatch'])?'selected':'';?>>--未选择--</option>
				<?php  if(is_array($dispatchs)) { foreach($dispatchs as $item) { ?>
                 <option value="<?php  echo $item["id"];?>" <?php  echo $item['id']==$_GP['dispatch']?'selected':'';?>><?php  echo $item['dispatchname']?></option>
                  	<?php  } } ?>
                   </select>
			</td>	
						</tr>
						
								
						
						
							<tr>
											<td style="vertical-align: middle;font-size: 14px;font-weight: bold;">收货人姓名：</td>
			<td >
<input name="address_realname" type="text" value="<?php  echo $_GP['address_realname'];?>" />
			</td>	
			
					<td style="vertical-align: middle;font-size: 14px;font-weight: bold;width:100px">收货人手机：</td>
			<td >
<input name="address_mobile" type="text" value="<?php  echo $_GP['address_mobile'];?>" />
			</td>	
						</tr>
						
						<tr>
							<td ></td>
							<td colspan="3"><input type="submit" name="submit" value=" 查 询 " class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="report" value="report" class="btn btn-warning">导出excel</button></td>
						
						</tr>
					</tbody>
				</table>
			</form><ul class="nav nav-tabs">
	<li <?php  if($status == -99) { ?> class="active"<?php  } ?>><a href="<?php  echo create_url('site',  array('name' => 'shop','do'=>'order','op' => 'display', 'status' => -99))?>">全部</a></li>
	<li <?php  if($status == 0) { ?> class="active"<?php  } ?>><a href="<?php  echo create_url('site',  array('name' => 'shop','do'=>'order','op' => 'display', 'status' => 0))?>">待付款</a></li>
	<li <?php  if($status == 1) { ?> class="active"<?php  } ?>><a href="<?php  echo create_url('site',  array('name' => 'shop','do'=>'order','op' => 'display', 'status' => 1))?>">待发货</a></li>
	<li <?php  if($status == 2) { ?> class="active"<?php  } ?>><a href="<?php  echo create_url('site',  array('name' => 'shop','do'=>'order','op' => 'display', 'status' => 2))?>">待收货</a></li>
	<li <?php  if($status == 3) { ?> class="active"<?php  } ?>><a href="<?php  echo create_url('site',  array('name' => 'shop','do'=>'order','op' => 'display', 'status' => 3))?>">已完成</a></li>
	<li <?php  if($status == -1) { ?> class="active"<?php  } ?>><a href="<?php  echo create_url('site',  array('name' => 'shop','do'=>'order','op' => 'display', 'status' => -1))?>">已关闭</a></li>
		<li <?php  if($status == -2) { ?> class="active"<?php  } ?>><a href="<?php  echo create_url('site',  array('name' => 'shop','do'=>'order','op' => 'display', 'status' => -2))?>">退款中</a></li>
	<li <?php  if($status == -3) { ?> class="active"<?php  } ?>><a href="<?php  echo create_url('site',  array('name' => 'shop','do'=>'order','op' => 'display', 'status' => -3))?>">换货中</a></li>		
		<li <?php  if($status == -4) { ?> class="active"<?php  } ?>><a href="<?php  echo create_url('site',  array('name' => 'shop','do'=>'order','op' => 'display', 'status' => -4))?>">退货中</a></li>
</ul>
		


<div class="main">
	<div style="padding:15px;">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:120px;">订单编号</th>
					<th style="width:100px;">收货人姓名</th>
					<th style="width:80px;">联系电话</th>
					<th style="width:80px;">支付方式</th>
					<th style="width:80px;">配送方式</th>
					<th style="width:50px;">运费</th>
					<th style="width:50px;">总价</th>         
					<th style="width:50px;">状态</th>
					<th style="width:150px;">下单时间</th>
					<th style="width:120px;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td><?php  echo $item['ordersn'];?></td>
					<td><?php  echo $item['address_realname'];?></td>
					<td><?php  echo $item['address_mobile'];?></td>
					<td>
						<?php  if($item['paytypecode']=='bank'){?>	<span class="label label-danger" ><?php } ?><?php  echo $item['paytypename'];?><?php  if($item['paytypecode']=='bank'){?>	</span><?php } ?>
						</td>
				
					<td>
						<?php  echo $dispatchdata[$item['dispatch']]['dispatchname'];?>
						</td>
           <td><?php  echo $item['dispatchprice'];?></td>
			
					<td><?php  echo $item['price'];?> 元</td>
					<td>
															<?php  if($item['status'] == 0) { ?><span class="label label-warning" >待付款</span><?php  } ?>
						<?php  if($item['status'] == 1) { ?><span class="label label-danger" >待发货</span><?php  } ?>
						<?php  if($item['status'] == 2) { ?><span class="label label-warning">待收货</span><?php  } ?>
						<?php  if($item['status'] == 3) { ?><span class="label label-success" >已完成</span><?php  } ?>
						<?php  if($item['status'] == -1) { ?><span class="label label-success">已关闭</span><?php  } ?>
						<?php  if($item['status'] == -2) { ?><span class="label label-danger">退款中</span><?php  } ?>
						<?php  if($item['status'] == -3) { ?><span class="label label-danger">换货中</span><?php  } ?>
						<?php  if($item['status'] == -4) { ?><span class="label label-danger">退货中</span><?php  } ?>
						<?php  if($item['status'] == -5) { ?><span class="label label-success">已退货</span><?php  } ?>
						<?php  if($item['status'] == -6) { ?><span class="label  label-success">已退款</span><?php  } ?>
						
						</td>
					<td><?php  echo date('Y-m-d H:i:s', $item['createtime'])?></td>
		
					<td><a href="<?php  echo web_url('order', array('op' => 'detail', 'id' => $item['id']))?>">查看详情</a></td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
		<?php  echo $pager;?>
	</div>
</div>

<?php  include page('footer');?>

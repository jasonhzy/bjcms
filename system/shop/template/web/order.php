<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header2');?>
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
<div class="main">  
	<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data" onsubmit="return formcheck(this)">
		<input type="hidden" name="id" value="<?php  echo $order['id'];?>">

		<div class="panel-heading" style="margin-top:15px;margin-bottom:15px;">
    <div class="panel-title">基本信息</div>
  </div>
		<table class="tb ">
			<tr>
			
			
			<th style="width:150px"><label for="">订单编号:</label></th>
				<td >
					<?php  echo $order['ordersn']?>
				</td>
			<th style="width:150px"><label for="">订单状态:</label></th>
				<td >
														<?php  if($order['status'] == 0) { ?><span class="label label-warning" >待付款</span><?php  } ?>
						<?php  if($order['status'] == 1) { ?><span class="label label-danger" >待发货</span><?php  } ?>
						<?php  if($order['status'] == 2) { ?><span class="label label-warning">待收货</span><?php  } ?>
						<?php  if($order['status'] == 3) { ?><span class="label label-success" >已完成</span><?php  } ?>
						<?php  if($order['status'] == -1) { ?><span class="label label-success">已关闭</span><?php  } ?>
						<?php  if($order['status'] == -2) { ?><span class="label label-danger">退款中</span><?php  } ?>
						<?php  if($order['status'] == -3) { ?><span class="label label-danger">换货中</span><?php  } ?>
						<?php  if($order['status'] == -4) { ?><span class="label label-danger">退货中</span><?php  } ?>
						<?php  if($order['status'] == -5) { ?><span class="label label-success">已退货</span><?php  } ?>
						<?php  if($order['status'] == -6) { ?><span class="label label-success">已退款</span><?php  } ?>
				</td>
			
		
				

			</tr>
			<tr>
			
			<th ><label for="">下单时间:</label></th>
				<td >
									<?php  echo date('Y-m-d H:i:s', $order['createtime'])?>
				</td>
			
			

				<th ><label for="">总金额:</label></th>
				<td >
						<?php  echo $order['price']?>
				</td>
			</tr>
			
			
			<tr>
				<th ><label for="">支付方式:</label></th>
				<td >
					<?php  echo $order['paytypename'];?>
				</td>
				<th ><label for="">配送方式:</label></th>
				<td >
	
							<?php  echo $dispatchdata[$order['dispatch']]['dispatchname'];?>
				</td>
			</tr>
			</table>
			
			
			
			
			
			
			<div class="panel-heading" style="margin-bottom:15px;">
    <div class="panel-title">收货人信息</div>
  </div>
			
			<table class="tb ">
			
					<tr>
				<th style="width:150px"><label for="">收货人姓名:</label></th>
				<td  style="width:250px">
					<?php  echo $order['address_realname']?>
				</td>
				<th ><label for="">收货地址:</label></th>
				<td >
		<?php  echo $order['address_province'];?><?php  echo $order['address_city'];?><?php  echo $order['address_area'];?><?php  echo $order['address_address'];?>
				</td>
			</tr>
	
			
				<tr>
								<th  style="width:150px"><label for="">联系电话:</label></th>
				<td >
						<?php  echo $order['address_mobile']?>
				</td>
				<th ><label for="">买家留言:</label></th>
				<td >
	<textarea readonly="readonly" style='width:300px;border: none;' type="text"><?php  echo $order['remark'];?></textarea>
				</td>
			</tr>
			
			<?php  if($order['status'] <=-2) { ?>
			<tr>
				<th ><label for="">	<?php  if($order['status'] == -2||$order['status'] == -6) { ?>退款<?php  } ?><?php  if($order['status'] == -3) { ?>换货<?php  } ?><?php  if($order['status'] == -4||$order['status'] == -5) { ?>退货<?php  } ?>原因</label></th>
				<td >
					<textarea readonly="readonly" style='width:300px;border: none;' type="text"><?php  echo $order['rsreson'];?></textarea>		
				</td>
				<th ></th>
				<td>
		
				</td>
			</tr>
			<?php  } ?>
		</table>
		
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:30px;">序号</th>
					<th style="min-width:350px;">商品标题</th>
            <th style="min-width:250px;">商品规格</th>
					<th style="width:100px;">货号</th>
					
          <th style="width:80px;color:red;">成交价</th>
					<th style="width:50px;">数量</th>
				
				</tr>
			</thead>
			<?php  $i=1;?>
			<?php  if(is_array($order['goods'])) { foreach($order['goods'] as $goods) { ?>
			<tr>
				<td><?php  echo $i;$i++?></td>
				<td><?php  echo $goods['title'];?>
                                </td>
                                <td> <?php  if(!empty($goods['optionname'])) { ?><?php  echo $goods['optionname'];?><?php  } ?></td>
				<td><?php  echo $goods['goodssn'];?></td>

         <td style='color:red;font-weight:bold;'><?php  echo $goods['orderprice'];?></td>
				<td><?php  echo $goods['total'];?></td>
				
			</tr>
			<?php  } } ?>
		</table>
				<table class="tb">
		<tr>
				<th  style="width:50px">备注</th>
				<td>
					<textarea style="height:150px;" class="span7" name="remark" cols="70"><?php  echo $order['remark']?></textarea>
				</td>	
					</table>
		<table class="tb" style="margin-top:10px">
			<tr>
				<th  style="width:50px"></th>
				<td>
					<?php  if($order['status']==0) { ?>
						<button type="submit" class="btn btn-danger span2" onclick="return confirm('确认付款此订单吗？'); return false;" name="confrimpay" value="confrimpay">确认付款</button>
					<?php  } ?>
					
					<?php if($order['status'] == 1) { ?>
						<button type="button" class="btn btn-primary span2" name="confirmsend" onclick="$('#modal-confirmsend').modal()" value="confirmsend">确认发货</button>
					
					<?php  } ?>
						 
					<?php  if($order['status'] == 2) { ?>
						<button type="submit" class="btn btn-danger span2" name="cancelsend" onclick="return confirm('取消发货此订单吗？'); return false;" value="cancelsend">取消发货</button>
         <?php  } ?>
						
					
					<?php  if($order['status'] ==2) { ?>
					<button type="submit" class="btn btn-success span2" onclick="return confirm('确认完成此订单吗？'); return false;" name="finish" value="finish">完成订单</button>
				<?php  } ?>
					
							<?php  if(($order['status']==-2||$order['status']==1)&&$order['paytype']!=3) { ?>
						<button type="submit" class="btn btn-danger span2" onclick="return confirm('确认退款此订单吗？'); return false;" name="returnpay" value="returnpay">确认退款</button>
					<?php  } ?>
					
						<?php  if($order['status']==-3) { ?>
						<button type="button" class="btn btn-danger span2" onclick="$('#modal-confirmsend').modal(); " name="resend" value="resend">确认换货</button>
					<?php  } ?>
						<?php  if($order['status']==-4) { ?>
						<button type="submit" class="btn btn-danger span2" onclick="return confirm('确认退货此订单吗？'); return false;" name="returngood" value="returngood">确认退货</button>
					<?php  } ?>
							<?php if ($order['status']==-2||$order['status']==-3||$order['status']==-4){ ?>
					<button type="submit" class="btn span2" name="cancelreturn" onclick="return confirm('此订单要退回申请吗？'); return false;" value="cancelreturn">退回申请</button>
					<?php  } ?>
					<?php  if($order['status']==0||$order['status']==1||$order['status']==2||($order['status']<-1&&$order['status']>-5)) { ?>
					<button type="submit" class="btn span2" name="close" onclick="return confirm('永久关闭此订单吗？'); return false;" value="close">关闭订单</button>
					<?php  } ?>
				</td>
			</tr>
		</table>
		<div id="modal-confirmsend" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true" style=" width:600px;">
			<div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>快递信息</h3></div>
			<div class="modal-body">
				<table class="tb">
					<tbody id="expresspanel">
						<tr>
							<th><label for="">快递公司</label></th>
							<td>
								<select name="express" id='express'>
										<option value="-1" data-name="">无需快递</option>
                  				<?php  include page('expressoption');?>
								</select>
                                                            <input type='hidden' class='input span3' name='expresscom' id='expresscom'  />
							</td>
						</tr>
						<tr>
							<th><label for="">快递单号</label></th>
							<td>
								<input type="text" name="expresssn" class="span5" />
							</td>
						</tr>
					</tbody>
				</table>
				<div id="module-menus"></div>
			</div>
			<div class="modal-footer"><button type="submit" class="btn btn-primary span2" name="confirmsend" value="yes">确认发货</button><a href="#" class="btn" data-dismiss="modal" aria-hidden="true">关闭</a></div>
		</div>
		
	</form>
</div>
<script language='javascript'>
	function jsSelectIsExitItem(objSelect,objItemValue)   
{   
     var isExit = false ;   
     for ( var i=0;objSelect.length>i;i++)   
     {   
         if (objSelect.options[i].value == objItemValue)   
         {   
             isExit = true ;   
             break ;   
         }   
     }        
     return isExit;   
}
				if(jsSelectIsExitItem(document.getElementById("express"),"<?php  echo $order['dispatchexpress'];?>"))
				{
			document.getElementById("express").value='<?php  echo $order['dispatchexpress'];?>';	
				}
     $(function(){
         <?php  if(!empty($express)) { ?>
             $("#express").val("<?php  echo $express['express_url'];?>");
             $("#expresscom").val(  $("#express").find("option:selected").attr("data-name"));
         <?php  } ?>
             
        $("#express").change(function(){
          
            var obj = $(this);  
            var sel =obj.find("option:selected").attr("data-name");
            $("#expresscom").val(  sel.val() );
        });
      
    })
    
</script>
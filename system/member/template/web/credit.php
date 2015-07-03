<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>



	<form   class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
	
	 <table id="general-table" class="table table-hover ectouch-table">
        <tr>
          <td width="200">会员名称:</td>
          <td><div class="col-md-4">
              	<?php  echo $member['realname'];?>
            </div>
          </td>
        </tr>
        <tr>
          <td>联系电话:</td>
          <td><div class="col-md-4">
              			<?php  echo $member['mobile'];?>
            </div>
          </td>
        </tr>
            <tr>
          <td>现有积分</td>
          <td><div class="col-md-4">
                      <?php  echo $member['credit'];?>
            </div>
                     </td>
        </tr>
        
        
                <tr>
          <td>充值备注</td>
          <td><div class="col-md-4">
                          	<input type='text' name='remark' maxlength="20" class="form-control input-sm" value="后台积分充值" />  
            </div>
                     </td>
        </tr>
         
        <tr>
          <td>充值积分</td>
          <td><div class="col-md-4">
          	<input type='text' name='fee' maxlength="20" class="form-control input-sm" value="" />  </div></td>
        </tr>      
        <tr>
          <td></td>
          <td><div class="col-md-4">
          			<input type="hidden" name="op" value="<?php  echo $op;?>">
		<input type="hidden" name="openid" value="<?php  echo $member['openid'];?>">
              	<input type="submit" name="submit" value=" 确定 " class="btn btn-primary" />
              	<input type="reset" value=" 重置 " class="btn btn-default" />
            </div></td>
        </tr>
      </table>
	
	
		
		
		
	</form>
		<table id="list-table" class="table table-bordered table-striped table-hover">
  <tr class="active">
    <th class="text-center" >时间</th>
    <th class="text-center" >类型</th>
    <th class="text-center">积分</th>
    <th class="text-center" >备注</th>
  </tr>
   <?php  if(is_array($list)) { foreach($list as $v) { ?>
   
   <tr>
   <td class="text-center"><?php  echo date('Y-m-d H:i:s',$v['createtime'])?></td>
    <td class="text-center"><?php  echo $v['type']=='addcredit'?'充值':($v['type']=='usecredit'?'消费':'')?></td>
     <td class="text-center"><?php  echo $v['fee']?></td>
      <td class="text-center"><?php  echo $v['remark']?></td>
    </tr>
  			<?php  } } ?>
  		</table>
  
<?php  include page('footer');?>
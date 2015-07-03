<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>

			<form action="">
				<input type="hidden" name="act" value="module" />
				<input type="hidden" name="name" value="member" />
				<input type="hidden" name="do" value="list" />
				<table class="table sub-search">
				<table class="table sub-search">
					<tbody>
						<tr>
							<th style="width:100px;">会员姓名</th>
							<td>
								<input name="realname" type="text" value="<?php  echo $sort['realname'];?>" />
							</td>
						</tr>
						<tr>
							<th style="width:100px;">手机号码</th>
							<td>
								<input name="mobile" type="text" value="<?php  echo $sort['mobile'];?>" />
							</td>
						</tr>
						<tr>
							<th></th>
							<td>
								<input type="submit" name="" value="搜索" class="btn btn-primary">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
			

	<span class="pull-left" style="color:red; padding:10px 10px 0 0;">&nbsp;会员总数：<?php  echo $total;?></span>
			<table id="list-table" class="table table-bordered table-striped table-hover">
  <tr class="active">
    <th class="text-center" >会员姓名</th>
    <th class="text-center" >手机号码</th>
    <th class="text-center">注册时间</th>
    <th class="text-center" >状态</th>
    <th class="text-center" >积分</th>
    <th class="text-center" >余额</th>
     <th class="text-center" >操作</th>
  </tr>
   <?php  if(is_array($list)) { foreach($list as $v) { ?>
								<tr>
									<td class="text-center">
										<?php  echo $v['realname'];?>
									</td>
									<td class="text-center">
										<?php  echo $v['mobile'];?>
									</td>
									<td class="text-center">
										<?php  echo date('Y-m-d',$v['createtime'])?>
									</td>
									<td class="text-center">
									<?php  if($v['status']==0) { ?>
										<span class="label label-important">已禁用</span>
									<?php  } else { ?>
										<span class="label label-success">正常</span>
									<?php  } ?>
									</td>
										<td class="text-center">
												<?php  echo $v['credit'];?>
									</td>
									<td class="text-center">
										<?php  echo $v['gold'];?>
									</td>
									<td class="text-center">
											<?php  if($v['status']==1) { ?>
										<a href="<?php  echo web_url('delete',array('name'=>'member','openid' => $v['openid'],'status' => 0));?>" onclick="return confirm('确定要禁用该账户吗？');">禁用账户</a>
										
											<?php  } else { ?>
										<a href="<?php  echo web_url('delete',array('name'=>'member','openid' => $v['openid'],'status' => 1));?>" onclick="return confirm('确定要恢复该账户吗？');">恢复账户</a>
										
									<?php  } ?>
										&nbsp;&nbsp;<a href="<?php  echo web_url('detail',array('name'=>'member','openid' => $v['openid']));?>">编辑</a>&nbsp;&nbsp;
										<a href="<?php  echo web_url('recharge',array('name'=>'member','openid' => $v['openid'],'op'=>'credit'));?>">积分充值</a>&nbsp;&nbsp;
										<a href="<?php  echo web_url('recharge',array('name'=>'member','openid' => $v['openid'],'op'=>'gold'));?>">余额充值</a>	
									</td>
								</tr>
								<?php  } } ?>
    </table>
  
  
<?php  include page('footer');?>
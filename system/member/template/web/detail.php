<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>



<div class="main">
 <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
		<input type="hidden" name="openid" value="<?php  echo $member['openid'];?>">
		<h4>会员信息</h4>
	 <table id="general-table" class="table table-hover">

			<tr>
				<th ><label for="">会员姓名:</label></th>
				<td >
					 <input type="text" name="realname" id="realname" maxlength="100" class="form-control input-sm"  value="<?php  echo $member['realname'];?>" />
				</td>
				<th ><label for="">联系电话:</label></th>
				<td>
						<input type="text" name="mobile" id="mobile" maxlength="100" class="form-control input-sm"  value="<?php  echo $member['mobile'];?>" />
				</td>
			</tr>
			
			<tr>
				<th><label for="">邮箱:</label></th>
				<td>
								<input type="text" name="email" id="email" maxlength="100" class="form-control input-sm"  value="<?php  echo $member['email'];?>" />
				</td>
				<th><label for="">注册时间:</label></th>
				<td>
					<?php  echo date('Y-m-d H:i:s', $item['createtime'])?>
				</td>
			</tr>
			
			
			<tr>
				<th ><label for="">新密码:</label></th>
				<td >
					 <input type="password" name="password" id="password" maxlength="100" class="form-control input-sm"  value="" />
				</td>
				<th ><label for="">确认密码:</label></th>
				<td>
						<input type="password" name="repassword" id="repassword" maxlength="100" class="form-control input-sm"  value="" />
				</td>
			</tr>
			
			<tr>
			<th><label for="">积分</label></th>
				<td>
					<?php  echo $member['credit'];?>
				</td>
				<th><label for="">余额</label></th>
				<td>
					<?php  echo $member['gold'];?>
				</td>
			</tr>
				<tr>
			<th><label for=""></label></th>
				<td>     <input type="submit" name="submit" value=" 确定 " class="btn btn-primary" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="reset" value=" 重置 " class="btn btn-default" />
				</td>
				<th><label for=""></label></th>
				<td>
				</td>
			</tr>
			
			<tr>
			<th><label for=""></label></th>
				<td>
				</td>
				<th><label for=""></label></th>
				<td>
				</td>
			</tr>
			
			
			
			
				<?php  if(!empty($weixininfo['weixin_openid']))
								{?>
									
											<tr>
			<th><label for="">微信头像</label></th>
				<td><img class="img-rounded" src="<?php  echo $weixininfo['avatar'];?>" width="45px" height="45px" />
				</td>
				<th><label for="">微信性别</label></th>
				<td>
					<?php  echo $weixininfo['gender']=='1'?'男':($weixininfo['gender']=='2'?'女':'保密');?>
				</td>
			</tr>
			<tr>
			<th><label for="">微信昵称</label></th>
				<td>
					<?php  echo $weixininfo['nickname'];?>
				</td>
				<th><label for="">是否关注微信号</label></th>
				<td>
					<?php  echo $weixininfo['follow']=='1'?'关注':'未关注';?>
				</td>
			</tr>	
						<?php		}?>
			
		</table>
		
		
	</form>
</div>
<?php  include page('footer');?>
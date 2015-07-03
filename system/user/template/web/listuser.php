<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<div class="main">
	<div style="padding:15px;">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="min-width:150px;">用户名</th>
					<th style="text-align:right; min-width:60px;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td><?php  echo $item['username'];?></td>
						<td style="text-align:right;">
						<a href="<?php  echo web_url('user', array('op'=>'rule','id' => $item['id']))?>">设置权限</a>
						&nbsp;&nbsp;
						<a href="<?php  echo web_url('user', array('op'=>'changepwduser','id' => $item['id']))?>">修改密码</a>&nbsp;&nbsp;
						<a href="<?php  echo web_url('user', array('op'=>'deleteuser','id' => $item['id']))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;">删除</a>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
		<?php  echo $pager;?>
	</div>
</div>
<?php  include page('footer');?>

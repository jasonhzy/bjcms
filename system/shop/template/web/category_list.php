<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<div class="main">
	<div class="category">
		<form action="" method="post" onsubmit="return formcheck(this)">
				<table id="list-table" class="table table-bordered table-striped table-hover">
  <tr>
				<tr>
					<th style="width:10px;"></th>
					<th style="width:50px;">显示顺序</th>
					<th style="width:80px;">分类名称</th>
					<th style="width:80px;">操作</th>
				</tr>
			<tbody>
			<?php  if(is_array($category)) { foreach($category as $row) { ?>
				<tr>
					<td style="width:10px;"><?php  if(count($children[$row['id']]) > 0) { ?><a href="javascript:;"><i class="icon-chevron-down"></i></a><?php  } ?></td>
					<td style="width:50px;"><input type="text"  style="width:50px"  name="displayorder[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>"></td>
           <td><img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $row['thumb'];?>" width='50' height="50" onerror="$(this).remove()" style='padding:1px;border: 1px solid #ccc;float:left;' />
                                            <div class="type-parent"><?php  echo $row['name'];?>&nbsp;&nbsp;
                                                  <?php  if($row['isrecommand']==1) { ?>
                                                <span class='label label-success'>首页推荐</span>
                                                 <?php  } ?><?php  if($row['enabled']==1) { ?>
                                                <span class='label label-success'>显示</span>
                                                <?php  } else { ?>
                                                <span class='label label-danger'>隐藏</span>
                                                <?php  } ?><?php  if(empty($row['parentid'])) { ?>
                                                <a href="<?php  echo web_url('category', array('parentid' => $row['id'], 'op' => 'post'))?>"><i class="icon-plus-sign-alt"></i> 添加子分类</a><?php  } ?></div></td>
					<td>
					<a href="<?php  echo create_url('mobile',array('name' => 'shopwap','do' => 'goodlist','pcate' =>  $row['id']))?>" target="_blank"><img src="<?php echo RESOURCE_ROOT;?>/addons/shop/images/icon_view.gif" title="查看"></a>&nbsp;&nbsp;
					<a href="<?php  echo web_url('category', array('op' => 'post', 'id' => $row['id']))?>"><img src="<?php echo RESOURCE_ROOT;?>/addons/shop/images/icon_edit.gif" title="编辑"></a>&nbsp;&nbsp;<a href="<?php  echo web_url('category', array('op' => 'delete', 'id' => $row['id']))?>" onclick="return confirm('确认删除此分类吗？');return false;"><img src="<?php echo RESOURCE_ROOT;?>/addons/shop/images/icon_trash.gif" title="删除"></a></td>
				</tr>
				<?php  if(is_array($children[$row['id']])) { foreach($children[$row['id']] as $row) { ?>
				<tr>
					<td style="width:10px;"></td>
					<td style="width:50px;"><input type="text" style="width:50px" name="displayorder[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>"></td>
					<td><img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $row['thumb'];?>" width='50' height="50" onerror="$(this).remove()" style='padding:1px;border: 1px solid #ccc;float:left;margin-left:50px' /><div style="margin-left:50px"><?php  echo $row['name'];?>&nbsp;&nbsp; 
						 <?php  if($row['isrecommand']==1) { ?>
                                                <span class='label label-success'>首页推荐</span>
                                                 <?php  } ?>
						  <?php  if($row['enabled']==1) { ?>
                                                <span class='label label-success'>显示</span>
                                                <?php  } else { ?>
                                                <span class='label label-danger'>隐藏</span>
                                                <?php  } ?></div></td>
					<td>
					<a href="<?php  echo create_url('mobile',array('name' => 'shopwap','do' => 'goodlist','ccate' =>  $row['id']))?>" target="_blank"><img src="<?php echo RESOURCE_ROOT;?>/addons/shop/images/icon_view.gif" title="查看"></a>&nbsp;&nbsp;
					<a href="<?php  echo web_url('category', array('op' => 'post', 'id' => $row['id'], 'parentid'=>$row['parentid']))?>"><img src="<?php echo RESOURCE_ROOT;?>/addons/shop/images/icon_edit.gif" title="编辑"></a>&nbsp;&nbsp;<a href="<?php  echo web_url('category', array('op' => 'delete', 'id' => $row['id']))?>" onclick="return confirm('确认删除此分类吗？');return false;"><img src="<?php echo RESOURCE_ROOT;?>/addons/shop/images/icon_trash.gif" title="删除"></a></td>
				</tr>
				<?php  } } ?>
			<?php  } } ?>
				<tr>
					<td style="width:10px;"></td>
					<td colspan="4">
						<a href="<?php  echo web_url('category', array('op' => 'post'))?>"><i class="icon-plus-sign-alt"></i> 添加新分类</a>
					</td>
				</tr>
				<tr>
					<td style="width:10px;"></td>
					<td colspan="4">
						<input name="submit" type="submit" class="btn btn-primary" value="提交">
						<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
					</td>
				</tr>
			</tbody>
		</table>
		</form>
	</div>
</div>
<?php  include page('footer');?>

<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<div class="main">
	<div class="goods_option">
		<div class="panel-heading">
    <h3 class="panel-title"> <strong><?php echo $goods['title'];?></strong>-商品规格</h3>
  </div>
		<form action="" method="post" onsubmit="return formcheck(this)">
				<table id="list-table" class="table table-bordered table-striped table-hover">
  <tr>
				<tr>
					<th style="width:10px;"></th>
					<th style="width:80px;">规格名称</th>
					<th style="width:80px;">操作</th>
				</tr>
			<tbody>
			<?php  if(is_array($goods_options)) { foreach($goods_options as $row) { ?>
				<tr>
					<td style="width:10px;"><?php  if(count($children[$row['id']]) > 0) { ?><a href="javascript:;"><i class="icon-chevron-down"></i></a><?php  } ?></td>
				   <td><img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $row['thumb'];?>" width='50' height="50" onerror="$(this).remove()" style='padding:1px;border: 1px solid #ccc;float:left;' />
                                            <div class="type-parent"><?php  echo $row['name'];?>&nbsp;&nbsp;商品价格：<?php  echo $row['marketprice'];?>&nbsp;&nbsp;市场价格：<?php  echo $row['productprice'];?>
                                                 </div></td>
					<td> <?php  if(empty($row['parentid'])) { ?>
                                                <a href="<?php  echo web_url('goods_option', array('parentid' => $row['id'], 'op' => 'post','goodid' => $goodid))?>">添加子规格</a><?php  } ?>&nbsp;&nbsp;
                                                <a href="<?php  echo web_url('goods_option', array('op' => 'post', 'id' => $row['id'],'goodid' => $goodid))?>">编辑</a>&nbsp;&nbsp;<a href="<?php  echo web_url('goods_option', array('op' => 'delete', 'id' => $row['id'],'goodid' => $goodid))?>" onclick="return confirm('确认删除此规格吗？');return false;">删除</a></td>
				</tr>
				<?php  if(is_array($children[$row['id']])) { foreach($children[$row['id']] as $row) { ?>
				<tr>
					<td style="width:10px;"></td>
					<td><img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $row['thumb'];?>" width='50' height="50"  onerror="$(this).remove()"  style='padding:1px;border: 1px solid #ccc;float:left;margin-left:50px' /><div style="margin-left:30px"><?php  echo $row['name'];?>&nbsp;&nbsp; &nbsp;&nbsp;商品价格：<?php  echo $row['marketprice'];?>&nbsp;&nbsp;市场价格：<?php  echo $row['productprice'];?>
						</div></td>
					<td><a href="<?php  echo web_url('goods_option', array('op' => 'post', 'id' => $row['id'], 'parentid'=>$row['parentid'],'goodid' => $goodid))?>">编辑</a>&nbsp;&nbsp;<a href="<?php  echo web_url('goods_option', array('op' => 'delete', 'id' => $row['id'],'goodid' => $goodid))?>" onclick="return confirm('确认删除此规格吗？');return false;">删除</a></td>
				</tr>
				<?php  } } ?>
			<?php  } } ?>
				<tr>
					<td style="width:10px;"></td>
					<td colspan="4">
						<a href="<?php  echo web_url('goods_option', array('op' => 'post','goodid' => $goodid))?>"><i class="icon-plus-sign-alt"></i> 添加新规格</a>
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

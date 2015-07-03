<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>

<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>/addons/common/js/jquery-ui-1.10.3.min.js"></script>

<div class="main">
		<form action="" method="post">
      <table id="general-table" style="margin-left:15px;width:100%;max-width:100%">
			<tbody >
				<tr>
				
				<td>
				<li style="float:left;list-style-type:none;">
						<select  style="margin-right:10px;margin-top:10px;width: 150px; height:34px; line-height:28px; padding:2px 0" name="cate_1" onchange="fetchChildCategory(this.options[this.selectedIndex].value)">
							<option value="0">请选择一级分类</option>
							<?php  if(is_array($category)) { foreach($category as $row) { ?>
							<?php  if($row['parentid'] == 0) { ?>
							<option value="<?php  echo $row['id'];?>" <?php  if($row['id'] == $_GP['cate_1']) { ?> selected="selected"<?php  } ?>><?php  echo $row['name'];?></option>
							<?php  } ?>
							<?php  } } ?>
						</select>
						<select style="margin-right:10px;margin-top:10px;width: 150px; height:34px; line-height:28px; padding:2px 0" id="cate_2" name="cate_2">
							<option value="0">请选择二级分类</option>
							<?php  if(!empty($_GP['cate_1']) && !empty($children[$_GP['cate_1']])) { ?>
							<?php  if(is_array($children[$_GP['cate_1']])) { foreach($children[$_GP['cate_1']] as $row) { ?>
							<option value="<?php  echo $row['0'];?>" <?php  if($row['0'] == $_GP['cate_2']) { ?> selected="selected"<?php  } ?>><?php  echo $row['1'];?></option>
							<?php  } } ?>
							<?php  } ?>
						</select>
						
						</li>
						
						
						<li style="float:left;list-style-type:none;">
												<select name="status" style="margin-right:10px;margin-top:10px;width: 100px; height:34px; line-height:28px; padding:2px 0">
							<option value="1" selected>上架中</option>
							<option value="0" >已下架</option>
						</select>
						</li>
						
						<li style="float:left;list-style-type:none;">
											<span>关键字</span>	<input style="margin-right:10px;margin-top:10px;width: 300px; height:34px; line-height:28px; padding:2px 0" name="keyword" id="" type="text" value="<?php  echo $_GP['keyword'];?>">
						</li>
						<li style="list-style-type:none;">
						<button class="btn btn-primary" style="margin-right:10px;margin-top:10px;"><i class="icon-search icon-large"></i> 搜索</button>
						</li>
					</td>
				
				
			
					
					
				</tr>
			</tbody>
		</table>
		</form>
	<div style="padding:15px;">
		
		<table id="list-table" class="table table-bordered table-striped table-hover">
  <tr class="active">
     <th class="text-center" width="5%">编号</th>
    <th class="text-center" width="30%">商品名称</th>
	<th class="text-center" width="10%">货号</th>
	<th class="text-center" width="10%">价格</th>
	<th class="text-center" width="10%">库存</th>
    <th class="text-center" width="20%">商品属性</th>
    
    <th class="text-center" width="5%">状态</th>
    <th class="text-center" width="10%">操作</th>
  </tr>

		<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td style="text-align:center;"><?php  echo $item['id'] ?></td>
                                     
                                        	<td style="text-align:center;"><?php  echo $item['title'];?></td>
											
											<td style="text-align:center;"><?php  echo $item['goodssn'];?></td>
											
											<td style="text-align:center;"><?php  echo $item['marketprice'];?></td>
											
											<td style="text-align:center;"><?php  echo $item['total'];?></td>
											
                                        <td style="text-align:center;">
                                     <?php  if($item['istime']==1) { ?>  <label data='<?php  echo $item['istime'];?>' class='label label-info' >促销</label><?php  } ?>
                                        <?php  if($item['issendfree']==1) { ?> <label data='<?php  echo $item['issendfree'];?>' class='label label-info'>包邮</label><?php  } ?>
                                       <?php  if($item['isrecommand']==1) { ?> <label data='<?php  echo $item['isrecommand'];?>' class='label label-info'>首页推荐</label><?php  } ?>
					
					
					
					
					<td style="text-align:center;"><?php  if($item['status']) { ?><span data='<?php  echo $item['status'];?>' onclick="setProperty1(this,<?php  echo $item['id'];?>,'status')" class="label label-success" style="cursor:pointer;">上架中</span><?php  } else { ?><span data='<?php  echo $item['status'];?>' onclick="setProperty1(this,<?php  echo $item['id'];?>,'status')" class="label label-danger" style="cursor:pointer;">已下架</span><?php  } ?><!--&nbsp;<span class="label label-info"><?php  if($item['type'] == 1) { ?>实体商品<?php  } else { ?>虚拟商品<?php  } ?></span>--></td>
					<td style="text-align:center;">
					<a target="_blank" href="<?php echo WEBSITE_ROOT.mobile_url('detail',array('name'=>'shopwap','id'=>$item['id']));?>"><img src="<?php echo RESOURCE_ROOT;?>/addons/shop/images/icon_view.gif" title="查看"></a>&nbsp;&nbsp;
						<a href="<?php  echo web_url('goods', array('id' => $item['id'], 'op' => 'post'))?>"><img src="<?php echo RESOURCE_ROOT;?>/addons/shop/images/icon_edit.gif" title="编辑"></a>&nbsp;&nbsp;<a href="<?php  echo web_url('goods', array('id' => $item['id'], 'op' => 'delete'))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;"><img src="<?php echo RESOURCE_ROOT;?>/addons/shop/images/icon_trash.gif" title="删除"></a></a>
					</td>
				</tr>
				<?php  } } ?>
 	
		</table>
		<?php  echo $pager;?>
	</div>
</div>
<script language="javascript">
		var category = <?php  echo json_encode($children)?>;
   function fetchChildCategory(cid) {
	var html = '<option value="0">请选择二级分类</option>';
	if (!category || !category[cid]) {
		$('#cate_2').html(html);
		return false;
	}
	for (i in category[cid]) {
		html += '<option value="'+category[cid][i][0]+'">'+category[cid][i][1]+'</option>';
	}
	$('#cate_2').html(html);
}
</script>
<?php  include page('footer');?>

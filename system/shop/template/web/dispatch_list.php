<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>


<div class="panel panel-default">

    			
<div class="row" style="margin:0">
<div class="pull-left"><a href="<?php  echo create_url('site', array('name' => 'shop','do' => 'dispatch','op'=>'post'))?>" class="btn btn-primary">新增配送方式</a></div>
</div>
		<table id="list-table" class="table table-hover">
  <tr class="active">
     <th class="text-center" width="10%">配送名称</th>
    <th class="text-center" width="10%">配送类型</th>
    <th class="text-center" width="10%">显示优先级</th>
    <th class="text-center" width="10%">操作</th>
  </tr>
		<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td class="text-center"><?php  echo $item['dispatchname'];?></td>
          <td class="text-center"><?php   if($item['sendtype']==0){?>快递<?php } ?><?php   if($item['sendtype']==1){?>自提<?php } ?></td>
          <td class="text-center"><?php  echo $item['displayorder'];?></td>
         <td class="text-center"><a href="<?php  echo web_url('dispatch', array('id' => $item['id'], 'op' => 'post'))?>">编辑</a>&nbsp;&nbsp;<a href="<?php  echo web_url('dispatch', array('id' => $item['id'], 'op' => 'delete'))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;">删除</a></td>
				</tr>
				<?php  } } ?>
		</table>
		<?php  echo $pager;?>
</div>
<?php  include page('footer');?>

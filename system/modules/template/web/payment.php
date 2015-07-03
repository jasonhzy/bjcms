<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>

<div class="panel panel-default">

		<table id="list-table" class="table table-hover">
  <tr class="active">
     <th class="text-center" width="10%">支付方式名称</th>
    <th class="text-center" width="40%">支付方式描述</th>
    <th class="text-center" width="10%">操作</th>
  </tr>
		<?php  if(is_array($modules)) { foreach($modules as $item) { ?>
				<tr>
					<td class="text-center"><?php  echo $_LANG['payment_'.$item['code'].'_name']?></td>
          <td class="text-center"><?php  echo $_LANG['payment_'.$item['code'].'_desc']?></td>
         <td class="text-center"><?php if(empty($item['enable'])||$item['enable']==0){?>
         	<a  href="<?php  echo create_url('site', array('name' => 'modules','do' => 'payment_install','code'=>$item['code']))?>" >
                                   启动                                
                                </a><?php }else{ ?>
                                	<a  href="<?php  echo create_url('site', array('name' => 'modules','do' => 'payment_config','code'=>$item['code']))?>" >
                                   编辑                             
                                </a>
                                 	<a  href="<?php  echo create_url('site', array('name' => 'modules','do' => 'payment_uninstall','code'=>$item['code']))?>" >
                                   关闭                           
                                </a>
                                 <?php }?>  </td>
				</tr>
				<?php  } } ?>
		</table>
		<?php  echo $pager;?>
</div>
<?php  include page('footer');?>

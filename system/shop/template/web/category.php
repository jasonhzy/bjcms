<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>

<div class="panel panel-default">
	  <div class="panel-heading">
    <h3 class="panel-title"> <?php  if(!empty($category['id'])) { ?>编辑<?php  }else{ ?>新增<?php  } ?>分类</h3>
  </div>
	<form action="" method="post"  class="form-horizontal" enctype="multipart/form-data">
	<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />
      <table class="table table-hover">
			<?php  if(!empty($parentid)) { ?>
			<tr>
				<td><label for="">上级分类</label></td>
				<td>
					<?php  echo $parent['name'];?>
				</td>
			</tr>
			<?php  } ?>
			<tr>
				<td><label for="">排序</label></td>
				<td>
					<input type="text" name="displayorder" class="span6" value="<?php  echo $category['displayorder'];?>" />
				</td>
			</tr>
                       
			<tr>
				<td><label for="">分类名称</label></td>
				<td>
					<input type="text" name="catename" class="span6" value="<?php  echo $category['name'];?>" />
				</td>
			</tr>
             <tr>
                <td><label for="">分类图片</label></td>
          
                        <td>
                    <input type="file" name="thumb" class="form-control input-sm" style="width:300px;">
                     <?php  if(!empty($category['thumb'])) { ?>
                         <img style="width:100px;height:100px" src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $category['thumb'];?>" ></div>
                          <?php  } ?>
               </td>
            </tr>
			<tr>
				<td><label for="">分类描述</label></td>
				<td>
						<input type="text" name="description" class="span6" value="<?php  echo $category['description'];?>" />
				</td>
			</tr>
			  <tr>
                <td><label for="">首页推荐</label></td>
                <td>
                        <input type='radio' name='isrecommand' value=1' <?php  if($category['isrecommand']==1) { ?>checked<?php  } ?> /> 是&nbsp;
                        <input type='radio' name='isrecommand' value=0' <?php  if($category['isrecommand']==0) { ?>checked<?php  } ?> /> 否
                 
                </td>
            </tr>
         
               <tr>
                <td><label for="">是否显示</label></td>
                <td>
                        <input type='radio' name='enabled' value=1' <?php  if($category['enabled']==1) { ?>checked<?php  } ?> /> 是&nbsp;
                        <input type='radio' name='enabled' value=0' <?php  if($category['enabled']==0) { ?>checked<?php  } ?> /> 否
                
                </td>
            </tr>
			<tr>
				<td></td>
				<td>
					<input name="submit" type="submit" value="提交" class="btn btn-primary span3">
				</td>
			</tr>
		</table>
	</form>
</div>
<?php  include page('footer');?>

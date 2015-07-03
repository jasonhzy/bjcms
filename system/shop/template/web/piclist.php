<?php defined('SYSTEM_IN') or exit('Access Denied');?>
<?php  include page('header');?>
<div class="list-div">
  <table width="100%" cellpadding="3" cellspacing="1" class="table table-bordered table-striped table-hover">
  <tr><td>
  	 <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
   
   <table>
   	<tr><td><input type="file" name="thumb" class="form-control input-sm" style="width:300px;" /></td><td>
     &nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="上传商品图片" class="btn btn-primary" /></td></tr>
   	    </table>
   	  </form>
  </td></tr>
  <tr><th>商品相册</th></tr>
  <tr><td>
  				<?php  if(is_array($list)) { foreach($list as $item) { ?>
    <div style="display:-moz-inline-stack;display:inline-block;vertical-align:top;zoom:1;*display:inline;">
    <table style="width: 220px;">
      <tr>
        <td style="padding:5px;"><img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $item['picurl'];?>" width="250" height="250" border="0" style="cursor:pointer; float:left; margin:0 2px;display:block;" id="default" /></td>
      </tr>
      <tr>
        <td valign="top" style="padding:5px;">	<a  href="<?php  echo create_url('site', array('name' => 'shop','goodid' => $goodid,'do' => 'piclist','op'=>'delete','id'=>$item['id']))?>" class="btn btn-danger">删除</a>
			
                          </td>
      </tr>
      <tr>
        <td valign="top" style="padding:5px;"></td>
      </tr>
    </table>
    </div>
    			<?php  } } ?>      </td></tr></table>
    			   </div>
<?php  include page('footer');?>

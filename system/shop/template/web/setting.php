<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<div class="main">
 
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
      
     <table class="table table-hover">
            <tr>
                <th style="width:150px">商店名称:</th>
                <td>
                    <input type="text" name="shop_title" value="<?php  echo $settings['shop_title'];?>" />
                </td>
            </tr>
                 <tr>
                <th style="width:150px">备案号:</th>
                <td>
                    <input type="text" name="shop_icp" value="<?php  echo $settings['shop_icp'];?>" />
                </td>
            </tr>
                <tr>
                <th style="width:150px">商店描述:</th>
                <td>
                    <input type="text" name="shop_description" value="<?php  echo $settings['shop_description'];?>" />
                </td>
            </tr>
                  <tr>
                <th style="width:150px">商店关键字:</th>
                <td>
                    <input type="text" name="shop_keyword" value="<?php  echo $settings['shop_keyword'];?>" />
                </td>
            </tr>
                   <tr>
          <th  style="width:150px">商店 Logo</th>
          <td> <input type="file" name="shop_logo" class="form-control input-sm" style="width:300px;">
                     <?php  if(!empty($settings['shop_logo'])) { ?>
                         <img style="width:100px;height:100px" src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $settings['shop_logo'];?>" ></div>
                          <?php  } ?>
                 </td>
        </tr>
                <tr>
                <th style="width:150px">会员注册赠送积分:</th>
                <td>
                    <input type="text" name="shop_regcredit" value="<?php  echo $settings['shop_regcredit'];?>" />
                </td>
            </tr>
       
              <tr>
                <th style="width:150px">是否开启注册:</th>
                <td>
               <input type="radio" name="shop_openreg" value="0" id="shop_closereg" <?php  if($settings['shop_openreg'] == 0) { ?>checked="true"<?php  } ?> /> 关闭  &nbsp;&nbsp;
             
                <input type="radio" name="shop_openreg" value="1" id="shop_closereg"  <?php  if($settings['shop_openreg'] == 1) { ?>checked="true"<?php  } ?> /> 开启
                </td>
            </tr>
              <tr>
                <th style="width:150px">帮助说明:</th>
                <td>
                	<textarea name="help" id="help" cols="60" rows="8"><?php  echo $settings['help'];?></textarea>
                </td>
            </tr>
                 <tr>
          <th style="width:150px"></th>
          <td>
              <input type="submit" name="submit" value=" 确定 " class="btn btn-primary" />&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="reset" value=" 重置 " class="btn btn-default" />
          </td>
        </tr>
        </table>
			
		</form>
			<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>addons/common/ueditor/ueditor.config.js?x=1211"></script>
<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>addons/common/ueditor/ueditor.all.min.js?x=141"></script>
<script type="text/javascript">var ue = UE.getEditor('help');</script>
<?php  include page('footer');?>
<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<div class="main">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
        <div class="panel-heading">
    <h3 class="panel-title">QQ快捷登录</h3>
  </div>
     <table class="table table-hover">
     	  <tr>
                <th style="width:150px">是否启用：</th>
                <td>
                   <input type="radio" name="allow_qqlogin" value="0" id="allow_qqlogin" <?php  if($settings['allow_qqlogin'] == 0) { ?>checked="true"<?php  } ?> /> 否  &nbsp;&nbsp;
             
                <input type="radio" name="allow_qqlogin" value="1" id="allow_qqlogin"  <?php  if($settings['allow_qqlogin'] == 1) { ?>checked="true"<?php  } ?> /> 是
               
                </td>
            </tr>
            <tr>
                <th style="width:150px">APP ID:</th>
                <td>
                    <input type="text" name="qq_appid" value="<?php  echo $settings['qq_appid'];?>" />
                </td>
            </tr>
                <tr>
                <th style="width:150px">App Key:</th>
                <td>
                    <input type="text" name="qq_secret" value="<?php  echo $settings['qq_secret'];?>" />
                </td>
            </tr>
                  <tr>
                <th style="width:150px">申请地址:</th>
                <td>
                    <a href="http://open.qq.com/" target="_blank">立即申请</a>
                </td>
            </tr>
                 
        </table>
			   <div class="panel-heading">
    <h3 class="panel-title">sina快捷登录</h3>
  </div>
     <table class="table table-hover">
     	 <tr>
                <th style="width:150px">是否启用：</th>
                <td>
                   <input type="radio" name="allow_sinalogin" value="0" id="allow_sinalogin" <?php  if($settings['allow_sinalogin'] == 0) { ?>checked="true"<?php  } ?> /> 否  &nbsp;&nbsp;
             
                <input type="radio" name="allow_sinalogin" value="1" id="allow_sinalogin"  <?php  if($settings['allow_sinalogin'] == 1) { ?>checked="true"<?php  } ?> /> 是
               
                </td>
            </tr>
            <tr>
                <th style="width:150px">APP ID:</th>
                <td>
                    <input type="text" name="sina_appid" value="<?php  echo $settings['sina_appid'];?>" />
                </td>
            </tr>
                <tr>
                <th style="width:150px">App Key:</th>
                <td>
                    <input type="text" name="sina_secret" value="<?php  echo $settings['sina_secret'];?>" />
                </td>
            </tr>
                  <tr>
                <th style="width:150px">申请地址:</th>
                <td>
                    <a href="http://open.weibo.com/" target="_blank">立即申请</a>
                </td>
            </tr>
                 
        </table>
			     <table class="table table-hover">
                 <tr>
          <th style="width:150px"></th>
          <td>
              <input type="submit" name="submit" value=" 确定 " class="btn btn-primary" />&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="reset" value=" 重置 " class="btn btn-default" />
          </td>
        </tr>
        </table>
		</form>
<?php  include page('footer');?>
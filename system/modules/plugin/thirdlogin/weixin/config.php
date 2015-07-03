<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<div class="main">
 
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
        <div class="panel-heading">
    <h3 class="panel-title">微信登录配置</h3>
  </div>
     <table class="table table-hover">
     	    <tr>
                <th style="width:150px">触发方式:</th>
                <td>
                
               微信端访问
                </td>
            </tr>   
                  <tr>
                <th style="width:150px">申请地址:</th>
                <td>
                
                <a href="http://mp.weixin.qq.com/" target="_blank">申请地址</a>
                </td>
            </tr>   
             <tr>
                <th>微信公众号AppId</th>
                <td>
                         <input type="text" name="weixin_appId" class="span5" value="<?php  echo $settings['weixin_appId'];?>" />
                </td>
            </tr>
               <tr>
                <th>微信公众号AppSecret</th>
                <td>
                         <input type="text" name="weixin_appSecret" class="span5" value="<?php  echo $settings['weixin_appSecret'];?>" />
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
<?php  include page('footer');?>
<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<div class="main">
 
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
        <div class="panel-heading">
    <h3 class="panel-title">支付宝支付参数</h3>
  </div>
     <table class="table table-hover">
            <tr>
                <th style="width:150px">收款支付宝账号:</th>
                <td>
                    <input type="text" name="alipay_account" value="<?php  echo $settings['alipay_account'];?>" />
                </td>
            </tr>
                <tr>
                <th style="width:150px">合作者身份:</th>
                <td>
                    <input type="text" name="alipay_partner" value="<?php  echo $settings['alipay_partner'];?>" />
                </td>
            </tr>
                  <tr>
                <th style="width:150px">校验密钥:</th>
                <td>
                    <input type="text" name="alipay_secret" value="<?php  echo $settings['alipay_secret'];?>" />
                </td>
            </tr>
                 
        </table>
        
         <div class="panel-heading">
    <h3 class="panel-title">微信支付参数</h3>
  </div>
           <table class="table table-hover">
            <tr>
                <th style="width:150px">身份标识(appId):</th>
                <td>
                    <input type="text" name="wechat_appId" value="<?php  echo $settings['wechat_appId'];?>" />
                </td>
            </tr>
                <tr>
                <th style="width:150px">身份密钥(appSecret):</th>
                <td>
                    <input type="text" name="wechat_appSecret" value="<?php  echo $settings['wechat_appSecret'];?>" />
                </td>
            </tr>
                  <tr>
                <th style="width:150px">微信支付商户号(MchId):</th>
                <td>
                    <input type="text" name="wechat_mchid" value="<?php  echo $settings['wechat_mchid'];?>" />
                </td>
            </tr>
                     <tr>
                <th style="width:150px">通信密钥/商户支付密钥(paySignKey/api密钥):</th>
                <td>
                    <input type="text" name="wechat_signkey" value="<?php  echo $settings['wechat_signkey'];?>" />
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
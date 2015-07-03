<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<div class="main">
 
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
        <div class="panel-heading">
    <h3 class="panel-title">银行汇款/转帐</h3>
  </div>
     <table class="table table-hover">
            <tr>
                <th style="width:150px">支付方式名称:</th>
                <td>
               <?php  echo $item['name'];?>
                </td>
            </tr>
                <tr>
                <th style="width:150px">支付方式描述:</th>
                <td>
                 <?php  echo $item['desc'];?>
                </td>
            </tr>
                  <tr>
                <th style="width:150px">支付方式描述:</th>
                <td>
                	<textarea name="bank_pay_desc" id="bank_pay_desc" cols="60" rows="8"><?php  echo $configs['bank_pay_desc'];?></textarea>
                </td>
            </tr>
              
                <tr>
                <th style="width:150px">排序优先级:</th>
                <td>
                   <input type="text" name="pay_order" value="<?php  echo $item['order'];?>" />
                   <p class="help-block">越大支付时候显示越前</p>
                </td>
                     </tr>
                  <tr>
                <th style="width:150px">是否货到付款:</th>
                <td>
                
                  <?php if(empty($item['iscod'])||$item['iscod']==0){?>
         	否<?php }else{ ?>
                                是
                                 <?php }?> 
                </td>
            </tr>   
                <tr>
                <th style="width:150px">是否在线支付:</th>
                <td>
                	        <?php if(empty($item['online'])||$item['online']==0){?>
         	否<?php }else{ ?>
                                是
                                 <?php }?> 
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
<script type="text/javascript">var ue = UE.getEditor('bank_pay_desc');</script>
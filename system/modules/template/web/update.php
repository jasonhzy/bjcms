<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>

  <h3>系统升级</h3>
           <table id="general-table" class="table table-hover">
             <tr>
                <td style="width:20px"><label for="">授权状态</label></td>
                <td style="width:100px">
                 <iframe width="200" scrolling="no" height="30" frameborder="0" style="width:200px;height: 30px;overflow:hidden;"  src="<?php echo VERSION_GETSTATIC?>"></iframe>

                </td>
            </tr>
              <tr>
                <td style="width:20px"><label for="">本地版本</label></td>
                <td style="width:100px">
                      <?php echo $version?>
                </td>
            </tr>
              <tr>
                <td style="width:20px"><label for="">服务器版本</label></td>
                <td style="width:100px">
                      <?php echo $localversion?>
                </td>
            </tr>
            <tr>
                <td style="width:20px"><label for="">升级状态</label></td>
                <td  style="width:100px;">
                	    <?php  if($localversion!=$version){?>
                   发现最新补丁，<a href="<?php echo $versionurl?>" target="_blank">下载<?php echo $version?>最新补丁</a> 
                   <?php }else{?>
                   已为最新版本，无需升级。
                    <?php }?>
                </td>
            </tr>
        </table>
<?php  include page('footer');?>
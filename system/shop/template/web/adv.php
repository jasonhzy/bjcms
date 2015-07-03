<?php defined('SYSTEM_IN') or exit('Access Denied');?>
<?php  include page('header2');?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit='return formcheck()'>
        <input type="hidden" name="id" value="<?php  echo $adv['id'];?>" />
        <h4>幻灯片设置</h4>
            <table class="table table-hover">

            <tr>
                <th><label for="">排序</label></th>
                <td>
                    <input type="text" name="displayorder" class="span6" value="<?php  echo $adv['displayorder'];?>" />(越大越前)
                </td>
            </tr>
            <tr>
                <th>幻灯片图片</th>
                <td>     <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
                        	 <?php  if(!empty($item['thumb'])) { ?>
                            <img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $item['thumb'];?>" alt="" onerror="$(this).remove();">
                              <?php  } ?>
                            </div>
                        <div>
                         <input name="thumb" id="thumb" type="file" />
                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">移除图片</a>
                        </div>
                    </div>
                </td>
            </tr>
           <tr>
                <th><label for="">幻灯片链接</label></th>
                <td>
                    <input type="text" name="link" id='link' class="span6" value="<?php  echo $adv['link'];?>" />
                </td>
            </tr>
                 <tr>
                <th><label for="">是否显示</label></th>
                <td>
                    <label for="enabled1" class="radio inline"><input type="radio" name="enabled" value="1" id="enabled1" <?php  if(empty($adv) || $adv['enabled'] == 1) { ?>checked="true"<?php  } ?> /> 是</label>
                    &nbsp;&nbsp;&nbsp;
                    <label for="enabled2" class="radio inline"><input type="radio" name="enabled" value="0" id="enabled2"  <?php  if(!empty($adv) && $adv['enabled'] == 0) { ?>checked="true"<?php  } ?> /> 否</label>
                    <span class="help-block"></span>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input name="submit" type="submit" value="提交" class="btn btn-primary span3">
                </td>
            </tr>
        </table>
    </form>
</div>
<?php  include page('footer');?>
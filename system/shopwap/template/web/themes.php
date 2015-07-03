<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<div class="list-div">
  <table width="100%" cellpadding="3" cellspacing="1" class="table table-bordered table-striped table-hover">
  <tr><th>当前选择模板&nbsp;&nbsp;&nbsp;<a  href="<?php  echo create_url('site', array('name' => 'shopwap','do' => 'refreshThemes'))?>" class="btn btn-primary">刷新缓存</a></th></tr>
  <tr><td>
    <table>
      <tr>
        <td width="250" align="center"><strong><?php  echo $items;?></strong><br/><img id="screenshot" src="<?php echo WEBSITE_ROOT;?>/themes/<?php  echo $items;?>/screenshot.jpg"  width="160" height="240"/></td>
        <td valign="top"> <br />
          <span id="templateDesc"></span><br />
        </td></tr>
    </table>
  </td></tr>
  <tr><th>可用模板</th></tr>
  <tr><td>
  				<?php  if(is_array($themes)) { foreach($themes as $theme) { ?>
    <div style="display:-moz-inline-stack;display:inline-block;vertical-align:top;zoom:1;*display:inline;">
    <table style="width: 220px;">
      <tr>
        <td style="padding:5px;"><strong><?php  echo $theme;?></strong></td>
      </tr>
      <tr>
        <td style="padding:5px;"><img src="<?php echo WEBSITE_ROOT;?>/themes/<?php  echo $theme;?>/screenshot.jpg" width="120" height="180" border="0" style="cursor:pointer; float:left; margin:0 2px;display:block;" id="default" /></td>
      </tr>
      <tr>
        <td valign="top" style="padding:5px;">	<a  href="<?php  echo create_url('site', array('name' => 'shopwap','do' => 'themes','op'=>'post','theme'=>$theme))?>" class="btn btn-danger">应用</a>
			
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

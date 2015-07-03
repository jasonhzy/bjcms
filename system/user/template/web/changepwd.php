<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" >
    	    <input type="hidden" value="<?php echo $id ?>"  name="id" class="span2"  />
               
        <h4>修改密码</h4>
             <table id="general-table" class="table table-hover">
            <tr>
                <th><label for="">用户名</label></th>
                <td>
                   <?php echo $username ?>
                </td>
            </tr>
              <tr>
                <th><label for="">新密码</label></th>
                <td>
                    <input type="password"  name="newpassword" class="span2"  />
                </td>
            </tr>
            <tr>
                <th><label for="">确认密码</label></th>
                <td>
                    <input type="password"  name="confirmpassword" class="span2"  />
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input name="submit" type="submit" value="提交" class="btn btn-primary span3">
                    <input type="hidden" name="token" value="<?php  echo $_CMS['token'];?>" />
                </td>
            </tr>
        </table>
    </form>
</div>
<?php  include page('footer');?>
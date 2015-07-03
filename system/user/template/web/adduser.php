<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit='return formcheck()'>
        <input type="hidden" name="id" value="<?php  echo $adv['id'];?>" />
        <h4>新增用户</h4>
           <table id="general-table" class="table table-hover">
            <tr>
                <th><label for="">用户名</label></th>
                <td>
                      <input type="text" name="username" class="span2"  />
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
                </td>
            </tr>
        </table>
                  <table id="general-table" class="table table-hover">
            <tr>
                <th><label for="">权限</label></th>
                <td><?php $index=1; foreach($allrule as $item){?>
                	 <input id="s<?php echo $index;$index++?>" type="checkbox" name="<?php echo $item['modname'].'-'.$item['moddo'] ?>" value="1" ><?php echo $item['moddescription'] ?>
                      <br/>	<?php }?>
                      <script>
                      function checkrule(ischecked)
                      {
                      	for(var i=1;i<<?php echo $index;?>;i++)
                      	{
                      	document.getElementById("s"+i).checked=ischecked;
                      	
                      	}
                      
                     	}</script>
                      <strong><a href="javascript:;" onclick="checkrule(true)">全选</a>，<a href="javascript:;"  onclick="checkrule(false)">全否</a></strong>
                	
                  
                </td>
            </tr>
              
        </table>
    </form>
</div>
<?php  include page('footer');?>
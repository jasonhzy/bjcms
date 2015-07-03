<?php defined('SYSTEM_IN') or exit('Access Denied');?>
<?php  include page('header');?>
<ul class="nav nav-tabs">
    <li <?php  if($operation == 'display') { ?> class="active" <?php  } ?>><a href="<?php  echo web_url('adv',array('op' =>'display'))?>">幻灯片</a></li>
    <li<?php  if($operation == 'post') { ?> class="active" <?php  } ?>><a href="<?php  echo web_url('adv',array('op' =>'post'))?>">添加幻灯片</a></li>
    <?php  if(!empty($adv['id']) && $operation== 'post') { ?> <li class="active"><a href="<?php  echo web_url('adv',array('op' =>'post','id'=>$adv['id']))?>">编辑物流方式</a></li> <?php  } ?>
</ul>
<div class="main">
    <div style="padding:15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr>
                    <th style="width:30px;">ID</th>
                    <th>显示顺序</th>					
                    <th>幻灯</th>
                    <th>链接</th>
                    <th >操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $adv) { ?>
                <tr>
                    <td><?php  echo $adv['id'];?></td>
                    <td><?php  echo $adv['displayorder'];?></td>
                    <td> <img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $adv['thumb'];?>" style="width:150px;height:100px"></td>
                    <td><?php  echo $adv['link'];?></td>
                    <td style="text-align:left;"><a href="<?php  echo web_url('adv', array('op' => 'post', 'id' => $adv['id']))?>">修改</a> <a href="<?php  echo web_url('adv', array('op' => 'delete', 'id' => $adv['id']))?>">删除</a> </td>
                </tr>
                <?php  } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>
</div>
<?php  include page('footer');?>
<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<div class="main">
 
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
        <div class="panel-heading">
    <h3 class="panel-title">配送方式</h3>
  </div>
     <table class="table table-hover">
            <tr>
                <th style="width:150px">配送名称:</th>
                <td>
                    <input type="text" name="dispatchname" value="<?php  echo $item['dispatchname'];?>" />
                </td>
            </tr>
                <tr>
                <th style="width:150px">配送类型:</th>
                <td>
                     <input type="radio" name="sendtype" value="0" id="sendtype" <?php  if($item['sendtype'] == 0) { ?>checked="true"<?php  } ?> /> 快递 &nbsp;&nbsp;
             
                <input type="radio" name="sendtype" value="1" id="sendtype"  <?php  if($item['sendtype'] == 1) { ?>checked="true"<?php  } ?> /> 自提
             
                </td>
            </tr>
               <tr>
                <th style="width:150px">重量设置:</th>
             <td>
                    <strong>首重重量</strong>
                        <select name="firstweight" id="firstweight" class="span1">
                            <option value="500">0.5</option>
                            <option value="1000" selected="">1</option>
                            <option value="1200">1.2</option>
                            <option value="2000">2</option>
                            <option value="5000">5</option>
                            <option value="10000">10</option>
                            <option value="20000">20</option>
                            <option value="50000">50</option>

                        </select> KG
，
                     <strong>续重重量</strong>
                        <select name="secondweight" id="secondweight" class="span1">
                              <option value="500">0.5</option>
                            <option value="1000" selected="">1</option>
                            <option value="1200">1.2</option>
                            <option value="2000">2</option>
                            <option value="5000">5</option>
                            <option value="10000">10</option>
                            <option value="20000">20</option>
                            <option value="50000">50</option>

                        </select> KG

                 
                </td>
            </tr>
            
              <tr>
                <th style="width:150px">价格设置:</th>
             <td>
                    <strong>首重价格</strong>
                        <input type="text" name="firstprice" id="firstprice" class="span1" value="<?php  echo $item['firstprice'];?>"> 元
，
                     <strong>续重价格</strong>
                        <input type="text" name="secondprice" id="secondprice" class="span1" value="<?php  echo $item['secondprice'];?>"> 元

                 
                </td>
            </tr>
            
               <tr >
                <th style="width:150px">快递公司:</th>
                <td>     
                <select name="expresscompy" id="expresscompy" onchange="selectexpress()">
												<?php  include page('expressoption');?>
								</select>
                          
                </td>
            </tr>
                  <tr>
                <th style="width:150px" ><div id="expressdiv1">快递编号:</div></th>
                <td  ><div id="expressdiv2"><input type="text" name="express" id="express" value="<?php  echo $item['express'];?>" /></div>
                </td>
            </tr>
                       <tr>
                <th style="width:150px">显示优先级:</th>
                <td>
                    <input type="text" name="displayorder" value="<?php  echo $item['displayorder'];?>" />(值越大越前)
                </td>
            </tr>
                  <tr>
                <th style="width:150px">区域:</th>
             <td>
                	<select name="sel-provance" id="sel-provance" onChange="selectCity();" class="pull-left form-control" style="width:20%; margin-right:1%;">

						<option value="" selected="true">省/直辖市</option>

					</select>

					<select name="sel-city" id="sel-city" onChange="selectcounty()" class="pull-left form-control" style="width:20%; margin-right:1%;">

						<option value="" selected="true">请选择</option>

					</select>

					<select name="sel-area" id="sel-area" class="pull-left form-control" style="width:20%;">

						<option value="" selected="true">请选择</option>

					</select>

                 
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
		<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>/addons/common/js/cascade.js"></script>

		<script>
			cascdeInit('<?php echo RESOURCE_ROOT;?>/addons/common/js/','','','');
<?php if(!empty($item['provance'])){ ?>
document.getElementById('sel-provance').value= '<?php  echo $item['provance'];?>';

selectCity();
<?php if(!empty($item['city'])){ ?>
document.getElementById('sel-city').value='<?php  echo $item['city'];?>';
selectcounty();
<?php }?>
<?php if(!empty($item['area'])){ ?>
document.getElementById('sel-area').value = '<?php  echo $item['area'];?>';
<?php }?>
<?php }?>


function jsSelectIsExitItem(objSelect,objItemValue)   
{   
     var isExit = false ;   
     for ( var i=0;objSelect.length>i;i++)   
     {   
         if (objSelect.options[i].value == objItemValue)   
         {   
             isExit = true ;   
             break ;   
         }   
     }        
     return isExit;   
}

			var express='<?php  echo $item['express'];?>';
			
			<?php  if(!empty($item['express'])){?> 
		
				if(jsSelectIsExitItem(document.getElementById('expresscompy'),'<?php  echo $item['express'];?>'))
				{
				document.getElementById('expresscompy').value='<?php  echo $item['express'];?>';	
				}else
					{
							document.getElementById('expresscompy').value='';
					}<?php }?>
			function selectexpress()
			{
	if(	document.getElementById('expresscompy').value==''||document.getElementById('expresscompy').value==null)
	{
			document.getElementById('express').value=express;
			express='';
		document.getElementById('expressdiv1').style.display='block';
			document.getElementById('expressdiv2').style.display='block';
	}else
		{
			
				document.getElementById('expressdiv1').style.display='none';
					document.getElementById('expressdiv2').style.display='none';
		document.getElementById('express').value=document.getElementById('expresscompy').value;
		}
				
			}
			selectexpress();
			</script>
<?php  include page('footer');?>
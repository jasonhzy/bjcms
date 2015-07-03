<?php defined('SYSTEM_IN') or exit('Access Denied');?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="<?php echo RESOURCE_ROOT;?>/addons/shop/css/bootstrap.css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/common/css/font-awesome.css" />
<link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/common/css/jquery.mCustomScrollbar.css" />
<link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/shop/css/common.css" />
<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>/addons/common/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>/addons/common/js/bootstrap.js"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>/addons/common/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>/addons/common/kindeditor/kindeditor-min.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/common/kindeditor/themes/default/default.css" />
<script type="text/javascript">
window.UEDITOR_HOME_URL = '<?php echo RESOURCE_ROOT;?>/addons/common/';
window.UEDITOR_RES_URL = '<?php echo RESOURCE_ROOT;?>/addons/common/';
window.UEDITOR_UEUPLOAD='<?php echo WEBSITE_ROOT.web_url('ueupload',array('name'=>'index'));?>';
</script>
   <!--[if IE 7]>
    <link rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/common/css/font-awesome-ie7.min.css">
    <![endif]-->
    <!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_ROOT;?>/addons/common/css/bootstrap-ie6.min.css">
    <![endif]-->
	<link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/common/css/datetimepicker.css" />
		<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>/addons/common/js/datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>/addons/common/js/jquery-ui-1.10.3.min.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/common/css/uploadify_t.css" />
     <style type="text/css">
    .spectable td,.spectable th {border:1px solid #ccc; vertical-align: middle;text-align:center;};
    .spectable th { font-weight: bold;}
    .spectable  input { text-align: center;}
    .f {  border-color: #b94a48;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	 -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
		  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);}
</style>
</head>
<body>
	

<div class="panel panel-default">
	<style>
.panel-heading {
  color: #333;
  background-color: #f5f5f5;
  border-color: #ddd;
  padding: 10px 15px;
  border-bottom: 1px solid transparent;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
}
.panel-title {
  margin-top: 0;
  margin-bottom: 0;
  font-size: 16px;
  color: inherit;
}
</style>
  <div class="panel-heading">
    <div class="panel-title"> <?php  if(!empty($item['id'])) { ?>编辑<?php  }else{ ?>新增<?php  } ?>商品</div>
  </div>
  <div class="panel-body">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
    	     <div class="tab-content">
        <div class="tab-pane active" id="general">
        	
      <table id="general-table" class="table table-hover">
 
        <tr>
          <td>商品名称：</td>
          <td><div class="col-md-6">
          	 <input type="text" name="goodsname" id="goodsname" maxlength="100" class="span7"  value="<?php  echo $item['title'];?>" />
            </div></td>
        </tr>
		 <tr>
          <td>货号：</td>
          <td><div class="col-md-2">
             <input type="text" name="goodssn"  value="<?php  echo $item['goodssn'];?>" /> 
           </div></td>
        </tr>
		
			          <tr>
          <td>是否上架销售：</td>
          <td>
                 <input type="radio" name="status" value="1" id="isshow1" <?php  if($item['status'] == 1) { ?>checked="true"<?php  } ?> /> 是  &nbsp;&nbsp;
             <input type="radio" name="status" value="0" id="isshow2"  <?php  if($item['status'] == 0) { ?>checked="true"<?php  } ?> /> 否
                  	
              </td>
        </tr>

        <tr>
          <td>分类：</td>
          <td><div class="col-md-4">
                <select  style="margin-right:15px;" id="pcate" name="pcate" onchange="fetchChildCategory(this.options[this.selectedIndex].value)"  autocomplete="off">
                <option value="0">请选择一级分类</option>
                <?php  if(is_array($category)) { foreach($category as $row) { ?>
                <?php  if($row['parentid'] == 0) { ?>
                <option value="<?php  echo $row['id'];?>" <?php  if($row['id'] == $item['pcate']) { ?> selected="selected"<?php  } ?>><?php  echo $row['name'];?></option>
                <?php  } ?>
                <?php  } } ?>
            </select>
            <select  id="cate_2" name="ccate" autocomplete="off">
                <option value="0">请选择二级分类</option>
                <?php  if(!empty($item['ccate']) && !empty($children[$item['pcate']])) { ?>
                <?php  if(is_array($children[$item['pcate']])) { foreach($children[$item['pcate']] as $row) { ?>
                <option value="<?php  echo $row['0'];?>" <?php  if($row['0'] == $item['ccate']) { ?> selected="selected"<?php  } ?>><?php  echo $row['1'];?></option>
                <?php  } } ?>
                <?php  } ?>
            </select>
              </div>
                        </td>
        </tr>


          <tr>
          <td>本店售价：</td>
          <td><div class="col-md-2">
          	  <input type="text" name="marketprice" id="marketprice" value="<?php  echo empty($item['marketprice'])?'0':$item['marketprice'];?>" />元
           </div></td>
        </tr>
            <tr>
          <td>市场售价：</td>
          <td><div class="col-md-2">
          	<input type="text" name="productprice" id="productprice"  value="<?php  echo empty($item['productprice'])?'0':$item['productprice'];?>" />元
           </div></td>
        </tr>
           <tr>
          <td>重量：</td>
          <td><div class="col-md-2">
          	 <input type="text" name="weight" id='weight' value="<?php  echo empty($item['weight'])?'0':$item['weight'];?>" />克
           </div></td>
        </tr>
          <tr>
          <td>库存：</td>
          <td><div class="col-md-2">
          	 <input type="text" name="total" id="total" value="<?php  echo empty($item['total'])?'0':$item['total'];?>" />   
           </div></td>
        </tr>
           <tr>
          <td>减库存方式：</td>
          <td>
       <input type="radio" name="totalcnf" value="0" id="totalcnf1" <?php  if(empty($item) || $item['totalcnf'] == 0) { ?>checked="true"<?php  } ?> /> 拍下减库存
            &nbsp;&nbsp;
          <input type="radio" name="totalcnf" value="1" id="totalcnf2"  <?php  if(!empty($item) && $item['totalcnf'] == 1) { ?>checked="true"<?php  } ?> /> 永不减库存
          </td>
        </tr>
		
			        <tr>
          <td>商品属性：</td>
          <td><div class="col-md-8">
                  <input type="checkbox" name="isrecommand" value="1" id="isrecommand" <?php  if($item['isrecommand'] == 1) { ?>checked="true"<?php  } ?> /> 首页推荐
                    &nbsp;    
                       </div>
            
                        </td>
        </tr>
		
					        <tr>
          <td>免运费商品：</td>
          <td><div class="col-md-8">
<input type="checkbox" name="issendfree" value="1" id="isnew" <?php  if($item['issendfree'] == 1) { ?>checked="true"<?php  } ?> /> 打勾表示此商品不会产生运费花销，否则按照正常运费计算。
                       </div>
            
                        </td>
        </tr>
		
		
		
		 <tr>
          <td>限时促销：</td>
          <td><div class="col-md-8">
<input type="checkbox" name="istime" id='istime' value="1" id="isnew" <?php  if($item['istime'] == 1) { ?>checked="true"<?php  } ?> /> 限时促销
         <input type="text" id="datepicker_timestart" name="timestart" value="2015-05-23 20:03" readonly="readonly" />
	<script type="text/javascript">
		$("#datepicker_timestart").datetimepicker({
			format: "yyyy-mm-dd hh:ii",
			minView: "0",
			//pickerPosition: "top-right",
			autoclose: true
		});
	</script> - 
	<input type="text"  id="datepicker_timeend" name="timeend" value="2015-05-23 20:03" readonly="readonly" />
	<script type="text/javascript">
		$("#datepicker_timeend").datetimepicker({
			format: "yyyy-mm-dd hh:ii",
			minView: "0",
			//pickerPosition: "top-right",
			autoclose: true
		});
	</script>  </div>
            
                        </td>
        </tr>
		
		
            <tr>
          <td>奖励积分：</td>
          <td><div class="col-md-5">
           <input type="text" name="credit" id="credit" value="<?php  echo empty($item['credit'])?'0':$item['credit'];?>" />
           
            <p class="help-block">会员购买商品赠送的积分, 如果不填写，则默认为不奖励积分</p>
               </div></td>
        </tr>
		
		
		
		
		
        <tr>
          <td>商品主图：</td>
          <td>
                  
                                 <div class="fileupload fileupload-new" data-provides="fileupload">
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
          <td style="width:12%">其他图片：</td>

          <td >
          	<div style="width:80%">
                   <span id="selectimage" tabindex="-1" class="btn btn-primary"><i class="icon-plus"></i> 上传照片</span><span style="color:red;">
                    <input name="piclist" type="hidden" value="<?php  echo $item['piclist'];?>" /></span>
                <div id="file_upload-queue" class="uploadify-queue"></div>
                <ul class="ipost-list ui-sortable" id="fileList">
                    <?php  if(is_array($piclist)) { foreach($piclist as $v) { ?> 
                    <li class="imgbox" style="list-style-type:none;display:inline;  float: left;  position: relative;   width: 125px;  height: 130px;">
                        <span class="item_box">
                            <img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $v['picurl'];?>" style="max-height:100%;">    </span>
                       		 <a  href="javascript:;" onclick="deletepic(this);" title="删除">删除</a>
                    
                        <input type="hidden" value="<?php  echo $v['picurl'];?>" name="attachment[]">
                    </li>
                    <?php  } } ?>
                </ul></div>
        </td>
        </tr>
	
              
      </table>
    </div> 
    
          	<table id="general-table" class="table table-hover">
        <tr>
          <td  style="width:12%">商品简单描述：</td>
          <td><div class="col-md-4">
                <textarea style="height:150px;"  id="description" name="description" cols="70"><?php  echo $item['description'];?></textarea>
                </div></td>
        </tr>
          <tr>
          <td >商品详细描述：</td>
          <td><div class="col-md-5">
                 <textarea style="height:300px;" id="container" name="content" cols="70"><?php  echo $item['content'];?></textarea>
                 </div></td>
        </tr>
		
		
		
		
      </table>
 
   <table class="table">
        
         <tr>
          <td>    <?php  include page('goods_option');?></td>
        </tr>
      </table>
      <table  class="table">
        
         <tr>
          <td><div class="col-md-4">
              <input type="submit" name="submit" value=" 确定 " class="btn btn-primary" />&nbsp;&nbsp;&nbsp;
              <input type="reset" value=" 重置 " class="btn btn-default" />
            </div></td>
        </tr>
      </table>
	  
	  
	  
    </div>
    </form>
  </div>
</div>
<link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>addons/common/kindeditor/themes/default/default.css" />
<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>addons/common/kindeditor/kindeditor-min.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>addons/common/kindeditor/lang/zh_CN.js"></script>

<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>addons/common/ueditor/ueditor.config.js?x=1211"></script>
<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>addons/common/ueditor/ueditor.all.min.js?x=141"></script>
<script type="text/javascript">var ue = UE.getEditor('container');</script>
<script language="javascript">
		var category = <?php  echo json_encode($children)?>;
   function fetchChildCategory(cid) {
	var html = '<option value="0">请选择二级分类</option>';
	if (!category || !category[cid]) {
		$('#cate_2').html(html);
		return false;
	}
	for (i in category[cid]) {
		html += '<option value="'+category[cid][i][0]+'">'+category[cid][i][1]+'</option>';
	}
	$('#cate_2').html(html);
}
fetchChildCategory(document.getElementById("pcate").options[document.getElementById("pcate").selectedIndex].value);
$(function(){
	 
	var i = 0;
	$('#selectimage').click(function() {
		var editor = KindEditor.editor({
			allowFileManager : false,
			imageSizeLimit : '10MB',
			uploadJson : '<?php  echo web_url('upload')?>'
		});
		editor.loadPlugin('multiimage', function() {
			editor.plugin.multiImageDialog({
				clickFn : function(list) {
					if (list && list.length > 0) {
						for (i in list) {
							if (list[i]) {
								html =	'<li class="imgbox" style="list-style-type:none;display:inline;  float: left;  position: relative;  width: 125px;  height: 130px;">'+
								'<span class="item_box"> <img src="'+list[i]['url']+'" style="width:80px;height:80px"></span>'+
								'<a href="javascript:;" onclick="deletepic(this);" title="删除">删除</a>'+
								'<input type="hidden" name="attachment-new[]" value="'+list[i]['filename']+'" />'+
								'</li>';
								$('#fileList').append(html);
								i++;
							}
						}
						editor.hideDialog();
					} else {
						alert('请先选择要上传的图片！');
					}
				}
			});
		});
	});
});
function deletepic(obj){
	if (confirm("确认要删除？")) {
		var $thisob=$(obj);
		var $liobj=$thisob.parent();
		var picurl=$liobj.children('input').val();
		$.post('<?php  echo create_url('site',array('name' => 'shop','do' => 'picdelete'))?>',{ pic:picurl},function(m){
			if(m=='1') {
				$liobj.remove();
			} else {
				alert("删除失败");
			}
		},"html");	
	}
}

    </script>
<?php  include page('footer');?>

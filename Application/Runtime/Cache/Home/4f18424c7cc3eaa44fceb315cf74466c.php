<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title><?php echo ($name); ?></title>
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=0.5, user-scalable=no">
<script src="/dzp/Public/js/jquery-1.7.2.min.js"> 
</script>
<script src="/dzp/Public/js/jquery.flexslider-min.js">
</script>
<script src="/dzp/Public/js/common.js">
</script>
<link href=/dzp/Public/css/memberinfo.css?v=1.2" rel="stylesheet">
<script src="/dzp/Public/js/index.js?v=1.1"> 
</script>
</head>
<body>
<div style='position: absolute; left:0px; top:0px;z-index: 999;'><img src="<?php echo ($logo); ?>" height="64" width="64"/></div>
<form method="post" action="" id="form1">
    <div class="block_huo_slider">
  <div class="flexslider" style="background: url('/dzp/Public/images/top.png') no-repeat; width:640px;height:349px;">
                    
                </div>
    </div>
    <div>
                
				<div class="usermain" style="min-height:150px;">
				    <div class="userimg">
                                        <img src="<?php echo ($photo); ?>">
				        <p class="p01" style="color:#FFF;padding:10px 0 0 10px;">
				       	 <u>排名</u>：第<?php echo ($empcount); ?>名
				        </p>
				    </div>
				    <div class="userinfo">
				        <p class="p01">
				        </p>
                                        <p style="margin-top:4px;">
				            <u>导购编号</u>：<?php echo ($employee_num); ?>号
				        </p>
				        <p style="margin-top:4px;">
				            <u>导购票数</u>：<span id="poll_num"><?php echo ($total); ?></span>票
				        </p>
				    
				        
				    </div>
				</div>
				
				<div class="main">
					
				<div class="infobtn">
				    <a href="javascript:;" onclick="poll_submit('<?php echo ($empid); ?>','<?php echo ($openid); ?>','<?php echo ($activeid); ?>','<?php echo ($trafficid); ?>');" class="btn poll_submit">
				        亲，点这投上一票！
				    </a>
				    <div>
				    </div>
				</div>
				</div>
				
				
            
                
            </div>
            
         <script type="text/javascript">
         
         function poll_submit(empid,openid,activeid,trafficid){
         		//点投票按钮后,ajax后台交互代码
	         	$.ajax({
				      type: 'POST',
				      dataType: 'json',
				      url: '<?php echo U("poll/draw");?>',
				      cache: false,
                                      data:{
                                        empid:empid,
                                        openid:openid,
                                        activeid:activeid,
                                        trafficid:trafficid
                                      },
				      success: function(json) {    
				     	if(json.status=='disable'){
                                            
                                            //alert(json.info);
                                            $('.poll_submit').html(json.info);
                                        }else if(json.status=='overdue'){
                                             //alert(json.info);
                                             $('.poll_submit').html(json.info);
                                        }else if(json.status=='chance'){
                                          //  alert(json.info);
                                            $('.poll_submit').html(json.info);
                                        }else{	
				      	if(json.status == 1){
				      		if(json.num > 0){
				      			$('.poll_submit').html('投票成功，今天还可以再投' + json.num + '票');
				      			$('#poll_num').html(parseInt($('#poll_num').html()) + 1);
				      		}else if(json.num == 0){
				      			$('.poll_submit').html('投票成功，今天的票已用完');	
				      			$('#poll_num').html(parseInt($('#poll_num').html()) + 1);
				      		}else{
				      			$('.poll_submit').html('你今天的票已用完，无法投票');	
				      		}
				      		
				      	}else{
				      		
				      		$('.poll_submit').html('活动尚未开始或已结束');	
				      		
				      	}
                                      }
				      },
				      error: function(){
						$('.poll_submit').html('投票失败');	
				      }
				      
				 });
			 
         
         	
         }
         </script>
         
            
        </form>
    </body>

</html>
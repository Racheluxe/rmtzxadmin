<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>融媒体中心招新|后台管理|详情|操作</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/edit.css" />
	<script type="text/javascript" src="__PUBLIC__/js/verify.js" ></script>
</head>
<body>
	<form method="POST"  action="<?php echo U('Index/handleEdit');?>" onsubmit="return verify()" enctype="multipart/form-data">
		<fieldset>
			<legend>详情|操作</legend>
			<input type="hidden" name="id" value="<?php echo ($id); ?>">
			<p>
				<span>姓名:<?php echo ($name); ?></span>
			</p>
			<p>
				<span>特长获奖:<br/></span>
				<textarea type="text" name="award" id="award" required="required" rows="5" cols="40" readonly="readonly"><?php echo ($award); ?></textarea>
			</p>
			<p>
				<span>主要经历:<br/></span>
				<textarea type="text" name="exp" id="exp" required="required" rows="5" cols="40" readonly="readonly"><?php echo ($exp); ?></textarea>
			</p>
			<p>
				<span>应聘理由:<br/></span>
				<textarea type="text" name="reason" id="reason" required="required" rows="5" cols="40" readonly="readonly"><?php echo ($reason); ?></textarea>
			</p>
			<button style="position:absolute;left: 150px;top: 421px;">录取</button> 
		</fieldset>
	</form>
</body>
</html>
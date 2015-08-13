<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>融媒体中心招新|后台管理</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="__PUBLIC__/css/view.css" media="screen" type="text/css" />
</head>
<body>
	<p class="navbar-text navbar-right welcome">欢迎您，<?php echo session('loggeduser');?>  <a href="<?php echo U('Index/logout');?>">登出</a></p>
	<ul class="nav nav-tabs">
		<li role="presentation" class="active"><a href="#">查看资料</a></li>
	</ul>
	<div class="container" style="width: 100%;">
		<table class="table table-striped table-hover">
			<tr>
				<th width="7%">姓名</th>
				<th width="8%">学号</th>
				<th width="4%">性别</th>
				<th>生日</th>
				<th>部门</th>
				<th>宿舍</th>
				<th>城市</th>
				<th>专业</th>
				<th>QQ</th>
				<th>邮箱</th>
				<th>电话</th>
				<th width="75px">录取情况</th>
				<th width="80px">详情|操作</th>
				<th width="80px">删除</th>
			</tr>
			<?php if(is_array($view_list)): $i = 0; $__LIST__ = $view_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="trid-<?php echo ($vo["id"]); ?>">
					<td width="10%"><?php echo ($vo["name"]); ?></td>
					<td width="10%"><?php echo ($vo["xh"]); ?></td>
					<td width="4%"><?php echo ($vo["sex"]); ?></td>
					<td><?php echo ($vo["birthday"]); ?></td>
					<td><?php echo ($vo["department"]); ?></td>
					<td><?php echo ($vo["dorm"]); ?></td>
					<td><?php echo ($vo["city"]); ?></td>
					<td><?php echo ($vo["spec"]); ?></td>
					<td><?php echo ($vo["qq"]); ?></td>
					<td><?php echo ($vo["email"]); ?></td>
					<td><?php echo ($vo["tel"]); ?></td>
					<td><?php echo ($vo["status"]); ?></td>
					<td width="80px"><a class="btn btn-primary" role="button" href="javascript:void(0)" onclick="window.open('__URL__/edit?id=<?php echo ($vo["id"]); ?>', 'newwindow', 'height=500, width=350, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no, status=no')">详情</a></td>
					<td width="80px"><a class="btn btn-danger" role="button" href="javascript:void(0)" onclick="del(<?php echo ($vo["id"]); ?>)">删除</a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
	</div>	
	<script type="text/javascript">
	function del (id)
	{
		question = confirm("你确认要删除此条记录吗？");
		if (question){
			$.post("<?php echo U('Index/delete');?>",{"id":id},
				function (back) {
					if (back.status == 0) 
					{
						alert("删除成功！")
					$("#trid-"+id).remove();//在html中移除对应项
				} 
				else
				{
					alert("删除失败！")
					location.reload();
				};
			}	)
		}
	}
	</script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery-1.11.3.min.js" ></script>
</body>
</html>
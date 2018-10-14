<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h2 class="jumbotron">튜터링 사이트</h2>
			<?php
				require_once("tools.php");

				session_start();

				$id = sessionVar("uid");
				$name = sessionVar("uname");
			?>
			<div class="input-group mb-3">
				<?php if($name){ ?>
					<h3><?= $name ?>님 환영합니다.</h3>
					<hr>
					<input type="submit" value="로그아웃" class="btn btn-primary" onclick="location.href = 'logout.php'">&nbsp
					<input type="submit" value="회원수정" class="btn btn-primary" onclick="location.href = 'member_update_form.php'">
				<?php }else{ ?>
					<input type="submit" value="로그인" class="btn btn-primary" onclick="location.href = 'login_form.php'">&nbsp
					<input type="submit" value="회원가입" class="btn btn-primary" onclick="location.href = 'member_join_form.php'">
				<?php } ?>
			</div>
	</div>
</body>
</html>
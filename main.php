<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div>
	<h2>시험용 사이트</h2>
		<?php
			require_once("tools.php");

			session_start();

			$id = sessionVar("uid");
			$name = sessionVar("uname");
		?>
			<?php if($name){ ?>
				<h3><?= $name ?>님 환영합니다.</h3>
				<input type="submit" value="로그아웃" onclick="location.href = 'logout.php'">
				<input type="submit" value="회원수정" onclick="location.href = 'member_update_form.php'">
			<?php }else{ ?>
				<input type="submit" value="로그인" onclick="location.href = 'login_form.php'">
				<input type="submit" value="회원가입" onclick="location.href = 'member_join_form.php'">
			<?php } ?>
</div>
</body>
</html>
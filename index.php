<!DOCTYPE html>
<html>
<head>
	<?php require("html_head.php") ?>
</head>
<body>
	<?php require("header.php") ?>
	<?php if($name){ ?>
				<h3><?= $name ?>님 환영합니다.</h3>
				<input type="submit" value="로그아웃" class="btn btn-danger" onclick="location.href = '<?= MEMBER_PATH ?>/logout.php'">
				<input type="submit" value="회원수정" class="btn btn-primary" onclick="location.href = '<?= MEMBER_PATH ?>/member_update_form.php'">
			<?php }else{ ?>
				<input type="submit" value="로그인" class="btn btn-primary" onclick="location.href = '<?= MEMBER_PATH ?>/login_form.php'">
				<input type="submit" value="회원가입" class="btn btn-primary" onclick="location.href = '<?= MEMBER_PATH ?>/member_join_form.php'">
			<?php } ?>
			<br><br>
	<?php require("sidebar.php") ?>

	여기는 곧 러브라이브 사이트가 될 거야

	<?php require("footer.php") ?>
</body>
</html>
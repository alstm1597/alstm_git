<div>
	<h2>시험용 사이트</h2>
		<?php
			require_once("tools.php");

			session_start();
		?>
			<?php if(isset($_SESSION["uname"])){ ?>
				<h3><?= $_SESSION["uname"] ?>님 환영합니다.</h3>
				<input type="submit" value="로그아웃" onclick="location.href = '<?= MEMBER_PATH ?>/logout.php'">
				<input type="submit" value="회원수정" onclick="location.href = '<?= MEMBER_PATH ?>/member_update_form.php'">
			<?php }else{ ?>
				<input type="submit" value="로그인" onclick="location.href = '<?= MEMBER_PATH ?>/login_form.php'">
				<input type="submit" value="회원가입" onclick="location.href = '<?= MEMBER_PATH ?>/member_join_form.php'">
			<?php } ?>
</div>
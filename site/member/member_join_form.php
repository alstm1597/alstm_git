<!DOCTYPE html>
<html lang="en">
<head>
	<?php require("../html_head.php") ?>
</head>
<body>
	<div>
		<?php require("../header.php") ?>
		<?php require("../sidebar.php") ?>
		<div class="container">
		  <h2>회원가입</h2>
		  <p>회원가입을 위해 아래의 모든 정보를 작성해 주세요.</p>
		  <form action="member_join.php" method="post">
		    <div class="form-group">
		      <label for="usr">ID</label><!-- 사용중인 아이디일 경우 회원가입 X -->
		      <input type="text" class="form-control" id="usr" name="id">
		    </div>
		    <div class="form-group">
		      <label for="pwd">Password</label>
		      <input type="password" class="form-control" id="pwd" name="pw">
		    </div>
		    <div class="form-group">
		      <label for="name">Name</label>
		      <input type="text" class="form-control" id="nam" name="name">
		    </div>
		    <button type="submit" class="btn btn-primary">회원가입</button>
		  </form>
		</div>
		<?php require("../footer.php") ?>
	</div>
		
</body>
</html>
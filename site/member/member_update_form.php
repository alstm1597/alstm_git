<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Join</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<?php 
	session_start();
	require_once("MemberDao.php");
	require_once("../tools.php");

	$uid = isset($_SESSION["uid"])?$_SESSION["uid"]:"";
	$mdao = new MemberDao();
	$member = $mdao->getMember($uid);

	if(!$member){
		errorBack("그런 사람은 없습니다.");
		exit();
	}
 ?>
<body>
	<div class="container">
	  <h2>회원수정</h2>
	  <form action="member_update.php" method="post">
	  	<div class="form-group">
	      <label for="usr">ID</label><!-- 사용중인 아이디일 경우 회원가입 X -->
	      <input type="text" class="form-control" readonly value="<?= $member['id'] ?>" id="usr" name="id">
	    </div>
	    <div class="form-group">
	      <label for="pwd">Password</label>
	      <input type="password" class="form-control" value="<?= $member['pw'] ?>" id="pwd" name="pw">
	    </div>
	    <div class="form-group">
	      <label for="name">Name</label>
	      <input type="text" class="form-control" value="<?= $member['name'] ?>" id="nam" name="name">
	    </div>
	    <button type="submit" class="btn btn-primary">수정</button>
	  </form>
	</div>
	
		
</body>
</html>
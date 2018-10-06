<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Test Site</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
		<div class="container">
		  <h2>로그인</h2>
		  <form action="login.php" method="post">
		    <div class="form-group">
		      <label for="usr">ID</label><!-- 사용중인 아이디일 경우 회원가입 X -->
		      <input type="text" class="form-control" id="usr" name="id">
		    </div>
		    <div class="form-group">
		      <label for="pwd">Password</label>
		      <input type="password" class="form-control" id="pwd" name="pw">
		    </div>
		    <button type="submit" class="btn btn-primary">Login</button>
		  </form>
		</div>
</body>
</html>
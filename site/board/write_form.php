<!DOCTYPE html>
<html>
<head>
	<?php require("../html_head.php") ?>
</head>
<body>
	<div>
		<?php require("../header.php") ?>
		<?php require("../sidebar.php") ?>
		<div class="jumbotron">
			<h1>게시글 쓰기</h1>
		</div>
		<div class="container">
			<form action="write.php" method="post">
				<div class="form-group">
					<label for="ti">제목</label>
					<input class="form-control" type="text" name="title" id="ti" required><br>
				</div>
				<div class="form-group">
					<label for="wr">작성자</label>
					<input class="form-control" type="text" name="writer" id="wr" required><br>
				</div>
				<div class="form-group">
					<label for="co">내용</label>
					<textarea class="form-control" name="content" rows="10" id="co" required></textarea><br>
				</div>
				<button class="btn btn-primary" type="submit">글등록</button>
				<button class="btn btn-primary" onclick="location.href='board.php'">목록보기</button>
			</form>
		</div>
		<?php require("../footer.php") ?>
	</div>
</body>
</html>
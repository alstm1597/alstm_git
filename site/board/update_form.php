<!DOCTYPE html>
<html>
<head>
	<?php require("../html_head.php") ?>
</head>
<body>
	<div>
		<?php
			require("../header.php");
			require("../sidebar.php");
			require_once("../tools.php");
			require_once("BoardDao.php");

			$num = requestValue("num");
			$page = requestValue("page");

			$dao = new BoardDao();
			$msg = $dao->getMsg($num);
		?>
		<div class="jumbotron">
			<h1>게시글 수정</h1>
		</div>
		<div class="container">
			<form action="<?= bdurl("update.php", $num, $page) ?>" method="post">
				<div class="form-group">
					<label for="ti">제목</label>
					<input class="form-control" type="text" name="title" id="ti" value="<?= $msg['title'] ?>"><br>
				</div>
				<div class="form-group">
					<label for="wr">작성자</label>
					<input class="form-control" type="text" name="writer" id="wr" value="<?= $msg['writer'] ?>" required><br>
				</div>
				<div class="form-group">
					<label for="co">내용</label>
					<textarea class="form-control" name="content" rows="10" id="co" required><?= $msg['content'] ?></textarea><br>
				</div>
				<button class="btn btn-primary" type="submit">글등록</button>
				<button class="btn btn-primary" type="button" onclick="location.href='<?= bdUrl("view.php", $num, $page) ?>'">수정취소</button>
			</form>
		</div>
		<?php require("../footer.php") ?>
	</div>
</body>
</html>
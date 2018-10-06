<!DOCTYPE html>
<html>
<head>
	<?php require("../html_head.php") ?>
	<script>
		function processDelete(num){
			res = confirm("정말로 삭제하시겠습니까?");
			if(res){
				alert("삭제를 완료하였습니다.");
				location.href="delete.php?num="+num;
			}
		}
	</script>
</head>
<body>
	<div>
		<?php 
		/*
			1. 클라이언트로부터 전송되어온 Num 값을 추출
			2. 그 Num 값으로 DB에서 게시글 레코드를 읽고
			3. 그 읽은 레코드를 이용해서 게시글 상세정보를 html로 만든다.
		*/
			require("../header.php");
			require("../sidebar.php");
			require_once("../tools.php");
			require_once("BoardDao.php");

			$num = requestValue("num");
			$page = requestValue("page");

			$dao = new BoardDao();
			$dao->increaseHits($num);
			$msg = $dao->getMsg($num);

	  		?>
		<div class="jumbotron">
			<h1>게시글</h1>
		</div>
		<div class="table">
			<table>
				<tr>
					<th>제목</th>
					<td><?= $msg["title"] ?></td>
				</tr>
				<tr>
					<th>작성자</th>
					<td><?= $msg["writer"] ?></td>
				</tr>
				<tr>
					<th>작성일</th>
					<td><?= $msg["regtime"] ?></td>
				</tr>
				<tr>
					<th>조회수</th>
					<td><?= $msg["hit"] ?></td>
				</tr>
				<tr>
					<th>내용</th>
					<td><?= $msg["content"] ?></td>
				</tr>
			</table>
			<div class="float-right">
				<button class="btn btn-primary" style="margin-bottom: 20px; margin-right: 20px" onclick="location.href='board.php'">목록보기</button>
				<button class="btn btn-primary" style="margin-bottom: 20px; margin-right: 20px" onclick="location.href='<?= bdUrl("update_form.php", $num, $page) ?>'">수정하기</button>
				<button class="btn btn-primary" style="margin-bottom: 20px; margin-right: 20px" onclick="processDelete('<?= $msg["num"] ?>')">삭제하기</button>
			</div>
		</div>
		<?php require("../footer.php") ?>
	</div>
</body>
</html>

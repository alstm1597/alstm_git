<?php 

	require_once("../tools.php");
	require_once("BoardDao.php");

	$page = requestValue("page");

	define("NUM_LINES", 3);			
	define("NUM_PAGE_LINKS", 3);	

	
	$dao = new BoardDao();
	$numMsgs = $dao->getNumMsgs();

	if($numMsgs > 0 ){
		$numPages = ceil($numMsgs / NUM_LINES);

		if($page < 1)
			$page = 1;
		if($page > $numPages)
			$page = $numPages;
						

		$start = ($page - 1) * NUM_LINES; 
		$msgs = $dao->getManyMsgs($start, NUM_LINES);

		$firstLink = floor(($page - 1) / NUM_PAGE_LINKS) * NUM_PAGE_LINKS + 1;
		$lastLink = $firstLink + NUM_PAGE_LINKS - 1;
		if($lastLink > $numPages)
			$lastLink = $numPages;
	}
	if($lastLink > $numPages)
			$lastLink = $numPages;

?>
<!DOCTYPE html>
<html>
<head>
	<?php require("../html_head.php") ?>
	<style>
		a:hover {
			text-decoration: none
		}
	</style>
</head>
<body>
	<div>
		<?php require("../header.php") ?>		
		<?php require("../sidebar.php") ?>
		<div class="jumbotron">
			<h2>게시글 리스트</h2>
		</div>
		<div class="container; text-center">
			<?php if ($numMsgs > 0) : ?>
				<table class="table table-hover">
					<tr>
						<th>번호</th>
						<th>제목</th>
						<th>작성자</th>
						<th>작성일시</th>
						<th>조회수</th>
					</tr>
					 <?php foreach($msgs as $msg) : ?>
					 	<tr>
					 		<td><?= $msg["num"] ?></td>
					 		<?php if($id) : ?>
					 			<td><a href="view.php?num=<?= $msg["num"] ?>&page=<?= $page ?>"><?= $msg["title"] ?></a></td>
					 		<?php else : ?>
					 			<td>
					 				<a href="board.php?page=<?= $page ?>" onclick="alert('궁금하면 로그인을 하십시오.')"><?= $msg["title"] ?></a>
					 			</td>
					 		<?php endif ?>
					 		<td><?= $msg["writer"] ?></td>
					 		<td><?= $msg["regtime"] ?></td>
					 		<td><?= $msg["hit"] ?></td>
					 	</tr>
					<?php endforeach ?>
				</table>
				
				<?php if($id) : ?>
					<div class="float-right" style="margin-right: 50px">
						<button class="btn btn-primary" onclick="location.href='write_form.php'">글쓰기</button>
					</div>
				<?php endif ?>

				<br>

				<?php if($firstLink > 1) : ?>
					<a href="<?= bdUrl("board.php", 0, 1) ?>"><<</a>&nbsp; <!--$page - NUM_PAGE_LINKS-->
				<?php endif ?>

				<?php if($page > 1) : ?>
					<a href="<?= bdUrl("board.php", 0, $firstLink - NUM_PAGE_LINKS)  ?>"><</a>&nbsp; <!--$page - NUM_PAGE_LINKS-->
				<?php endif ?>
				
				<?php for($i = $firstLink; $i <= $lastLink; $i++) : ?>
					<a href="<?= bdUrl("board.php", 0, $i) ?>">
						<?php if($i == $page) : ?>
								<b><?= $i ?></b></a>&nbsp;
						<?php else : ?>
								<?= $i ?></a>&nbsp;
						<?php endif ?>
					</a>
				<?php endfor ?>

				<?php if($page < $numPages) : ?>
					<a href="<?= bdUrl("board.php", 0, $lastLink + 1) ?>">></a>&nbsp;
				<?php endif ?>

				<?php if($lastLink < $numPages) : ?>
					<a href="<?= bdUrl("board.php", 0, $numPages) ?>">>></a>
				<?php endif ?>
			<?php endif ?>
		</div>
		<?php require("../footer.php") ?>
	</div>	
</body>
</html>
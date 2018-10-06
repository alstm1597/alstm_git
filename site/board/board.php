<?php 
		/*
			DB에서 게시글 리스트를 2차원 배열로 가져온다.
			[
				['Num'=>1, 'Title'=>'게시글1', 'Writer'=>'홍길동1', 'Regitime'=>'2018-10-01', 'Hits'=>1],
				[2, '게시글2', '홍길동2', '2018-10-01', 1],
				[3, '게시글3', '홍길동3', '2018-10-01', 1],
				[4, '게시글4', '홍길동4', '2018-10-01', 1],
			]
			$msgs = DB에서 2차원 연관 배열 형태로 가져온 각 게시글에 대해

			foreach($msgs as $msg){
				foreach($msg as $val){
			
				}
			}

		*/
	require_once("../tools.php");
	require_once("BoardDao.php");

	//전달된 페이지 번호 저장
	$page = requestValue("page");

	define("NUM_LINES", 5);			//게시글 리스트의 줄수
	define("NUM_PAGE_LINKS", 3);	//화면에 표시될 페이지 링크의 수

	//게시판의 전체 게시글 수 구하기
	$dao = new BoardDao();
	$numMsgs = $dao->getNumMsgs();

	if($numMsgs > 0 ){
		//전체 페이지 수 구하기
		$numPages = ceil($numMsgs / NUM_LINES);

		//현재 페이지 번호가 (1 ~ 전체 페이지 수)를 벗어나면 보정
		if($page < 1)
			$page = 1;
		if($page > $numPages)
			$page = $numPages;
						

		//리스트에 보일 게시글 데이터 읽기
		$start = ($page - 1) * NUM_LINES; //첫 줄의 레코드 번호
		$msgs = $dao->getManyMsgs($start, NUM_LINES);

		//페이지네이션 컨트롤의 처음/마지막 페이지 링크 번호 계산
		$firstLink = floor(($page - 1) / NUM_PAGE_LINKS) * NUM_PAGE_LINKS + 1;
		$lastLink = $firstLink + NUM_PAGE_LINKS - 1;
		if($lastLink > $numPages)
			$lastLink = $numPages;
	}

	//현재 로그인한 사용자 아이디 저장( 로그아웃 상태이면 빈 문자열 )

	session_start();
	if(isset($_SESSION["uid"]))
		$logId = $_SESSION["uid"];
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
		<div class="container">
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
				 		<td><a href="view.php?num=<?= $msg["num"] ?>"><?= $msg["title"] ?></a></td>
				 		<td><?= $msg["writer"] ?></td>
				 		<td><?= $msg["regtime"] ?></td>
				 		<td><?= $msg["hit"] ?></td>
				 	</tr>
				<?php endforeach ?>
			</table>
		</div>
		<div class="float-right" style="margin-right: 50px">
			<button class="btn btn-primary" onclick="location.href='write_form.php'">글쓰기</button>
		</div>
		<?php require("../footer.php") ?>
	</div>	
</body>
</html>
<?php 
	require_once("../tools.php");
	require_once("BoardDao.php");

	$num = requestValue("num");
	$page = requestValue("page");
	$dao = new BoardDao();
	$dao->deleteMsg($num);

	//글 목록 페이지로 복귀
	goNow(bdUrl("board.php", 0, $page));
 ?>
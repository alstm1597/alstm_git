<?php 
	require_once("../tools.php");
	require_once("BoardDao.php");

	$num =  requestValue("num");
	$page = requestValue("page");
	$title = requestValue("title");
	$writer = requestValue("writer");
	$content = requestValue("content");

	if($title && $writer && $content){
		$dao = new BoardDao();
		$msg = $dao->updateBoard($num, $title, $writer, $content);

		//글 상세보기 페이지로 복귀
		goNow(bdUrl("view.php", $num, $page));
	}else{
		errorBack("모든 칸을 작성해주십시오.");
	}
 ?>
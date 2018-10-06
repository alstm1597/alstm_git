<?php 
	/*
		1. 요청 정보에서 작성자, 제목, 내용을 추출
			1.1 정보가 부족해 (입력을 다 안했어)
				1.1.1 에러 메시지출력 & 뺵
			1.2 정보가 다 있어
				1.2.1 추출한 정보를 db에 insert
				1.2.2 게시판의 메인페이지로 이동(board.php)
		2. 추출한 정보를 db에 insert

		3. 게시판의 메인 페이지로 이동(board.php)
	*/
		require_once("../tools.php");
		require_once("BoardDao.php");
		$title = requestValue("title");
		$writer = requestValue("writer");
		$content = requestValue("content");

		if($title && $writer && $content){
			//DB에 insert
			$dao = new BoardDao();
			$dao->insertMsg($title, $writer, $content);
			okGo("정상적으로 입력되었습니다.", "board.php");
		}else{
			errorBack("다시 입력하십시오.");
		}

 ?>
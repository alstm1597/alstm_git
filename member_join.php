	<?php
		require_once("tools.php");
		require_once("MemberDao.php");

		$id = requestValue("id");
		$pw = requestValue("pw");
		$name = requestValue("name");
		

		if($id && $pw && $name){
			$mdao = new MemberDao();
			if($mdao->getMember($id)){
				errorBack('이미 사용중인 아이디 입니다.');
				exit();
			}else{
				$mdao->insertMember($id, $pw, $name);
				okGo("가입이 완료되었습니다.", MAIN_PAGE);
			}
		}else{
			errorBack("모든칸을 입력해 주십시오.");
		}
	 ?>
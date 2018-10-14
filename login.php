<?php 
		session_start();

		require_once("tools.php");
		require_once("MemberDao.php");

		$id = requestValue("id");
		$pw = requestValue("pw");

		$mdao = new MemberDao();
		$member = $mdao->getMember($id);

		
		if($member && $member["pw"] == $pw){
			$_SESSION["uid"] = $id;
			$_SESSION["uname"] = $member["name"];
			goNow(MAIN_PAGE);
		
		}else{
			errorBack("존재하지 않는 계정입니다.");
		}
 ?>
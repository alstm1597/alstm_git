<?php 
	class BoardDao{
		private $db;
		//다른 파일에서 new MemberDao가 호출되면 __construct가 자동 호출됨 자바의 생성자 격
		public function __construct(){
			try{
				$this->db = new PDO("mysql:host=localhost;dbname=php", "root", "1111");

				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				exit($e->getMessage());
			}
		}

		public function getMsg($num){
			try{
				$sql = "select * from board num where num = :num";

				$pstmt = $this->db->prepare($sql);
				$pstmt->bindValue(":num", $num, PDO::PARAM_STR);
				$pstmt->execute();
				$msg = $pstmt->fetch(PDO::FETCH_ASSOC);
			}catch(PDOException $e){
				exit($e->getMessage());
			}
			return $msg;
		}

		public function getNumMsgs(){
			try{
				$sql = "select count(*) from board";

				$pstmt = $this->db->prepare($sql);
				$pstmt->execute();

				$numMsgs = $pstmt->fetchColumn();
			}catch(PDOException $e){
				exit($e->getMessage());
			}
			return $numMsgs;
		}

		public function getManyMsgs($start, $rows){
			try{
				/*
				준비하다, 실행준비, DB서버가...
				1. 문법검사
				2. 유효성검사
				3. 실행계획 수립
				*/
				$sql = "select * from board order by num desc limit :start, :rows";
				
				$pstmt = $this->db->prepare($sql);
				$pstmt->bindValue(":start", $start, PDO::PARAM_INT);
				$pstmt->bindValue(":rows", $rows, PDO::PARAM_INT);
				$pstmt->execute();
				$msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC); //fechall()는 열 전부를 PDO::FETCH_ASSOC 연관배열로

			}catch(PDOException $e){
				exit($e->getMessage());
			}
			return $msgs;
		}
		public function insertMsg($title, $writer, $content, $id){
			/*
				sql문 만들고 insert문
				prepare 시키고
				넘어온 값 binding 시키고
				실행요청하고
			*/
			try{
				$sql = "insert into board(title, writer, content, id) values(:title, :writer, :content, :id)";

				$pstmt = $this->db->prepare($sql);
				$pstmt->bindValue(":title", $title, PDO::PARAM_STR);
				$pstmt->bindValue(":writer", $writer, PDO::PARAM_STR);
				$pstmt->bindValue(":content", $content, PDO::PARAM_STR);
				$pstmt->bindValue(":id", $id, PDO::PARAM_STR);
				$pstmt->execute();	
			}catch(PDOException $e){
				exit($e->getMessage());
			}
		}

		public function deleteMsg($num){
			try{
				$sql = "delete from board where num=:num";

				$pstmt = $this->db->prepare($sql);
				$pstmt->bindValue(":num", $num, PDO::PARAM_INT);
				$pstmt->execute();
			}catch(PDOException $e){
				exit($e->getMessage());
			}
		}

		public function updateBoard($num, $title, $writer, $content, $id){
			try{
				$sql = "update board set title=:title, writer=:writer, content=:content, id=:id where num=:num";

				$pstmt = $this->db->prepare($sql);
				$pstmt->bindValue(":title", $title, PDO::PARAM_STR);
				$pstmt->bindValue(":writer", $writer, PDO::PARAM_STR);
				$pstmt->bindValue(":content", $content, PDO::PARAM_STR);
				$pstmt->bindValue(":id", $id, PDO::PARAM_STR);
				$pstmt->bindValue(":num", $num, PDO::PARAM_INT);

				$pstmt->execute();
				
			}catch(PDOException $e){
				exit($e->getMessage());
			}
		}
		public function increaseHits($num){
			try{
				$sql = "update board set hit=hit+1 where num=:num";

				$pstmt = $this->db->prepare($sql);
				$pstmt->bindValue(":num", $num, PDO::PARAM_INT);
				$pstmt->execute();
			}catch(PDOException $e){
				exit($e->getMessage());
			}
		}
	}
 ?>
<?php
	require_once('UserDB.php');
	/**
	 * 
	 */
	class CheckTopicCoursed extends UserDB
	{
		private $accountid;
		function __construct($accountid){
			$this->accountid = $accountid;
		}
		// public function fetchAll($username, $password){
		// 	$this->username = $username;
		// 	$this->password = $password;
		// }
		public function checkTopicCoursedMusic(){
			$sql = 'SELECT `topicid` FROM `teach-music` WHERE accountid = "'.$this->accountid.'"' ;
			$conn = $this->connect();
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			if(isset($row)){
				$_SESSION['music'] = true;
			}else{
				$_SESSION['music'] = false;
			}
		}
		public function checkTopicCoursedKeyboard(){
			$sql = 'SELECT `topicid` FROM `teach-keyboard` WHERE accountid = "'.$this->accountid.'"' ;
			$conn = $this->connect();
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			if(isset($row)){
				$_SESSION['keyboard'] = true;
			}else{
				$_SESSION['keyboard'] = false;
			}
		}
		public function checkTopicCoursedGuitar(){
			$sql = 'SELECT `topicid` FROM `teach-guitar` WHERE accountid = "'.$this->accountid.'"' ;
			$conn = $this->connect();
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			if(isset($row)){
				$_SESSION['guitar'] = true;
			}else{
				$_SESSION['guitar'] = false;
			}
		}
		public function checkTopicCoursedBand(){
			$sql = 'SELECT `topicid` FROM `band` WHERE accountid = "'.$this->accountid.'"' ;
			$conn = $this->connect();
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			if(isset($row)){
				$_SESSION['band'] = true;
			}else{
				$_SESSION['band'] = false;
			}
		}
	}
?>
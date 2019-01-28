<?php 
	require_once('UserDB.php');
	class TopicChildren extends UserDB{
		private $topicid;
		function __construct($topicid){
			$this->topicid = $topicid;
		}
		function getIdTopicChildren(){
			$sql = 'SELECT `id` FROM `topic-children` WHERE topicid = "'.$this->topicid.'"' ;
			$conn = $this->connect();
			$result = mysqli_query($conn, $sql);
			$arr = array();
			while($row = mysqli_fetch_assoc($result)){
				array_push($arr,$row['id']);
			}
			return $arr;
		}
		function getNameTopicChildren(){
			$sql = 'SELECT `name` FROM `topic-children` WHERE topicid = "'.$this->topicid.'"' ;
			$conn = $this->connect();
			$result = mysqli_query($conn, $sql);
			$arr = array();
			while($row = mysqli_fetch_assoc($result)){
				array_push($arr,$row['name']);
			}
			return $arr;
		}
	}
	
?>
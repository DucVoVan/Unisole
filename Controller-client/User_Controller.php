<?php 
	session_start();
	/**
	 * 
	 */
	
	require_once('../Model-client/UserModel.php');
	require_once('../Model-client/UserModelLogin.php');
	require_once('../Model-client/CheckTopicCoursed.php');
	require_once('../Model-client/Course-registered.php');
	require_once('../Model-client/UserTeacherModelLogin.php');
	require_once('../Model-client/UserAdminModelLogin.php');
	require_once('../Model-client/Topic.php');
	require_once('../Model-client/Course.php');
	
	class User_Controller
	{
		public function login_admin(){
			$username = isset($_POST['username'])? $_POST['username']: '' ;
			$password = isset($_POST['password'])? $_POST['password']: '' ;
			$password = md5($password);
			$user = new UserAdminModelLogin($username, $password);
			$row = $user->authlogin();
			$_SESSION['admin_id'] = $row['id'];

			if($row){
				header("Location: http://localhost/Unisole/views/admin.php");
			}
		}
		
		public function login_teacher(){
			$username = isset($_POST['username'])? $_POST['username']: '' ;
			$password = isset($_POST['password'])? $_POST['password']: '' ;
			$password = md5($password);
			$user = new UserTeacherModelLogin($username, $password);
			$row = $user->authlogin();
			$_SESSION['teacher_id'] = $row['id'];

			if($row){
				header("Location: http://localhost/Unisole/views/Teacher-point.php");
			}else{
				echo "fail";
			}
		}

		public function register(){
			$username = isset($_POST['username'])? $_POST['username']: '' ;
			$password = isset($_POST['password'])? $_POST['password']: '' ;
			$password = md5($password);
			$fullname = isset($_POST['fullname'])? $_POST['fullname']: '' ;
			$phone = isset($_POST['phone'])? $_POST['phone']: '' ;
			$phone = intval($phone);
			$email = isset($_POST['email'])? $_POST['email']: '' ;
			if(empty($username)||empty($password)||empty($fullname)||empty($phone)||empty($email)){
				header("Location: http://localhost/Unisole/register.html");
			}else{
				$user = new UserModel($username,$password,$fullname,$email,$phone);
				if($user->insertUser()){
					header("Location: http://localhost/Unisole/Intermediate.html?username=$username");
				}else{
					header("Location: http://localhost/Unisole/register.html");
				}
			}
		}

		public function login(){
			$username = isset($_POST['username'])? $_POST['username']: '' ;
			$password = isset($_POST['password'])? $_POST['password']: '' ;
			$password = md5($password);
			$user = new UserModelLogin($username, $password);
			$row = $user->authlogin();
			$_SESSION['id'] = $row['id'];

			if($row){
 				// Kiểm tra xem account đã chọn khóa học nào chưa, nếu chọn rồi thì chuyển sang trang cá nhân, nếu chưa chọn thì ta về trang đánh giá năng lực Markingforce.php
 				$checkCourse = new CourseRegistered();
 				$checkMusic = new CheckTopicCoursed($row['id']);
 				$checkMusic->checkTopicCoursedMusic();
 				$checkMusic->checkTopicCoursedGuitar();
 				$checkMusic->checkTopicCoursedKeyboard();
 				$checkMusic->checkTopicCoursedBand();
 				if($checkCourse->checkCourse($row['id'])){
 					
 					header("Location: http://localhost/Unisole/view-client/User.php");
 				}else{
 					header("Location: http://localhost/Unisole/view-client/pickcourse.php");
 				}
 				
			}else{
				header("Location: http://localhost/Unisole/?f=fail&username=$username");
			}
		}
		public function load_topicchild($name){
			$topic = new Topic();
			$topic->getTopic($name);
		}
		public function load_course($id){
			$course = new Course();
			$course->getCourse($id);
		}
		public function register_course($insert, $account_id){
			$register = new CourseRegistered();
			$register->register_course_DB($insert, $account_id);
		}
	}
	$controller = isset($_POST['controller'])? $_POST['controller']: '';
	$action		= isset($_POST['action'])? $_POST['action']: '';
	$id         = isset($_POST['id'])? $_POST['id']: '';
	$name      	= isset($_POST['name'])? $_POST['name']: '';
	$insert     = isset($_POST['insert'])? $_POST['insert']: '';
	$account_id = isset($_SESSION['id'])? $_SESSION['id']: '';

	$run = new $controller();
	if(!empty($id))
		{
			$run->$action($id);
		}
	else if(!empty($name))
		{
			$run->$action($name);
		}
	else if(!empty($insert))
		{
			$run->$action($insert,$account_id);
		}
	else
		{
			$run->$action();
		}
		// echo '<pre>';
		// print_r($_POST['insert']);
		// echo '</pre>';
?>
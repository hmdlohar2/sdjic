<?php 
include "common.php";


//Register User -----------------------------------------------------
if(isset($_POST['register'])){
	$name=filter_data($_POST['name']);
	$username=filter_data($_POST['username']);
	$email=filter_data($_POST['email']);
	$password=filter_data($_POST['password']);
	if(empty($name) || empty($username) ||empty($email)||empty($password)){
		echo "missingData";
		return;
	}
	$passwd=md5($password);
	$res=sql_nonquery("insert into users (name,username,email,password) values ('{$name}','{$username}','{$email}','{$passwd}')");
	if($res==1){
		echo "success";
	}
	else{
		echo "problemInserting";
	}
}

//Login Authentication -----------------------------------------------------
else if(isset($_POST['login'])){
	
	$username=filter_data($_POST['username']);
	$password=filter_data($_POST['password']);
	$passwd=md5($password);
	$rs=sql_query("select * from users where username='{$username}'");
	if(count($rs)==0){
		echo "userNotFound";
	}
	else{

		if($rs[0]['password']==$passwd){
			$_SESSION['userLogged']=$rs[0]['id'];
			echo "success";

		}
		else{
			echo "passwordDoNotMatch";
		}
	}
}


//Update User's Profile -----------------------------------------------------
else if(isset($_POST['profileInfo'])){
	if(isLogged()){
		$userData=sql_query("select * from user_profiles where user_id={$_SESSION['userLogged']}");
		if(count($userData)==0){
			echo "profileNotFound";
		}
		else{
			echo json_encode($userData[0]);
		}
	}
	else{
		echo "profileNotFound";
	}
	return;
}
else if(isset($_POST['loginInfo'])){
	if(isLogged()){
		$userData=sql_query("select id,username,name,email from users where id={$_SESSION['userLogged']}");
		$userData[0]['logged']=true;
		echo json_encode($userData[0]);
	}
	else{
		echo "{\"logged\": false}";
	}
	return;
}
else if(isset($_POST['updateProfilePic'])){
	if(isLogged()){
		$sourcePath = $_FILES['img']['tmp_name'];
		$tt=explode(".",$_FILES['img']['name']);
		$ext=end($tt);
		$path="user_pics/{$_SESSION['userLogged']}.png";
		$res=move_uploaded_file($sourcePath,$path) ; 
		if($res){
			echo "success";
		}
		else{
			echo "error";
		}

	}
	else{
		echo "userNotLogged";
	}
	return;
}

else if(isset($_POST['updateProfile'])){
	if(isLogged()){
		$name=filter_data($_POST['name']);
		$username=filter_data($_POST['username']);
		$email=filter_data($_POST['email']);
		$gender=filter_data($_POST['gender']);
		$dob=filter_data($_POST['dob']);
		$address=$_POST['address'];
		
		
		$res=sql_nonquery("update users set name='{$name}', username='{$username}',email='{$email}' where id={$_SESSION['userLogged']}");

		$res1=sql_query("select count(user_id) as count from user_profiles where user_id={$_SESSION['userLogged']}");
		$res2="";
		if($res1[0]['count']==0){
			$res2=sql_nonquery("insert into user_profiles (user_id,dob,gender,address) values ({$_SESSION['userLogged']},'{$dob}','{$gender}','{$address}')");
		}
		else{
			$res2=sql_nonquery("update user_profiles set dob='{$dob}', gender='{$gender}',address='{$address}' where user_id={$_SESSION['userLogged']}");
		}

		if($res && $res2){
			echo "success";
		}
		else{
			echo "error";
		}
	}
	else{
		echo "userNotLogged";
	}
	return;
}

function filter_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function saveFile($path, $data)
{
    $file = fopen($path, "w+");
    if (!$file) {
        return false;
    } else if (fwrite($file, $data)) {
        return true;
    } else {
        return false;
    }
}
function savePng($path,$data){
    $data = str_replace('data:image/png;base64,', '', $data);
    $data = str_replace(' ', '+', $data);
    $data = base64_decode($data);
    if (file_put_contents($path, $data)) {
        return true;
    } else {
    	return false;
    }
}
function deleteFile($path){
	if(is_file($path)){
		if(unlink($path)){
			return true;
		}
	}
	return false;
}
function ajaxGet($url){
	$ch = curl_init();
	$curlConfig = array(
	    CURLOPT_URL            => $url,
	    CURLOPT_RETURNTRANSFER => true,
	);
	curl_setopt_array($ch, $curlConfig);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

?>
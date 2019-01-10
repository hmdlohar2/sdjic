<?php 
include "../common.php";

//print_r($_POST);
//Register User -----------------------------------------------------
if(isset($_GET['users_add'])){
	$name=filter_data($_POST['name']);
	$username=filter_data($_POST['username']);
	$email=filter_data($_POST['email']);
	$password=filter_data($_POST['password']);
	$user_role=filter_data($_POST['user_role']);
	if(empty($name) || empty($username) ||empty($email)||empty($password)){
		echo "missingData";
		return;
	}
	$passwd=md5($password);
	$userExist = sql_query("select count(id) as count from users where username='{$username}'");
	if($userExist[0]['count'] >=1){
		echo "userExist";
		return;
	}
	$query  ="insert into users (name,username,email,password,user_role) values ('{$name}','{$username}','{$email}','{$passwd}','{$user_role}')";

	$res=sql_nonquery($query);
	if($res==1){
		echo "success";
	}
	else{
		echo "problemInserting:";
	}
}


if(isset($_GET['user_update'])){
$name=filter_data($_POST['name']);
	$id=filter_data($_POST['id']);
	$username=filter_data($_POST['username']);
	$email=filter_data($_POST['email']);
	if(empty($name) || empty($username) ||empty($email)){
		echo "missingData";
		return;
	}

	$query  ="update users set name='{$name}', username='{$username}',email='{$email}' where id={$id}";
	$res=sql_nonquery($query);
	if($res==1){
		echo "success";
	}
	else{
		echo "problemUpdating:". $res;
	}
}
if(isset($_GET['user_delete'])){
	$id=filter_data($_POST['id']);
	$query ="delete from users where id={$id}";
	$res=sql_nonquery($query);
	if($res==1){
		echo "success";
	}
	else{
		echo "problemDeleting:" .$res;
	}
}
if(isset($_GET['event_add'])){
	
	$type=filter_data($_POST['type']);
	$start_date=filter_data($_POST['start_date']);
	$end_date=filter_data($_POST['end_date']);
	$name=filter_data($_POST['name']);
	$description=filter_data($_POST['description']);
		
	if(empty($start_date) || empty($end_date) ||empty($name)||empty($type)){
		echo "missingData";
		return;
	}
	$query  ="insert into events (type,start_date,end_date,name,description
) values ('{$type}','{$start_date}','{$end_date}','{$name}','{$description}')";

	$res=sql_nonquery($query);
	if($res==1){
		echo "success";
	}
	else{
		echo "problemInserting:";
	}
}


if(isset($_GET['event_update'])){
$name=filter_data($_POST['name']);
	$id=filter_data($_POST['id']);
	$username=filter_data($_POST['username']);
	$email=filter_data($_POST['email']);
	if(empty($name) || empty($username) ||empty($email)){
		echo "missingData";
		return;
	}

	$query  ="update events set type='{$type}', start_date='{$start_date}',end_date='{$end_date}',name='{$name}',description='{$description}' where id={$id}";
	$res=sql_nonquery($query);
	if($res==1){
		echo "success";
	}
	else{
		echo "problemUpdating:". $res;
	}
}

if(isset($_GET['event_delete'])){
	$id=filter_data($_POST['id']);
	$query ="delete from events where id={$id}";
	$res=sql_nonquery($query);
	if($res==1){
		echo "success";
	}
	else{
		echo "problemDeleting:" .$res;
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
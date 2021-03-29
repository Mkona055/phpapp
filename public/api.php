<?php
header("Content-Type: application/json");
$all = getallheaders();
$mutant = $all["X-Men"];
$auth = explode(" ",$all["Authentication"]);
list($type, $token) = $auth;


$dbconn = pg_connect("host=localhost port=5432 dbname=phpapp password =yourpassword");
$result = pg_query($dbconn, "SELECT token FROM clients");

$count = pg_num_rows($result);
while ($row = pg_fetch_assoc($result)){

	$count--;

	if ($token == $row['token']){
		$reply = ["token" => $token,"type"=>$type];
		echo json_encode($reply);
		break;

	}else if($count == 0){
		http_response_code(401);
		$error = ["error"=>'Invalid Token'];
		$headers = ["token"=>$token,"type"=>$type];
		echo json_encode($error);
		echo "\n";
		echo json_encode($headers);
		echo "\n";
		break;
	}
}

switch ($mutant){
	case "Wolverine":
	$name = "Logan";
	$reply = ["mutant"=> $mutant, "name"=>$name];
	echo json_encode($reply);
	break;

	case null:
	http_response_code(400);
	$error = ["error"=>'Please provide an X-Men mutant and reveal their human name'];
	$headers = ["headers"=>$all];
	echo json_encode($error);
	echo "\n";
	echo json_encode($headers);
	break;

	default:
	$name = "Unknown";
	$reply = ["mutant"=> $mutant, "name"=>$name];
	echo json_encode($reply);
}

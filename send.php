<?php 
	define('SERVER_API_KEY', 'AAAAjfN0wn4:APA91bEKcCeOfFpeNLaIgU032GFbfVVuhES_zZVuTuOxTRIajwJsHnhvccESa3WSkkhzYLg0w65D2po6iIlhwJsIQ3fBcjyz_j5CgNSJrGAR8kxd2fhxCsUcOPjp5gyDhla4oFvj_k_g');
	$config = require './config/config.php';

	// require 'DbConnect.php';
	// $db = new DbConnect;
	// $conn = $db->connect();
	// $stmt = $conn->prepare('SELECT * FROM tokens');
	// $stmt->execute();
	// $tokens = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// foreach ($tokens as $token) {
	// 	$registrationIds[] = $token['token'];
	// }

	// $tokens = ['cCLA1_8Inic:APA91bGhuCksjWEETYWVOh04scsZInxdWmXekEr5F9-1zJuTDZDw3It_tNmpA__PmoxDTISZzplD_ciXvsuw2pMtYSzdfIUAUfcTLnghvJS0CVkYW9sVx2HnF1rqnxsFgSdYmcXpHKLs'];

	$registrationIds = 'cZLSkPkml3gjya_qLA1EvT:APA91bH-IQnnUlX7Neb6faoBNFjvYzbXLqH0uQT_puLQx1czwe7kWLO6qFkGRK7si1ZDOoAurqDNXdmwT9NFJupAxBuJTjJfTNANHCWI61uAf7yJ6rUOXcL0zz2GllFbznwpDfFopoXe';
	
	$header = [
		'Authorization: Key=AIzaSyB3YnQ2WaEQWGspxexCKSBc-1dF4kX7lQE',
		'Content-Type: Application/json'
	];

	$msg = [
		'title' => 'ALERT! YOU HAVE AN INTRUDER',
		'body' => 'You have someone at the front door.',
		'icon' => 'https://smart-surveillance-web-app.herokuapp.com/assets/images/logo.jpg',
		'image' => 'https://smart-surveillance-web-app.herokuapp.com/assets/images/logo.jpg',
	];

	$payload = [
		'registration_ids' 	=> $registrationIds,
		'data'				=> $msg
	];

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => json_encode( $payload ),
	  CURLOPT_HTTPHEADER => $header
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	}
 ?>
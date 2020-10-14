<?php 
	define('SERVER_API_KEY', 'AAAAjfN0wn4:APA91bEKcCeOfFpeNLaIgU032GFbfVVuhES_zZVuTuOxTRIajwJsHnhvccESa3WSkkhzYLg0w65D2po6iIlhwJsIQ3fBcjyz_j5CgNSJrGAR8kxd2fhxCsUcOPjp5gyDhla4oFvj_k_g');

	// require 'DbConnect.php';
	// $db = new DbConnect;
	// $conn = $db->connect();
	// $stmt = $conn->prepare('SELECT * FROM tokens');
	// $stmt->execute();
	// $tokens = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// $tokens = 'cZLSkPkml3gjya_qLA1EvT:APA91bE_kaZ5_I2tY8PU-NSMUCowLFqacUaDQVpgQwwzXfBseOYsWl3tj1Q6IEVilJ3ZYodNe7H9senoqd2oOOLNgzZvDHeMErOU8a1uy9-OyjeKG63oRcQMufF9ZPzY2GJvsaww7Yy2';

	// $tokens = array('token' => $tokens);

	// foreach ($tokens as $token) {
	// 	$registrationIds[] = $token['token'];
	// }

	$tokens = ['cZLSkPkml3gjya_qLA1EvT:APA91bFwKhRKe1F_315pP2fJIHb6-pe5KEZlWtvOtS4bcWOBejgSOhWQvmVZHMAff8wnEOo6EMrg3wI_Cfd4jy34trzPBSeOcdS_Dq-ZbXd8xsuZKbRbHmiv3QFg5AKdUjTyhEx3yOOH'];
	
	$header = [
		'Authorization: Key=' . SERVER_API_KEY,
		'Content-Type: Application/json'
	];

	$msg = [
		'title' => 'ALERT! YOU HAVE AN INTRUDER',
		'body' => 'You have someone at the front door.',
		'icon' => 'https://smart-surveillance-web-app.herokuapp.com/assets/images/logo.jpg',
		'image' => 'https://smart-surveillance-web-app.herokuapp.com/assets/images/logo.jpg',
	];

	$payload = [
		'to' 	=> $tokens,
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
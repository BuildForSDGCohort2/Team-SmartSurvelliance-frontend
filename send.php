<?php 
	define('SERVER_API_KEY', 'SERVER_KEY');

	// require 'DbConnect.php';
	// $db = new DbConnect;
	// $conn = $db->connect();
	// $stmt = $conn->prepare('SELECT * FROM tokens');
	// $stmt->execute();
	// $tokens = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$tokens = [
	    "token" => "token"
	];

	$tokens = array('token' => $tokens);

	foreach ($tokens as $token) {
		$registrationIds[] = $token['token'];
	}

	// $tokens = ['cZLSkPkml3gjya_qLA1EvT:APA91bFwKhRKe1F_315pP2fJIHb6-pe5KEZlWtvOtS4bcWOBejgSOhWQvmVZHMAff8wnEOo6EMrg3wI_Cfd4jy34trzPBSeOcdS_Dq-ZbXd8xsuZKbRbHmiv3QFg5AKdUjTyhEx3yOOH'];
	
	$header = [
		'Authorization: Key=' . SERVER_API_KEY,
		'Content-Type: Application/json'
	];

	$msg = [
		'title' => 'ALERT! YOU HAVE AN INTRUDER',
		'body' => 'You have someone at the front door.',
		'icon' => 'https://smart-surveillance-web-app.herokuapp.com/assets/images/logo.jpg',
		'image' => 'https%3A%2F%2Fwww.washingtonpost.com%2Fresizer%2F2iYZY-P7P1iVLLCL7viebvY4-8E%3D%2F576x324%2Ffilters%3Aquality(80)%2Fposttv-thumbnails-prod.s3.amazonaws.com%2F01-02-2020%2Ft_8611e762c69c4c1dbb8fd38588084c5c_name_1920_victim.jpg&imgrefurl=https%3A%2F%2Fwww.washingtonpost.com%2Fcrime-law%2F2020%2F01%2F02%2Fwoman-ran-house-beg-help-doorbell-camera-caught-man-dragging-her-away%2F&tbnid=tz7a5oqWPq3Y4M&vet=12ahUKEwiAz82U2bXsAhVLwuAKHYGZDu8QMygcegUIARDuAQ..i&docid=jUFBiac2bE8GsM&w=576&h=324&q=camera%20capturing%20someone%20at%20the%20door&ved=2ahUKEwiAz82U2bXsAhVLwuAKHYGZDu8QMygcegUIARDuAQ',
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
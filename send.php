<?php 
	define('SERVER_API_KEY', 'AAAARjZ7jhU:APA91bFkHbhG5rChfxO0gt9gWfRk57PT0LJ659Yp9rBMC2u4kGrBEN_rnvau_PMu3kh-wvHO0OxQoX_Pa4JxqWNkiG3trsQ_7IIFjV3nhFIwULd3jHUQkQsLO0jTOZmn0zHx6rii6DqP');

	// require 'DbConnect.php';
	// $db = new DbConnect;
	// $conn = $db->connect();
	// $stmt = $conn->prepare('SELECT * FROM tokens');
	// $stmt->execute();
	// $tokens = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$tokens = [
	    "token" => "cZLSkPkml3gjya_qLA1EvT:APA91bEtC_FeiffmDbz94uKdG2cd3XIWlkKDURqE9paG0MPLWlJT14Z_xC2-psbWj7Q0HLa9az6Zz39jgGjRR_wxbKW6TpIOkDQHCUAFQOCQHxIen_xsFTiObDyctGpCIg_GCUg_yO5V"
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
<?php 
	function push_notification_android($device_id,$message){

	    //API URL of FCM
	    $url = 'https://fcm.googleapis.com/fcm/send';

	    /*api_key available in:
	    Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/    $api_key = 'AAAARjZ7jhU:APA91bFkHbhG5rChfxO0gt9gWfRk57PT0LJ659Yp9rBMC2u4kGrBEN_rnvau_PMu3kh-wvHO0OxQoX_Pa4JxqWNkiG3trsQ_7IIFjV3nhFIwULd3jHUQkQsLO0jTOZmn0zHx6rii6DqP';
	                
	    $fields = array (
	        'registration_ids' => array (
	            $device_id
	        ),
	        'data' => array (
	            "message" => $message
	        )
	    );

	    //header includes Content type and api key
	    $headers = array(
	        'Content-Type:application/json',
	        'Authorization:key='.$api_key
	    );
	                
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	    $result = curl_exec($ch);
	    if ($result === FALSE) {
	        die('FCM Send Error: ' . curl_error($ch));
	    }else{
	    	curl_close($ch);
	    	return $result;
	    	echo $result;
	    }
	}
 ?>
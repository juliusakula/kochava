<?php
$redis_port = "6379";
$postdata = file_get_contents('php://input');
$decoded = json_decode($postdata, true);

if ($decoded) {
    $redis = new Redis();
    $connected = $redis->connect('127.0.0.1:'. $redis_port);
    if ($connected) {
	#var_dump($decoded);
      #  if (isset($decoded['data']) && isset($decoded['endpoint'])) {
	    #echo "bob";
            #foreach($decoded['data'] as &$data) {
	#	echo $data;	
	#	$postback = array(
         #           "endpoint" => $decoded['endpoint'],
          #          "data" => $data['data'],
           #     );
                $redis->lPush('requests', json_encode($decoded));
            #}
       # } else {
      #      echo 'No data received.' . PHP_EOL;
       # }
    } else {
        echo 'Unable to connect to DB' . PHP_EOL;
    }
} else {
   echo "Could not parse post data.";
}
?>

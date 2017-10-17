<?php
$redis_port = "6378";
$postdata = file_get_contents('php://input');
$decoded = json_decode($postdata, true);

if(sizeof($postdata) == 0){ // use GET variables if no POST variables (exclusive, POST preference)
    $decoded = $_GET;
}
if ($decoded) {
    $redis = new Redis();
    $connected = $redis->connect('127.0.0.1:'. $redis_port);
    if ($connected) {
        if (isset($decoded['data']) && isset($decoded['endpoint'])) {
            foreach($decoded['data'] as &$data) {
                $postback = array(
                    "endpoint" => $decoded['endpoint'],
                    "data" => $data,
                );
                $redis->lPush('requests', json_encode($postback));
            }
        } else {
            echo 'No data received.' . PHP_EOL;
        }
    } else {
        echo 'Unable to connect to DB' . PHP_EOL;
    }
} else {
   echo "Could not parse post data.";
}
?>
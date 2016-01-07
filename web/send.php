<?php
phpinfo();exit;
$queue  = '/queue/foo';
$msg    = 'bar';

/* connection */
try {
	    $stomp = new Stomp('tcp://localhost:61613');
} catch(StompException $e) {
	    die('Connection failed: ' . $e->getMessage());
}
while($i<100000){
/* send a message to the queue 'foo' */
$stomp->send($queue, $msg);
$i++;
}
/* subscribe to messages from the queue 'foo' */
//$stomp->subscribe($queue, array("activemq.prefetchSize" => 1000));

/* read a frame */
/*$frame = $stomp->readFrame();

if ($frame->body === $msg) {
	    /* acknowledge that the frame was received */
//:	    $stomp->ack($frame);
//}

/* remove the subscription */
//$stomp->unsubscribe($queue);

/* close connection */
unset($stomp);

?>

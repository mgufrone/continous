<?php

// input your code here

$start = $_POST['start'];


// and then print out the whole thing

return print json_encode(array(
	'message'=>"Crawled from index: ".$start
));

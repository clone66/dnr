<?php

echo  header($_SERVER["SERVER_PROTOCOL"]);
echo'<pre>';
print_r( $_SERVER);
echo'</pre>';


if( $_SERVER['REMOTE_ADDR']=='127.0.0.1'){
	http_response_code(404);
	
}
var_dump(http_response_code());
?>




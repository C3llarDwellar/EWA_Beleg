<?php

$nummer = $_POST["ccNumber"];
  $options = array( 'location' => 'http://141.56.131.108/ewa/G12/php/ws_server.php',
  'uri'=>'http://141.56.131.108/ewa/G12/php/');

	 $SOAPClient = new SoapClient(null, $options);

   	#$ergebnis = $SOAPClient->checkLuhn('446667651a');
	 $ergebnis = $SOAPClient->checkLuhn($nummer);
	
	if($ergebnis == true){
		echo 'true';
		#print '<a href="javascript:history.back()"><br>Zur&uuml;ck</a>';
	}
	else {
		echo 'false';
		#print '<a href="javascript:history.back()"><br>Zur&uuml;ck</a>';
	}

?>
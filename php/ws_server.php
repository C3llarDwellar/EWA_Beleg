<?php

 function checkLuhn($number) {
     $sum = 0;
     $numDigits = strlen($number)-1;
     $parity = $numDigits % 2;
     for ($i = $numDigits; $i >= 0; $i--) {
         $digit = substr($number, $i, 1);
         if (!$parity == ($i % 2)) {$digit <<= 1;}
         $digit = ($digit > 9) ? ($digit - 9) : $digit;
         $sum += $digit;
     }
     return (0 == ($sum % 10));
 }

  $options = array('uri' => 'http://141.56.131.108/ewa/G12/php/');

  $SOAPServer = new SoapServer(null, $options);

  $SOAPServer->addFunction('checkLuhn');

  $SOAPServer->handle();

?>
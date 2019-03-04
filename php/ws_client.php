<?php
if (isset($_POST["ccNumber"])) {
    $nummer = $_POST["ccNumber"];
    $options = array('location' => 'http://141.56.131.108/ewa/G12/php/ws_server.php',
        'uri' => 'http://141.56.131.108/ewa/G12/php/');

    $SOAPClient = new SoapClient(null, $options);

#$ergebnis = $SOAPClient->checkLuhn('446667651a');
    $ergebnis = $SOAPClient->checkLuhn($nummer);

    if ($ergebnis == true) {
        echo 'true';
        #print '<a href="javascript:history.back()"><br>Zur&uuml;ck</a>';
    } else {
        echo 'false';
        #print '<a href="javascript:history.back()"><br>Zur&uuml;ck</a>';
    }
}

if (isset($_POST['bankCode'])){
    $bankcode = $_POST['bankCode'];

    class RequestType
    {  /** * Bankleitzahl   * @var string */
        public $blz;
    }
    class ResponseType
    {  /**     * Details Struktur    * @var DetailsType   */
        public $details;
    }
    class DetailsType
    {   /**     * Bank     * @var string     */
        public $bezeichnung;
        public $bic; /**    * BIC    * @var string     */
        public $ort; /**    * Ort     * @var string    */
        public $plz;    /**     * Postleitzahl     * @var string     */
    }

    $options = array();
    $options['encoding']                        = 'ISO-8859-15';
    $options['soap_version']                    =  SOAP_1_2;
    $options['classmap']                        =  array();
    $options['classmap']['getBankType']         = 'RequestType';
    $options['classmap']['detailsType']         = 'DetailsType';
    $options['classmap']['getBankResponseType'] = 'ResponseType';

    $bank = new RequestType;
    $bank->blz = $bankcode;

    $SOAPClient = new SoapClient('http://www.thomas-bayer.com/axis2/services/BLZService?wsdl', $options);
    $result = $SOAPClient->getBank($bank);

    echo "BLZ: " . $bank->blz . " Bank: " . $result->details->bezeichnung;
}
?>
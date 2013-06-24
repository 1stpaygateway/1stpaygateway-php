<?
/*********************************************************
* This program is used to connect to the XML gateway API.
* Each request can be altered by you to test the API and
* validate the responses you receive back.
*
* Connecting to the gateway in this example is 
* done through cURL
* See: http://php.net/manual/en/book.curl.php 
*********************************************************/

$xml_string_data = <<<XML
<TRANSACTION>
<FIELDS>
<FIELD KEY="transaction_center_id">1264</FIELD>
<FIELD KEY="gateway_id">a91c38c3-7d7f-4d29-acc7-927b4dca0dbe</FIELD> 
<FIELD KEY="operation_type">sale</FIELD>
<FIELD KEY="order_id">YOURID_NUMBER</FIELD>
<FIELD KEY="total">5.00</FIELD>
<FIELD KEY="card_name">Visa</FIELD>
<FIELD KEY="card_number">4111111111111111</FIELD>
<FIELD KEY="card_exp">1113</FIELD>
<FIELD KEY="cvv2">123</FIELD>
<FIELD KEY="owner_name">Bob Auth</FIELD>
<FIELD KEY="owner_street">123 Test St</FIELD>
<FIELD KEY="owner_city">city</FIELD>
<FIELD KEY="owner_state">PA</FIELD>
<FIELD KEY="owner_zip">12345-6789</FIELD>
<FIELD KEY="owner_country">US</FIELD>
<FIELD KEY="recurring">0</FIELD>
<FIELD KEY="recurring_type">annually</FIELD>
</FIELDS> 
</TRANSACTION>
XML;

$url = "https://secure.1stpaygateway.net/secure/gateway/xmlgateway.aspx";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_MUTE, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_string_data");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/html'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

echo '<pre>' . htmlentities($output) . '</pre>';

?>
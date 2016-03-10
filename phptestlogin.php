<?php
$fields = array(
	'username' => urlencode($_POST['last_name']),
	'password' => urlencode($_POST['first_name']),
);
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');
  $curl_handle=curl_init();
  curl_setopt($curl_handle,CURLOPT_URL,'https://api.robinhood.com/quotes/api-token-auth/');
  curl_setopt($curl_handle,CURLOPT_POST,count($fields));
  curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $fields_string);
  $buffer = curl_exec($curl_handle);
  curl_close($curl_handle);
  if (empty($buffer)){
      print "Nothing returned from url.<p>";
  }
  else{
      print $buffer;
  }
?>

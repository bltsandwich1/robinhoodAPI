<?php
$usern = "usernamevalhere"
$passw = "passwordvalhere"
echo $usern
echo $passw
$fields = array(
	'username' => urlencode($_POST[$usern]),
	'password' => urlencode($_POST[$passw])
);
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');
  $curl_handle=curl_init();
  curl_setopt($curl_handle,CURLOPT_URL,'https://api.robinhood.com/api-token-auth/');
  curl_setopt($curl_handle,CURLOPT_POST,count($fields));
  curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $fields_string);
  echo $fields_string;
  $buffer = curl_exec($curl_handle);
  curl_close($curl_handle);
  if (empty($buffer)){
      print "Nothing returned from url.<p>";
  }
  else{
      print $buffer;
  }
?>

<?php

$ch = curl_init("http://localhost:8000/index.php?method=login");
curl_setopt_array($ch, 
	[
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => json_encode(
			[
				"email" => "ammarfaizi93@gmail.com",
				"password" => "123qweasd"
			]
		)
	]
);
$out = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

var_dump($out);

<?php

$ch = curl_init("http://localhost:8000/?method=report&session=c5e33b33877a2702f96a44f16bd219a2efd215f2");
curl_setopt_array($ch, 
	[
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => json_encode(
			[
				"username" => "zuck",
				"report_code" => 3
			]
		)
	]
);

$out = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

var_dump($out);

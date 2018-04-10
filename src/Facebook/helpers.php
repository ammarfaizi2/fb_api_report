<?php

/**
 * @author Ammar Faizi <ammarfaizi2@gmail.com>
 * @license MIT
 * @version 0.0.1
 */
function urlgen()
{
	if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
		$pr = "https";
	} else {
		$pr = "http";
	}
	return $pr."://".$_SERVER["HTTP_HOST"]."/";
}

function x($url, $opt = [])
{
	$ch = curl_init($url);
	$optf = [
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => false,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_SSL_VERIFYHOST => false,
		CURLOPT_TIMEOUT => 300,
		CURLOPT_CONNECTTIMEOUT => 150,
		CURLOPT_USERAGENT => "Mozilla/5.0 (X11; Linux i586; rv:31.0) Gecko/20100101 Firefox/31.0"
	];
	foreach ($opt as $key => $value) {
		$optf[$key] = $value;
	}
	curl_setopt_array($ch, $optf);
	$out = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);
	return [
		"out" => $out,
		"info" => $info
	];
}

function s($msg, $code = 200) 
{
	header("Content-type:application/json");
	http_response_code($code);
	exit(json_encode(
		[
			"msg" => $msg,
			"code" => $code
		], 128 | JSON_UNESCAPED_SLASHES
	));
}
<?php

namespace Facebook;

class Report
{

	public function checkProfile($user)
	{
		$st = x("https://m.facebook.com/".$user, 
			[
				CURLOPT_COOKIEFILE => cookie_dir."/".$_GET["session"],
				CURLOPT_COOKIEJAR => cookie_dir."/".$_GET["session"],
				CURLOPT_FOLLOWLOCATION => true
			]
		);
		if (preg_match("/href=\"(\/nfx.+is_rapid_reporting.+)\"/Usi", $st["out"], $m)) {
			preg_match("/(https:\/\/.+facebook.com)\//", $st["info"]["url"], $n);
			return html_entity_decode($n[1], ENT_QUOTES, "UTF-8").html_entity_decode($m[1], ENT_QUOTES, "UTF-8");
		}
		return false;
	}

	public function next($reportUrl)
	{
		$st = x($reportUrl, 
			[
				CURLOPT_COOKIEFILE => cookie_dir."/".$_GET["session"],
				CURLOPT_COOKIEJAR => cookie_dir."/".$_GET["session"],
				CURLOPT_FOLLOWLOCATION => true
			]
		);
		preg_match("/<form.+action=\"(.+)\"/U", $st["out"], $a);
		preg_match("/<input type=\"hidden\" name=\"fb_dtsg\" value=\"(.+)\"/U", $st["out"], $m);
		preg_match("/(https:\/\/.+facebook.com)\//", $st["info"]["url"], $n);
		$action = html_entity_decode(str_replace("com//", "com/",$n[0].$a[1]), ENT_QUOTES, "UTF-8");

		$p = [
			"fb_dtsg" => $m[1],
			"answer" => "account"
		];
		
		$st = x($action,
			[
				CURLOPT_COOKIEFILE => cookie_dir."/".$_GET["session"],
				CURLOPT_COOKIEJAR => cookie_dir."/".$_GET["session"],
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => http_build_query($p)
			]
		);

		file_put_contents("xz.html", $st["out"]);
		var_dump($st["info"]);
	}
}
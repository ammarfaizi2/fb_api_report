<?php

namespace Facebook;

/**
 * @author Ammar Faizi <ammarfaizi2@gmail.com>
 * @license MIT
 * @version 0.0.1
 */
class Login
{
	public static function run($email, $pass)
	{
		$cookie = sha1($email);
		$a = x("https://m.facebook.com/login.php", 
			[
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_COOKIEJAR => cookie_dir."/".$cookie,
				CURLOPT_COOKIEFILE => cookie_dir."/".$cookie
			]
		);
		if (preg_match("/<form method=\"post\" action=\"(.+)\".+<\/form>/Usi", $a["out"], $m)) {
			$action = html_entity_decode($m[1], ENT_QUOTES, "UTF-8");
			if (preg_match_all("/<input type=\"hidden\".+>/Usi", $m[0], $m)) {
				$p = [];
				foreach ($m[0] as $v) {
					if (preg_match("/<input.+name=\"(.+)\".+>/Usi", $v, $m)) {
						if (preg_match("/<input.+value=\"(.+)\".+>/Usi", $v, $n)) {
							$p[html_entity_decode($m[1], ENT_QUOTES, "UTF-8")] = html_entity_decode($n[1], ENT_QUOTES, "UTF-8");
						} else {
							$p[html_entity_decode($m[1], ENT_QUOTES, "UTF-8")] = "";
						}
					}
				}
				$p["email"] = $email;
				$p["pass"] = $pass;
				$p["login"] = "Login";
			}
			$cx = x($action, 
				[
					CURLOPT_POST => true,
					CURLOPT_POSTFIELDS => http_build_query($p),
					CURLOPT_COOKIEJAR => cookie_dir."/".$cookie,
					CURLOPT_COOKIEFILE => cookie_dir."/".$cookie,
					CURLOPT_FOLLOWLOCATION => true
				]
			);
			$cookiefile = file_get_contents(cookie_dir."/".$cookie);
			if (preg_match("/c_user/", $cookiefile)) {
				s([
					"login_status" => "success",
					"next" => urlgen()."?method=report&session=".$cookie
				], 200);
			} else {
				s([
					"login_status" => "failed",
					"next" => null
				], 400);
			}
		}
		return false;
	}
}
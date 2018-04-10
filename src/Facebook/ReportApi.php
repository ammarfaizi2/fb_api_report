<?php

namespace Facebook;

class ReportApi
{
	public static function run()
	{
		require __DIR__."/helpers.php";
		$a = json_decode(file_get_contents("php://input"), true);
		self::action($a);
	}

	private static function error($msg, $code = 400)
	{
		header("Content-type:application/json");
		http_response_code($code);
		exit(json_encode(
			[
				"message" => $msg,
				"error" => $code
			], 128
		));
	}

	private static function action($data)
	{
		if (isset($_GET["method"])) {
			switch ($_GET["method"]) {
				case 'login':
					if (! isset($data["email"], $data["password"])) {
						self::error("Please provide email and password to login!");
					}
					Login::run($data["email"], $data["password"]);
					break;
				case 'report':
						Report::init($data);
					break;
				default:
					self::error("Method ".$_GET["method"]." not found!");
					break;
			}
		} else {
			self::error("Please provide a method!");
		}
	}
}
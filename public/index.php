<?php

define("cookie_dir", __DIR__."/cookies");

require __DIR__."/../vendor/autoload.php";

Facebook\ReportApi::run();


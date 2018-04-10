# Report

## Method Info
|Name|Value|
|-----|------|
|URL| http://localhost:8000/index.php?method=report&session={{ your_session }}|
|Method| POST |
|Content Type| application/json|
|Description|This method uses for report a facebook profile. You must have a session to perform this method.|

## Request
|Field|Type|Required|Description|
|----|----|----|-----|
|`username`|string| yes |Target facebook username or facebook ID. |
|`report_code`|int| yes |The reason of your report. See report code for the option. |

## Report Code
|Code| Reason |
|----|--------|
|1|This person is annoying me|
|2|They're pretending to be me or someone I know|
|3|This is a fake account|
|4|This profile represents a business or organization|
|5|They're using a different name than they use in everyday life|


## Response Messages
|Field|Type|Description|
|-----|-----|----------|
|message|string|Report status|


## Raw Request Data Example
```json
{
    "username": "zuck",
    "report_code": 3
}
```


## Raw Response Data Example
```json
{
    "msg": {
        "message": "Submitted to Facebook for Review"
    },
    "code": 200
}
```

## PHP Code Example
```php
<?php

$ch = curl_init("http://localhost:8000/?method=report&session=c5e33b33877a2702f96a44f16bd219a2efd215f2");
curl_setopt_array($ch, [
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_POST => true,
	CURLOPT_POSTFIELDS => json_encode(
		[
			"username" => "zuck",
			"report_code" => 3
		]
	)
]);

$out = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

print($out);
```


#### This documentation is vague? Please contact the developer!

### Contact:
- Facebook <a href="https://www.facebook.com/ammarfaizi2?ref=github">Ammar Faizi</a>
- Telegram <a href="https://t.me/ammarfaizi2">Ammar F.</a>
- SMS/Telp <a href="tel:+6285867152777">+6285867152777</a> (Indonesia)
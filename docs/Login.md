# Login

## Method Info
|Name|Value|
|-----|------|
|URL| http://localhost:8000/index.php?method=login |
|Method| POST |
|Content Type| application/json|

## Request
|Field|Type|Description|
|----|----|---------|
|`email`|string| Your facebook email or username |
|`password`|string| Your facebook password |


## Response Messages
|Field|Type|Description|
|-----|-----|----------|
|`login_status`|string| Your login action status |
|`next`|string| An URL to continue your login session (only available when login_status is success)|


## Raw Request Data Example
```json
{
    "email": "ammarfaizi2@gmail.com",
    "password": "password123123"
}

```


## Raw Response Data Example
```json
{
    "msg": {
        "login_status": "success",
        "next": "http://localhost:8000/?method=report&session=c5e33b33877a2702f96a44f16bd219a2efd215f2"
    },
    "code": 200
}
```

## PHP Code Example
```php
<?php

$ch = curl_init("http://localhost:8000/index.php?method=login");
curl_setopt_array($ch, 
	[
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => json_encode(
			[
				"email" => "ammarfaizi2@gmail.com",
				"password" => "password123123"
			]
		)
	]
);
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
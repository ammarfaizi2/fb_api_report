# Login
- Method			: `POST`


- URL			: `http://localhost:8000/index.php?method=login`


- Content Type	: `application/json`


- Fields			: 	1. `email` (string), your facebook email or username.
					2. `password` (string), your facebook password.

- Result			:	1. `login_status`, the status of your login action.
					2. `next`, the URL to continue your session.

- Example		: 
```php
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
```

- Response:
```json
{
    "msg": {
        "login_status": "success",
        "next": "http://localhost:8000/?method=report&session=c5e33b33877a2702f96a44f16bd219a2efd215f2"
    },
    "code": 200
}
```
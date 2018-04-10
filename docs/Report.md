# Report
- Method			: `POST`

- URL			: `http://localhost:8000/index.php?method=report`

- Content Type	: `application/json`

- Fields			: 	
	1. `target` (string), the facebook username or facebook id of target.
	2. ``

- Result			:
	1. `login_status`(string), the status of your login action. 
	2. `next` (string), the URL to continue your session.

- Example		: 
```php

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
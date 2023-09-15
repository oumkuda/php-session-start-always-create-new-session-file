# php-session-start-always-create-new-session-file
can't set session value<br>
session value doesn't set<br>
session value won't set<br>
session value always empty on page refresh reload<br>
session value lost empty in other page<br>

mostly happened with http not https. 
because browser always send different PHPSSESID cookie value every page reload/refresh.<br>
to resolve the issue you may try this code.<br>
include this file on top php file
```php
<?php
//session_start.php
$cookieName = "sesi";
$time = time();
if(!isset($_COOKIE[$cookieName])){
	session_start();
	setcookie($cookieName, session_id(), $time + 3600); // 3600 = an hour cookie will expire
} else {
	session_id($_COOKIE[$cookieName]);
	session_start();
}
```
hope this help

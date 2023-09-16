<?php
$sess = require "session_start.php";

// set a session value
$_SESSION['name'] = "Blueberry Flavour Soes";

echo '<a href="get_session.php">go check!</a>';
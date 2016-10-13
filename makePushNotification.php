<?php
require_once 'push_notification.php';

//when admin adds new car -> new push notification to all users

$tokens = getDevices();
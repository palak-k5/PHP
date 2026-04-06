<?php

//verify user login info

session_start();
//first unset vriablres and then detroy
session_unset();
session_destroy();
echo "you hve been logged out";
?> 
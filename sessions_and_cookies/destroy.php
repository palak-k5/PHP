<?php

//verify user login info

session_start();
//first unset variables and then destroy
session_unset();
session_destroy();
echo "you have been logged out";
?> 
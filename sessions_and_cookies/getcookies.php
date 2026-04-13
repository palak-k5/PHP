<?php
//new taab new paage
$cat= $_COOKIE['category']; //reteriving value 
if(isset($cat)){
echo "Here is list of all cloths <br>";
echo "cookie has not expired yet";

}
else
{
    echo "Cookie expired";
}
?>
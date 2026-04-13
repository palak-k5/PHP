<?php


echo "welcome to the world of cookies"." "."<br>";
echo time()."<br>";
setcookie("category","Cloths",time()+60,"/");
echo "Cookie has been set";



//can also use below function
//strtotime("+1 day")

?>
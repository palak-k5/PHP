<h1> GET Form </h1>


<form method="GET">
    Name::<input type="text" name="name"><br><br>
    Age:<input type="number" name="age"><br><br>
    <input type="submit" value="via get">
</form>
<?php
    if(isset($_GET['name'] )&& isset($_GET['age'])){
        echo "<h3>Get Data:</h3>";
        echo "Name: " .$_GET['name']. "<br>";
    echo "Age: " .$_GET['age']. "<br>";

    }
?>

<hr>
<h2>post form</h2>

<form method="POST">
Email:

<input type="email" name="email" value=""><br><br>
Password: 
<input type="password" name="password" value=""><br><br>
<input type="submit" value="via post">   
</form>


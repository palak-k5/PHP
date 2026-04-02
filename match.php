

<?php
$name=$_GET['name'];
       $marks=$_GET['marks'];
       $grades="";
       
if(!isset($_GET['name']))
        {
            echo "<pre>";
            echo("<h1>Please enter your name<h1>");
            die;

        }
        else if(!isset($_GET['marks']))
            {
                echo "<h1>Enter your marks<h1>";
            }
  else if(isset($_GET['name']) && isset($_GET['marks']))
    {
       
       $grades=match(true)
       {
            $marks >= 90 => "Grade A+",
            $marks >= 75 => "Grade A",
            $marks >= 60 => "Grade B",
            $marks >= 40 => "Grade C",
            $marks >=35 => "Pass",
            default => "fail",

       };
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Expression </title>
</head>
<body>

    <form method="GET" >
        Name:<input type="text" name="name"><br>
        <br>
        Marks:<input type="number" name="marks"><br>
        <br>
        <input type="submit" value="Check Grades" >


    <?php if ($grades !== "" ): ?>
        <p class="result">Result: <?php echo $grades; ?></p>
    <?php endif; ?>
</form>
</body>
</html>

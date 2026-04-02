<?php

$num1 = "";
$num2 = "";
$operation = "";
$result = "";
$error = "";

function calculate($a, $b, $op) {
    // echo "<pre>";
    // print_r($a);
    
    switch ($op) {

        case "+": return $a + $b;
            case "-": return $a - $b;
        case "*": return $a * $b;
        case "/": return  $a / $b ;
        case "%": return $a % $b;

                case "+=": $a += $b; return $a;
        case "-=": $a -= $b; return $a;
        case "*=": $a *= $b; return $a;

        case "==": return ($a == $b) ? "True" : "False";
             case "===": return ($a === $b) ? "True" : "False";
                case ">": return ($a > $b) ? "True" : "False";
         case "<": return ($a < $b) ? "True" : "False";

        case "&&": return ($a > 0 && $b > 0) ? "True" : "False";
             case "||": return ($a > 0 || $b > 0) ? "True" : "False";
        case "!": return !($a == $b) ? "True" : "False";

        default: return "Invalid Operation";
    }
}

if (isset($_POST['submit'])) {
    // echo "<pre>";
    // print_r($_POST['operation']);

    // die;
    $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        // echo "<pre>";
        // print_r($num1);
        // die;//check inside
        $operation = $_POST['operation'];

        // echo "<pre>";
        // print_r($operation);
        // die;
    if (empty($operation)) {
        echo "<pre>";
        print_r("inside ")
        die;

        $error = "Select an operation";

    }       elseif ($operation != "!" && (empty($num1) || empty($num2))) {
        $error = "Enter both numbers";
    } 
            elseif (!is_numeric($num1) || !is_numeric($num2)) {
         $error = "Enter valid numbers";
    }
             else {
        $result = calculate($num1, $num2, $operation);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title> Calculator</title>
    <style>
        body { font-family: Arial; text-align:center; background:#f4f4f4; }
        .box {
            width: 380px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px #ccc;
        }
        input, select, button {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
        }
        .error { color:red; }
        .result { color:green; }
    </style>
</head>
<body>

<div class="box">

    <h2>Calculator</h2>

    <form method="POST">
        <input type="text" name="num1" placeholder="Enter first number"
               value="">

        <input type="text" name="num2" placeholder="Enter second number"
               value="">

        <select name="operation">
            <option value="">Select Operation</option>

            <option value="+">+ (Addition)</option>
                <option value="-">- (Subtraction)</option>
            <option value="*">* (Multiplication)</option>
            <option value="/">/ (Division)</option>
            <option value="%">% (Modulus)</option>

            <option value="+=">+= (Add & Assign)</option>
                    <option value="-=">-= (Subtract & Assign)</option>
            <option value="*=">*= (Multiply & Assign)</option>

            <option value="==">== (Equal)</option>
            <option value="===">=== (Identical)</option>
                 <option value=">">> (Greater)</option>
            <option value="<">< (Less)</option>

            <option value="&&">&& (AND)</option>
            <option value="||">|| (OR)</option>
                    <option value="!">! (NOT)</option>

        </select>

        <button type="submit" name="submit">Calculate</button>
    </form>

    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if ($result !== "" ): ?>
        <p class="result">Result: <?php echo $result; ?></p>
    <?php endif; ?>

</div>

</body>
</html>
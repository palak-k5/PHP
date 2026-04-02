<?php
    $arr=[1,2,3,55,"php"];
    echo "<h2> Indexed Arrays</h2>";

    echo count($arr);
    echo "<br>";
    echo $arr;
    
    echo "\n".$arr[4];
    $arr[3]="learn";
    array_push($arr,"by","coding",12);
    array_unshift($arr,"Starrt");
    array_splice($arr,0,1);

    echo "<br> Element of the array are <br>";
    foreach($arr as $ele)
        {
            echo "$ele <br>";
        }
        array_splice($arr,0,1);

    echo "<hr>";
    echo "<h2> Associative Arrays</h2>";

    $states=["MP"=>"Bhopal","UP"=>"Lucknow","GUJ"=>"Ahemdabad","MH"=>"Mumbai","RJ"=>"Jaipur"];
    var_dump($states);
        $states["TN"]="Pondicherry";
        $states["TN"]="Chennai";
        $states += ["AP"=>"Hyderabad","KN"=>"Bangalore"];

        foreach($states as $state=> $capital)
            {
                echo "$state"."'s capital is "."$capital"."<br>";
            }
    echo "<hr>";
    $merge=array_merge($arr,$states);
    foreach($merge as $state=> $capital)
            {
                echo "$state"."'s capital is "."$capital"."<br>";
            }

    echo "<hr>";

    echo "<h2> Functions as Array elements</h2>";

    $myArr = [
        "double" => function($n){
            return $n * 2;
        },
        "add" => fn($n) => $n + 5
    ];
    $fn = $myArr["double"];
    echo $fn(10);
    echo "<br>";

    echo "<hr>";

    $nums=[1,2,3,4];
    $res=array_map(fn($n)=>$n*10,$nums);
    echo "array_map result <br>";
    foreach($res as $v)
    {
        echo "$v <br>";
    }
        echo "<hr>";


    $f=array_filter($nums,fn($n)=>$n>2);
    echo "<br> array_filter result <br>";
    foreach($f as $v)
    { 
        echo "$v <br>";
    }
        echo "<hr>";


    $sum=array_reduce($nums,fn($c,$n)=>$c+$n,0);
    echo "<br> Sum using array_reduce = $sum <br>";

    if(in_array("php",$arr))
    {
        echo "php found in array <br>";
    }
        echo "<hr>";


    echo "<br> Keys of states <br>";
    foreach(array_keys($states) as $k)
    {
        echo "$k <br>";
    }
        echo "<hr>";


    echo "<br> Values of states <br>";
    foreach(array_values($states) as $v)
    {
        echo "$v <br>";
    }
        echo "<hr>";


    $temp=$nums;
    sort($temp);
    echo "<br> Sorted array <br>";
    foreach($temp as $v)
    {
        echo "$v <br>";
    }

        echo "<hr>";

    rsort($temp);
    echo "<br> Reverse sorted array <br>";
    foreach($temp as $v)
    {
        echo "$v <br>";
    }
    echo "<hr>";

    asort($states);
    echo "<br> Sort by values <br>";
    foreach($states as $s=>$c)
    {
        echo "$s -> $c <br>";
    }
    echo "<hr>";

    ksort($states);
    echo "<br> Sort by keys <br>";
    foreach($states as $s=>$c)
    {
        echo "$s -> $c <br>";
    }
        echo "<hr>";


    $users=[
        ["name"=>"A","age"=>20],
        ["name"=>"B","age"=>25]
    ];
    echo "<br> Names using array_column <br>";
    foreach(array_column($users,"name") as $n)
    {
        echo "$n <br>";
    }
        echo "<hr>";


        $dup=[1,1,2,3,3];
    $u=array_unique($dup);
    echo "<br> Unique values <br>";
    foreach($u as $v)
    {
        echo "$v <br>";
    }
        echo "<hr>";


    $rev=array_reverse($nums);
    echo "<br> Reverse array <br>";
    foreach($rev as $v)
    {
        echo "$v <br>";
    }
        echo "<hr>";


    $slice=array_slice($nums,1,2);
    echo "<br> Slice array <br>";
    foreach($slice as $v)
    {
        echo "$v <br>";
    }


?>
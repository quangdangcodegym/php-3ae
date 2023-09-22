<?php

/*
    $txt = "W3Schools.com";
    $a = "Codegym";
    $c =  "I love !" . $a;

    var_dump($c);


    // global scope 
        $x = 5;
        function myTest()
        {
            global $x;
            // sử dụng biến x ở bên trong hàm sẽ sinh ra lỗi
            echo "<p>Variable x inside function is: $x </p>" . $x;
            $x = 10;
        }
        myTest();

        echo "<p>Variable x outside function is: $x</p>";

        $x = 5;
        $y = 10;

        function myTest()
        {
            $GLOBALS['x'] = 1000;
        }

        myTest();
        echo $GLOBALS['x']; // outputs 15 


        function myTest()
        {
            static $x = 0;
            echo $x;
            $x++;
        }
        myTest();
        myTest();
        myTest();

        echo "<h2>PHP is Fun!</h2>";
        echo "Hello world!<br>";
        echo "I'm about to learn PHP!<br>";
        //sử dụng echo với nhiều tham số, các tham số cách nhau bởi dấu phẩy

        echo "This ", "string ", "was ", "made ", "with multiple parameters.";
        echo "aaa", "bb";

        define("GREETING", "Welcome to codegym.vn!");
        echo GREETING;

        $a = array("a" => "apple", "b" => "banana");
        $b = array("a" => "pear", "b" => "strawberry", "c" => "cherry");

        $c = $b + $a; // a left - b right
        echo "Union of \$a and \$b: \n";
        var_dump($c);

        $a1 = [3, 5];
        $a2 = [2, 3, 7];


        $c = $a1 + $a2;     // [3,5,7]
        var_dump($c);


        $cars = array(["Volvo", "BMW", "Toyota"], ["Volvo", "BMW"]);
        var_dump($cars);

        $cars = array(["Volvo", "BMW", "Toyota"], ["Volvo", "BMW"]);
        echo count($cars);

        $age = ["Peter" => "35", "Ben" => "37", "Joe" => "43"];

        foreach ($age as $x => $x_value) {
            echo "Key=" . $x . ", Value=" . $x_value;
            echo "<br>";
        }

        $arr = [2, 3];
        function swap($arr)
        {
            $temp = $arr[0];
            $arr[0] = $arr[1];
            $arr[1] = $temp;
        }

        swap($arr);
        var_dump($arr);


        
        $arr = [4, 7, 1, 5];
        // echo max($arr);
        // echo max(5, 1, 8, 2);

        function mymax($value, ...$values)
        {
            var_dump($value);   // 5
            var_dump($values);  // [1,8,2,[4,7..]]
        }

        // mymax($arr, 1);
*/
// array()

$a = [4, 6, 1];
// array_push($a, 100);
var_dump($a);

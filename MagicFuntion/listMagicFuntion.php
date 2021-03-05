<?php 

// Magic function start at __ and end at __
// Example __FILE__

// Example __FUNCTION__
function onMyWay(){
    echo __FUNCTION__;
}

echo "List Magic Function:"; 
echo "<br>";
echo "
        1. __LINE__<br>
        Show the number line of file .php <br>
        Example: This file have ".__LINE__." lines<br> 
    ";
echo "
    2. __FILE__<br>
    Show the direction of file .php <br>
    Example: ".__FILE__."<br> 
";
echo"
    2. __DIR__<br>
    Show the direction folder of file .php <br>
    Example: ".__DIR__."<br>";
echo"
    2. __FUNCTION__<br>
    Show the name of function. if you show without function output is nothing.<br>
    public function onMyWay(){<br>
        echo __FUNCTION__;<br>
    }<br> 
    Example: ";
    echo onMyWay();
    echo "<br>";

    echo "__TRAIT__ & __CLASS__ & __METHOD__ & __NAMESPACE__<br>";
    echo "Trả về lần lượt tên trait, lớp, phương thức, namespace";
    echo "Để lấy tên class dùng ClassName::class";
<?php 

function is_assoc($var)
{
    return is_array($var) && array_diff_key($var, array_keys(array_keys($var)));
}

function test($var)
{
    echo is_assoc($var) ? "I'm an assoc array.<br>" : "I'm not an assoc array.<br>";
}

// an assoc array
$a = array("a"=>"aaa","b"=>1,"c"=>true);
test($a);

// an array
$b = array_values($a);
test($b);

// an object
$c = (object)$a;
test($c);

// other type
test($a->a);
test($a->b);
test($a->c);
?>
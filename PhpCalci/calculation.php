<?php
$count = 1;
global $value ;
global $result;
global $oprt;
$result = (int)$_POST['prev_result'];
$value = (int)$_POST['val']; 
$oprt = $_POST['oprt'];
// condition for first time when user not eneterd any operaore 
if ($oprt == '') {
    $oprt='+';
} 
// applying switch condition for identify the different different operatore and call same function for all with different - diffreent matching symbol 
switch ($oprt) {
case '+':
    claculate($symbol = '+'); // function calling
    break;
case '-':
    claculate($symbol = '-'); // function calling
    break;
case '*':
    claculate($symbol = '*'); // function calling
    break;
case '/':
    claculate($symbol = '/'); // function calling
    break;
case '%':
    claculate($symbol = '%'); // function calling
    break;
} 
// create a function for desired calculation 
function claculate($symbol) 
{  
    if ($symbol == '+') {
        global $value;
        global $result;
        $result =  (int)$value + (int)$result;   
        echo $result;    
        // $value = 0;    
    }
    if ($symbol == '-') {
        global $value;
        global $result;
        if ($result == 0) {
            $result = (int)$value - (int)$result;
        } else {
            $result = (int)$result - (int)$value;           
        }
        echo $result;            
        // $value = 0;    
    }
    if ($symbol == '*') {
        global $value;
        global $result;
        if ($result == 0) {
            $result = (int)$value  * 1;
        } else {
            $result = (int)$result * (int)$value;           
        }
        echo $result;     
    }
    if ($symbol == '/') {
        global $value;
        global $result;
        if ($result > 0) {
            $result = (int)$result / (int)$value;
        } else {
            $result =  (int)$value  / 1;          
        }
        echo $result;     
    }
    if ($symbol == '%') {
        global $value;
        global $result;
        if ($result == 0) {
            $result = (int)$value;
        } else {
            $result = (int)$result % (int)$value;           
        }
        echo $result;      
    }    
}
?>
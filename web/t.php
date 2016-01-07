<?php
phpinfo();exit;
function mkstring($append){
$append=($append%99);
if($append<10){$append+=10;}
$mt=microtime();
$data=explode(' ',$mt);
$string=$data[1].str_replace('0.','',$data[0])+$append;
return $string;
}
$i=0;
while($i++<1000){
echo mkstring($i);
echo "\r\n";
}
?>

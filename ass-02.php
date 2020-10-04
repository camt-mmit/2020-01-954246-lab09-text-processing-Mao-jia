<?php
/**
     * ID:602110189
     * Name: Mao Jia
     * WeChat: Ga
     */
$fp = fopen($_SERVER['argv'][2], 'r');
$code=$argv[1];
fscanf($fp, "%d", $n);
$name=[];
 for($i = 0; $i < $n; $i++) {
    $name[$i]=fgets($fp);}
fclose($fp);

$code_number=substr($code,2);
$code_name=substr($code,0,2);
$len=strlen($code_number);
$number=(int)ltrim($code_number,"0");

for($i = 0; $i < $n; $i++) {
printf("%2s%s %s",$code_name,str_pad($number+$i,$len,"0",STR_PAD_LEFT),$name[$i]);
}


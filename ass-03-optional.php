<?php
$fp = fopen($_SERVER['argv'][1], 'r');
$contents=[];
while(! feof($fp)){
    $content=fgets($fp);
    $contents[]=$content;
}
fclose($fp);

$fp = fopen($_SERVER['argv'][2], 'r');
$changes=[];
while(! feof($fp)){
    $changes[]=ucwords(trim(fgets($fp)));
}
fclose($fp);
$n=count($changes);

for ($i=0;$i<=$n;$i++){
$contents=str_ireplace($changes[$i],$changes[$i],$contents);
printf($contents[$i]);
};



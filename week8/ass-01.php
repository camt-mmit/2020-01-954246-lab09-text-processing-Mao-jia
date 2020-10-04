<?php
/**
     * ID:602110189
     * Name: Mao Jia
     * WeChat: Ga
     */
$fp=fopen($_SERVER['argv'][1],'r');
fscanf($fp,"%d",$n);
$students=[];
for($i=0;$i<$n;$i++){
    $student=[];
    fscanf($fp,"%s %s %f",$student['name'],$student['sec'],$student['score']);
    $students[]=$student;
}
fclose($fp);

usort($students,function($x,$y){
    if ($x['score']==$y['score']) return 0;
    return ($x['score']<$y['score'])? 1:-1;
});


array_walk($students,function($number)use($put){
    printf("%10s %3s: %6.2f\n",$number['name'],$number['sec'],$number['score']);
});


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
    fscanf($fp,"%s %s %f %f",$student['name'],$student['sec'],
                             $student['score1'],$student['score2']);
    $student['sum']=$student['score1']+$student['score2'];
    $students[]=$student;
}
fclose($fp);

$average=array_reduce($students,function($carry,$student){
    return $carry+$student['sum'];},0)/count($students);
$pass=array_filter($students,function($student) use($average){
    return $student['sum']>=$average;});

$sumpass=array_reduce($pass,function($carry,$pass){
    return $carry+$pass['sum'];},0);

$put=fopen($_SERVER['argv'][2],'w');
  array_walk($students,function($number)use($put){
    fprintf($put,"%10s %3s: %6.2f %6.2f=%6.2f\n",$number['name'],$number['sec'],$number['score1'],$number['score2'],$number['sum']);
});
  fprintf($put,"Average total score :%6.2f\n",$average);
  fprintf($put,"Summation of total score greater than or equal %6.2f:%8.2f",$average,$sumpass);
fclose($put);

$s=1111;
printf("$s");


<?php
/**
     * ID:602110189
     * Name: Mao Jia
     * WeChat: Ga
     */
$filter=0;
$fp=fopen($_SERVER['argv'][1],'r');
fscanf($fp,"%d",$n);
$students=[];
for($i=0;$i<$n;$i++){
    $student=[];
    fscanf($fp,"%s %s %f %f %f",$student['name'],$student['sec'],
           $student['score1'],$student['score2'],$student['score3']);
    $student['sum']=$student['score1']+$student['score2']+$student['score3'];
    $students[]=$student;
}
fclose($fp);
$average=array_reduce($students,function($carry,$student){
    return $carry+$student['sum'];},0)/count($students);

$select= $argv[2];
$filter=$argv[3];

if ($select=="name"){
usort($students,function($x,$y) use($select){
    if ($x[$select]==$y[$select]) {return ($x['sec']<$y['sec'])? -1:1;}
    return ($x[$select]<$y[$select])? -1:1;
});}
else if ($select=="section"){
    usort($students,function($x,$y){
        if ($x['sec']==$y['sec']) { return ($x['name']<$y['name'])? -1:1; }
        return ($x['sec']<$y['sec'])? -1:1;
    });}

else if ($select==1 or 2 or 3 or "total"){
    if ($select==1) $select="score1";
    if ($select==2) $select="score2";
    if ($select==3) $select="score3";
    if ($select=="total") $select="sum";
    usort($students,function($x,$y) use($select){
        if ($x[$select]==$y[$select]) 
        { if ($x['sec']==$y['sec']) {return ($x['name']<$y['name'])? -1:1;}
             else return ($x['sec']<$y['sec'])? -1:1; }
        return ($x[$select]<$y[$select])? -1:1;
    });}

if($filter!=0){
$students=array_filter($students,function($student)use($filter){
    return $student['sec']==$filter;});}


array_walk($students,function($number)use($put){
    printf("%10s %3s: %6.2f %6.2f %6.2f=%6.2f\n",$number['name'],$number['sec'],
           $number['score1'],$number['score2'],$number['score3'],$number['sum']);
    });
printf("Average total score :%6.2f\n",$average);
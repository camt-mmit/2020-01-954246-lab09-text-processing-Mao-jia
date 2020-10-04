<?php
/**
     * ID:602110189
     * Name: Mao Jia
     * WeChat: Ga
     */
$fp = fopen($_SERVER['argv'][1], 'r');
fscanf($fp, "%s %s", $fname,$lname);
fscanf($fp, "%d", $n);
for($i = 0; $i < $n; $i++) {
    $tra = [];
    fscanf($fp, "%s %f", $tra['code'], $tra['value']);
    $tras[] = $tra;
}
fclose($fp);
$sum=0;
for ($i = 0; $i < $n; $i++) {
    if  (strcasecmp($tras[$i]['code'],"deposit")==0) $sum+=$tras[$i]['value'];
    else if  (strcasecmp($tras[$i]['code'],"withdraw")==0) $sum-=$tras[$i]['value'];
    else if  (strcasecmp($tras[$i]['code'],"transfer")==0) $sum+=$tras[$i]['value'];
}

printf("Transaction for:\n      First name: %s\n     Last name: %s\n",$fname,$lname);
printf("Number of transactions: %d\n",$n);
array_walk($tras, function($tras) {
    printf("%15s: %15s\n", $tras['code'], number_format($tras['value'],2));
});
printf("\nAccount Balance: %15s",number_format($sum,2));



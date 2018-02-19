<?php 
include_once "function.php";
$awal  = '2018-03-05';
$akhir  = '2018-03-06';
// var_dump($data);exit();
$get = get_data_bulan($awal,$akhir);
// echo "\n";
// var_dump($get);exit();

for ($i=0; $i < count($get); $i++) { 
    $jid   = add_jid("000099121",$get[$i]);
    $jid1   = add_jid("000113377",$get[$i]);
    // echo "$i \n";
    $data[] = "'".$jid."','Indra','000099121','32560301','".$get[$i]."','5','1','2','Dinas Luar Full','0','','2018-02-09','2018-02-09'";
    $data[] = "'".$jid1."','dadang',000113377','05020103','".$get[$i]."','5','1','2','Dinas Luar Full','0','','2018-02-09','2018-02-09'";
}

var_dump($data);exit();



?>
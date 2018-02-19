<?php 

// jumlah hari dalam satu bulan
function jumlah_hari($tanggal){
    $kalender = CAL_GREGORIAN;
    $array = explode("-", $tanggal);
    $tahun = $array[0];
    $bulan = $array[1];
    $count = cal_days_in_month($kalender, $bulan, $tahun);
    return $count;
}

// memecah tahun tanggal dan bulan dalam bentuk array
function pecah_tanggal($tanggal){
    $array = explode("-", $tanggal);
    $data["tahun"] = $array[0];
    $data["bulan"] = $array[1];
    $data["hari"] = $array[2];
    return $data;
}

function get_data_bulan($awal,$akhir){
    $jumlah_hari_awal = jumlah_hari($awal);
    $jumlah_hari_akhir = jumlah_hari($akhir);
    $a = pecah_tanggal($awal);$b = pecah_tanggal($akhir);
    $tahun = (int)$a['tahun'];
    $bulan_awal = (int)$a['bulan'];$hari_awal = (int)$a['hari'];
    $bulan_akhir = (int)$b['bulan'];$hari_akhir = (int)$b['hari'];

    if ($bulan_awal < $bulan_akhir) {
        if ($bulan_awal) {
            for ($i=$hari_awal; $i <= $jumlah_hari_awal; $i++) { 
                if ($i<10) {
                    $data[] = "$tahun-0$bulan_awal-0$i";
                } else {
                    $data[] = "$tahun-0$bulan_awal-$i";
                }
            }
        }
        if ($bulan_akhir) {
            for ($i=1; $i <= $hari_akhir; $i++) { 
                if ($i<10) {
                    $data[] = "$tahun-0$bulan_akhir-0$i";
                } else {
                    $data[] = "$tahun-0$bulan_akhir-$i";
                }
            }
        }
    } elseif ($bulan_awal === $bulan_akhir) {
        for ($i=$hari_awal; $i <= $hari_akhir; $i++) { 
            if ($i<10) {
                $data[] = "$tahun-0$bulan_akhir-0$i";
            } else {
                $data[] = "$tahun-0$bulan_akhir-$i";
            }
        }
    }

    return $data;
}

function add_jid($pgw,$tgl){
    // $query = 'select max(nourut) mx from skp_journal where pegawaiid=\'' . $pgw . '\' and tgl=\'' . $tgl . '\'';
    $nourut = 0;
    // if ($result = mssql_query($query))
    // {
    //     $row = mssql_fetch_assoc($result);
    //     $nourut = $row['mx'] + 1;
    // }
    $jid = $pgw . str_replace('-', '', $tgl) . $nourut;
    return $jid;
}

?>
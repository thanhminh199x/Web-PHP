<?php

$tuoiCon = 0;

while (kiemTraTuoi($tuoiCon) == false) {
    $tuoiCon++;
}

echo "Tuoi con:" . $tuoiCon . "<pre>";
$tuoiMe = 6 * $tuoiCon - 20;
echo "Tuoi me:" . $tuoiMe;

/**
 * Hàm kiểm tra tuổi con và mẹ 
 * 
 */
function kiemTraTuoi($tuoiCon)
{
    if ($tuoiCon > 4) {
        $tuoiMe = 6 * $tuoiCon - 20;
        if (3 * ($tuoiMe + 4) == 8 * ($tuoiCon + 4)) {
            return true;
        }
    }

}

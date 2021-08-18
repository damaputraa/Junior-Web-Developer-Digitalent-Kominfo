<?php
//Rachmad Ananda Damaputra

//Fungsi Bagi
function divideByZero($angka1, $angka2)

{
  // Fungsi Jika angka 1 dan 2 itu benar maka cetak Hasil
  if ($angka1 && $angka2 == true) {
    $hasil = $angka1 / $angka2;
    return $hasil;
    // Jika Salah Cetak Hasil Tidak Valid
  } else {
    return "Hasil Tidak Valid.";
  }
}

// Output Hasil
echo "Hasil Divide 2:2 adalah = " . divideByZero(2, 2);
echo "<br>";
echo "Hasil Divide 7:2 adalah = " . divideByZero(7, 2);
echo "<br>";
echo "Hasil Divide 5:0 adalah = " . divideByZero(5, 0);

kesimpulan
1).kesalahan yang pertama itu terjadi karena codenya hanya mencari email pada db tanpa mengecek password yang ada
2).kedua terjadi karena pada folder routes tidak memilki middleware untuk membatasi akases per role nya
3).yang ketiga terjadi saat register pada password tidak di tambahkan hash jadinya yang di input di db mentah mentah dari request tidak bisa enkripsi
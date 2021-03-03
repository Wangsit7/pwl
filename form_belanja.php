<h1 style="text-align:center;">Belanja Online</h1>
<form method="POST" action="form_belanja.php">
<fieldset style="width: 300px; margin: 50px 500px; background-color: rgba(201, 76, 76, 0.3);">
<label>Customer : </label>
<input type="text" name="nama" style="width: 150px; height: 20px; margin-left: 40px;"/><br/>
<label>Produk Pilihan : </label>
<select name="produk" style="width: 150px; height: 20px; margin: 10px 7px;">
    <option value="">--Pilihan Produk--</option>
    <option value="TV">TV = Rp1250000</option>
    <option value="Kulkas">Kulkas = Rp1800000</option>
    <option value="Mesin Cuci">Mesin Cuci = Rp3400000</option>
    <option value="AC">AC = Rp3100000</option>
</select><br/>
<label>Jumlah Beli : </label>
<input type="number" name="jumlah" style="width: 150px; height: 20px; margin: 1px 26px;"/><br/>
<input type="submit" name="proses" id="Simpan" value="Simpan"/><br/>
</fieldset>
</form>
<hr style="border:1px solid black">

<?php 
    // tangkap request
    $nama = $_POST["nama"];
    $produkPilihan = $_POST["produk"];
    $jumlahBeli = $_POST["jumlah"];

    // struktur kendali
    // kondisional if
    if ($produkPilihan == "TV") $hargasatuan = "Rp1250000";
    else if ($produkPilihan == "Kulkas") $hargasatuan = "Rp1800000";
    else if ($produkPilihan == "Mesin Cuci") $hargasatuan = "Rp3400000";
    else if ($produkPilihan == "AC") $hargasatuan = "Rp3100000";
    else $hargasatuan = "";

    // switch case
    switch ($produkPilihan) {
        case "TV": $hargasatuan = 1250000; break;
        case "Kulkas": $hargasatuan = 1800000; break;
        case "Mesin Cuci": $hargasatuan = 3400000; break;
        case "AC": $hargasatuan = 3100000; break;
        default: $hargasatuan = ""; break;
    }

    // total belanja
    $total = $jumlahBeli * $hargasatuan;
    
    // potongan diskon
    $diskon = $total * 15/100;

    // pajak
    $pajak = ($total - $diskon) * 10/100;

    // jumlah bayar
    $bayar = $total + $pajak - $diskon;


    echo 'Customer : '.$nama;
    echo '<br/>Produk Pilihan : '.$produkPilihan;
    echo '<br/>Jumlah Beli : '.$jumlahBeli;
    echo '<br/>Harga Satuan : '.$hargasatuan;
    echo '<br/>Total Belanja : '.$total;
    echo '<hr>Potonga Diskon : '.$diskon;
    echo '<br/>Pajak 10% : '.$pajak;
    echo '<hr>Harus Dibayar : '.$bayar;
?>
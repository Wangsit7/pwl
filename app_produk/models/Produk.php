<?php 
    class Produk{
        //member1 var
        private $koneksi;

        //member2 konstruktor
        public function __construct()
        {
            global $dbh;
            $this->koneksi = $dbh;
        }

        //member3 method CRUD
        public function dataProduk(){
            $sql = "SELECT produk.*, jenis.nama as kategori from Produk
                    INNER JOIN jenis on jenis.id = produk.idjenis
                    ORDER BY produk.id DESC";

            //prepare statement
            $ps = $this->koneksi->prepare($sql);
            $ps->execute();
            $rs = $ps->fetchAll();
            return $rs;
        }

        public function getProduk($id){
            $sql = "SELECT produk.*, jenis.nama as kategori from Produk
                    INNER JOIN jenis on jenis.id = produk.idjenis
                    WHERE produk.id = ?";

            //prepare statement
            $ps = $this->koneksi->prepare($sql);
            $ps->execute([$id]);
            $rs = $ps->fetch();
            return $rs;
        }

        public function dataJenis(){
            $sql = "SELECT * from jenis";
            //fungsi query eksekusi query dan ambil data
            $rs = $this->koneksi->query($sql);
            return $rs;
        }

        public function simpan($data){
            $sql = "INSERT INTO produk(kode,nama,kondisi,harga,stok,idjenis,foto)
            values (?,?,?,?,?,?,?)";

            //prepare statement
            $ps = $this->koneksi->prepare($sql);
            $ps->execute($data);
        }

        public function ubah($data){
            $sql = "UPDATE produk SET kode=?,nama=?,kondisi=?,harga=?,
            stok=?,idjenis=?,foto=? WHERE id=?";

            //prepare statement
            $ps = $this->koneksi->prepare($sql);
            $ps->execute($data);
        }

        public function hapus($id){
            $sql = "DELETE FROM produk WHERE id=?";

            //prepare statement
            $ps = $this->koneksi->prepare($sql);
            $ps->execute($id);
        }
    }
?>
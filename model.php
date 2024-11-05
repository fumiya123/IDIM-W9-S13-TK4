<?php
class Model {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=toko_barang', 'root', '');
    }

//------------tabel HakAkses-----------------------------	
	public function getHakAkses() {
        $query = $this->db->query('SELECT * FROM hakakses');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHakAksesById($id) {
        $stmt = $this->db->prepare('SELECT * FROM hakakses WHERE IdAkses = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertHakAkses($data) {
        $stmt = $this->db->prepare('INSERT INTO hakakses (IdAkses, namaAkses, Keterangan) VALUES (?, ?, ?)');
        $stmt->execute([$data['IdAkses'], $data['namaAkses'], $data['Keterangan']]);
    }
	
	public function updateHakAkses($data) {
        $stmt = $this->db->prepare('UPDATE hakakses SET IdAkses = ?, namaAkses = ?, Keterangan = ? WHERE IdAkses = ?');
        $stmt->execute([$data['IdAkses_new'], $data['namaAkses'], $data['Keterangan'], $data['IdAkses']]);
    }

    public function deleteHakAkses($IdAkses) {
        $stmt = $this->db->prepare('DELETE FROM hakakses WHERE IdAkses = ?');
        $stmt->execute([$IdAkses]);
    }
	
//------------tabel pengguna-----------------------------	
	public function getPengguna() {
        $query = $this->db->query('SELECT * FROM pengguna');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPenggunaById($id) {
        $stmt = $this->db->prepare('SELECT * FROM pengguna WHERE IdPengguna = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertPengguna($data) {
        $stmt = $this->db->prepare('INSERT INTO pengguna (IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
		$stmt->execute([$data['IdPengguna'], $data['NamaPengguna'], $data['Password'], $data['NamaDepan'], $data['NamaBelakang'], $data['NoHp'], $data['Alamat'], $data['IdAkses']]);
    }
	
	public function updatePengguna($data) {
        $stmt = $this->db->prepare('UPDATE pengguna SET IdPengguna = ?, NamaPengguna = ?, Password = ?, NamaDepan = ?, NamaBelakang = ?, NoHp = ?, Alamat = ?, IdAkses = ? WHERE IdPengguna = ?');
        $stmt->execute([$data['IdPengguna_new'], $data['NamaPengguna'], $data['Password'], $data['NamaDepan'], $data['NamaBelakang'], $data['NoHp'], $data['Alamat'], $data['IdAkses'], $data['IdPengguna']]);
    }

    public function deletePengguna($IdPengguna) {
        $stmt = $this->db->prepare('DELETE FROM pengguna WHERE IdPengguna = ?');
        $stmt->execute([$IdPengguna]);
    }
	
//------------tabel Barang-----------------------------
    public function getBarang() {
        $query = $this->db->query('SELECT * FROM barang');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBarangById($id) {
        $stmt = $this->db->prepare('SELECT * FROM barang WHERE IdBarang = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertBarang($data) {
        $stmt = $this->db->prepare('INSERT INTO barang (IdBarang, IdPengguna, Keterangan, NamaBarang, Satuan) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$data['IdBarang'], $data['IdPengguna'], $data['Keterangan'], $data['NamaBarang'], $data['Satuan']]);
    }
	
	public function updateBarang($data) {
        $stmt = $this->db->prepare('UPDATE barang SET IdBarang = ?, IdPengguna = ?, Keterangan = ?, NamaBarang = ?, Satuan = ? WHERE IdBarang = ?');
        $stmt->execute([$data['IdBarang_new'], $data['IdPengguna'], $data['Keterangan'], $data['NamaBarang'], $data['Satuan'], $data['IdBarang']]);
    }

    public function deleteBarang($IdBarang) {
        $stmt = $this->db->prepare('DELETE FROM barang WHERE IdBarang = ?');
        $stmt->execute([$IdBarang]);
    }
	
//------------tabel penjualan-----------------------------	
	public function getPenjualan() {
        $query = $this->db->query('SELECT * FROM penjualan');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPenjualanById($id) {
        $stmt = $this->db->prepare('SELECT * FROM penjualan WHERE IdPenjualan = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertPenjualan($data) {
        $stmt = $this->db->prepare('INSERT INTO penjualan (IdPenjualan, JumlahPenjualan, HargaJual, IdBarang) VALUES (?, ?, ?, ?)');
		$stmt->execute([$data['IdPenjualan'], $data['JumlahPenjualan'], $data['HargaJual'], $data['IdBarang']]);
    }
	
	public function updatePenjualan($data) {
        $stmt = $this->db->prepare('UPDATE penjualan SET IdPenjualan = ?, JumlahPenjualan = ?, HargaJual = ?, IdBarang = ? WHERE IdPenjualan = ?');
        $stmt->execute([$data['IdPenjualan_new'], $data['JumlahPenjualan'], $data['HargaJual'], $data['IdBarang'], $data['IdPenjualan']]);
    }

    public function deletePenjualan($IdPenjualan) {
        $stmt = $this->db->prepare('DELETE FROM penjualan WHERE IdPenjualan = ?');
        $stmt->execute([$IdPenjualan]);
    }

//------------tabel pembelian-----------------------------	
	public function getPembelian() {
        $query = $this->db->query('SELECT * FROM pembelian');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPembelianById($id) {
        $stmt = $this->db->prepare('SELECT * FROM pembelian WHERE IdPembelian = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertPembelian($data) {
        $stmt = $this->db->prepare('INSERT INTO pembelian (IdPembelian, JumlahPembelian, HargaBeli, IdBarang) VALUES (?, ?, ?, ?)');
		$stmt->execute([$data['IdPembelian'], $data['JumlahPembelian'], $data['HargaBeli'], $data['IdBarang']]);
    }
	
	public function updatePembelian($data) {
        $stmt = $this->db->prepare('UPDATE pembelian SET IdPembelian = ?, JumlahPembelian = ?, HargaBeli = ?, IdBarang = ? WHERE IdPembelian = ?');
        $stmt->execute([$data['IdPembelian_new'], $data['JumlahPembelian'], $data['HargaBeli'], $data['IdBarang'], $data['IdPembelian']]);
    }

    public function deletePembelian($IdPembelian) {
        $stmt = $this->db->prepare('DELETE FROM pembelian WHERE IdPembelian = ?');
        $stmt->execute([$IdPembelian]);
    }	

    //------------tabel supplier-----------------------------	
	public function getSupplier() {
        $query = $this->db->query('SELECT * FROM supplier');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSupplierById($id) {
        $stmt = $this->db->prepare('SELECT * FROM supplier WHERE IdPembelian = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertSupplier($data) {
        $stmt = $this->db->prepare('INSERT INTO supplier (IdSupplier, NamaSupplier, AlamatSupplier, NoHpSupplier, EmailSupplier) VALUES (?, ?, ?, ?, ?)');
		$stmt->execute([$data['IdSupplier'], $data['NamaSupplier'], $data['AlamatSupplier'], $data['NoHpSupplier'], $data['EmailSupplier']]);
    }
	
	public function updateSupplier($data) {
        $stmt = $this->db->prepare('UPDATE supplier SET IdSupplier = ?, NamaSupplier = ?, AlamatSupplier = ?, NoHpSupplier = ?, EmailSupplier = ? WHERE IdSupplier = ?');
        $stmt->execute([$data['IdSupplier_new'], $data['NamaSupplier'], $data['AlamatSupplier'], $data['NoHpSupplier'], $data['EmailSupplier'], $data['IdSupplier']]);
    }

    public function deleteSupplier($IdSupplier) {
        $stmt = $this->db->prepare('DELETE FROM supplier WHERE IdSupplier = ?');
        $stmt->execute([$IdSupplier]);
    }
//---------------DASHBOARD-----------------
	public function calculateProfit() {
		$query = $this->db->
		query('
		SELECT
			SUM(keuntungan) AS totalKeuntungan
		FROM (
			SELECT
				barang.IdBarang,
				barang.NamaBarang,
				SUM(pembelian.JumlahPembelian * pembelian.HargaBeli) AS totalHargaBeli,
				SUM(penjualan.JumlahPenjualan * penjualan.HargaJual) AS totalHargaJual,
				(SUM(penjualan.JumlahPenjualan * penjualan.HargaJual) - SUM(pembelian.JumlahPembelian * pembelian.HargaBeli)) AS keuntungan
			FROM
				barang
			LEFT JOIN
				pembelian ON barang.IdBarang = pembelian.IdBarang
			LEFT JOIN
				penjualan ON barang.IdBarang = penjualan.IdBarang
			GROUP BY
				barang.IdBarang, barang.NamaBarang
		) AS subQuery;
		');
        return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function calculateTotalPurchase() {
		$query = $this->db->
		query('
		SELECT
			SUM(JumlahPembelian * HargaBeli) AS totalPembelian
		FROM
			pembelian;
		');
        return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function calculateTotalSelling() {
		$query = $this->db->
		query('
		SELECT
			SUM(JumlahPenjualan * HargaJual) AS totalPenjualan
		FROM
			penjualan;
		');
        return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	

}
?> 



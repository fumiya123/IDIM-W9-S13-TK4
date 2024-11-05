<?php
class View {

	//----------------tabel hakakses----------------
	public function tampilkanHakAkses($data) {
        // Panggil fungsi header
        $this->tampilkanHeaderDashboard();

        echo "<h2>Data Hak Akses</h2>";
        echo "<table border='1'>
                <tr>
                    <th>ID Akses</th>
                    <th>Nama Akses</th>
                    <th>Keterangan</th>
					<th>Control</th>
                </tr>";
        foreach ($data as $row) {
            echo "<tr>
                    <td>{$row['IdAkses']}</td>
                    <td>{$row['NamaAkses']}</td>
                    <td>{$row['Keterangan']}</td>
                    <td><a href='index.php?action=hakakses_edit&id={$row['IdAkses']}'>Edit</a> | <a href='index.php?action=hakakses_delete&id={$row['IdAkses']}'>Hapus</a></td>
                </tr>";
        }
        echo "</table>";
        echo "<br>";
		echo "<h3><a href=\"index.php?action=hakakses_add\">+ Tambah Hak Akses Baru</a></h3>";
		echo "<h3><a href=\"index.php\">Kembali ke Dashboard</a></h3>";
    }
	
	public function tampilkanFormTambahHakAkses($data) {
        // Panggil fungsi header
        $this->tampilkanHeaderDashboard();

        echo "<h2>Formulir Tambah Hak Akses</h2>";
        echo "<form method='post' action='./index.php?action=hakakses_add' class='form-container'>";	//ubah disini
		echo "<label class='form-label'>ID Akses</label> <input type='text' maxlength='5' name='IdAkses' class='form-input' value='" . (isset($data['IdAkses']) ? $data['IdAkses'] : '') . "'><br>"; //ini debug
        echo "<label class='form-label'>Nama Akses</label> <input type='text' name='namaAkses' class='form-input' value='" . (isset($data['NamaAkses']) ? $data['NamaAkses'] : '') . "'><br>";
        echo "<label class='form-label'>Keterangan</label> <input type='text' name='Keterangan' class='form-input' value='" . (isset($data['Keterangan']) ? $data['Keterangan'] : '') . "'><br>";
        echo "<input type='submit' value='Simpan' class='form-submit'>";
        echo "<a href=\"index.php?action=tampilkanHakAkses\" class='button-outline-green'>Kembali</a>"; 
        echo "</form>";		
    }
	
	public function tampilkanFormEditHakAkses($data) {
        // Panggil fungsi header
        $this->tampilkanHeaderDashboard();

        echo "<h2>Formulir Edit Hak Akses</h2>";
        echo "<form method='post' action='./index.php?action=hakakses_edit' class='form-container'>";	//ubah disini
		echo "<label class='form-label'>ID Akses</label> <input type='text' maxlength='5' name='IdAkses_new' class='form-input' value='" . (isset($data['IdAkses']) ? $data['IdAkses'] : '') . "'><br>"; //ini debug
        echo "<label class='form-label'>Nama Akses</label> <input type='text' name='namaAkses' class='form-input' value='" . (isset($data['NamaAkses']) ? $data['NamaAkses'] : '') . "'><br>";
        echo "<label class='form-label'>Keterangan</label> <input type='text' name='Keterangan' class='form-input' value='" . (isset($data['Keterangan']) ? $data['Keterangan'] : '') . "'><br>";
        echo "<input type='hidden' name='IdAkses' class='form-input' value='" . (isset($data['IdAkses']) ? $data['IdAkses'] : '') . "'>";
        echo "<input type='submit' value='Simpan' class='form-submit'>";
        echo "<a href=\"index.php?action=tampilkanHakAkses\" class='button-outline-green'>Kembali</a>";  
        echo "</form>";		
				
    }

	//----------------tabel Pengguna----------------
	public function tampilkanPengguna($data) {
        // Panggil fungsi header
        $this->tampilkanHeaderDashboard();

        echo "<h2>Data Pengguna</h2>";
        echo "<table border='1'>
                <tr>
                    <th>ID Pengguna</th>
                    <th>Nama Pengguna</th>
					<th>Nama Depan</th>
					<th>Nama Belakang</th>
					<th>No HP</th>
					<th>Alamat</th>
					<th>ID Akses</th>
					<th>Control</th>
                </tr>";
        foreach ($data as $row) {
            echo "<tr>
                    <td>{$row['IdPengguna']}</td>
                    <td>{$row['NamaPengguna']}</td>
					<td>{$row['NamaDepan']}</td>
					<td>{$row['NamaBelakang']}</td>
                    <td>{$row['NoHp']}</td>
                    <td>{$row['Alamat']}</td>
					<td>{$row['IdAkses']}</td>
                    <td><a href='index.php?action=pengguna_edit&id={$row['IdPengguna']}'>Edit</a> | <a href='index.php?action=pengguna_delete&id={$row['IdPengguna']} '>Hapus</a></td>
                </tr>";
        }
        echo "</table>";
		echo "<br>";
		echo "<h3><a href=\"index.php?action=pengguna_add\">+ Tambah Data Pengguna Baru</a></h3>";
		echo "<h3><a href=\"index.php\">Kembali ke Dashboard</a></h3>";
    }
	
	public function tampilkanFormTambahPengguna($data) {
        // Panggil fungsi header
        $this->tampilkanHeaderDashboard();

        echo "<h2>Formulir Tambah Data Pengguna</h2>";
        echo "<form method='post' action='./index.php?action=pengguna_add' class='form-container'>";
		echo "<label class='form-label'>ID Pengguna</label> <input type='text' maxlength='5' name='IdPengguna' class='form-input' value='" . (isset($data['IdPengguna']) ? $data['IdPengguna'] : '') . "'><br>"; //ini debug
        echo "<label class='form-label'>Nama Pengguna</label> <input type='text' name='NamaPengguna' class='form-input' value='" . (isset($data['NamaPengguna']) ? $data['NamaPengguna'] : '') . "'><br>";
		echo "<label class='form-label'>Password</label> <input type='text' name='Password' class='form-input' value='" . (isset($data['Password']) ? $data['Password'] : '') . "'><br>";
        echo "<label class='form-label'>Nama Depan</label> <input type='text' name='NamaDepan' class='form-input' value='" . (isset($data['NamaDepan']) ? $data['NamaDepan'] : '') . "'><br>";
		echo "<label class='form-label'>Nama Belakang</label> <input type='text' name='NamaBelakang' class='form-input' value='" . (isset($data['NamaBelakang']) ? $data['NamaBelakang'] : '') . "'><br>"; //ini debug
        echo "<label class='form-label'>No HP</label> <input type='text' name='NoHp' class='form-input' value='" . (isset($data['NoHp']) ? $data['NoHp'] : '') . "'><br>";
		echo "<label class='form-label'>Alamat</label> <input type='text' name='Alamat' class='form-input' value='" . (isset($data['Alamat']) ? $data['Alamat'] : '') . "'><br>";
        echo "<label class='form-label'>ID Akses</label> <input type='text' maxlength='5' name='IdAkses' class='form-input' value='" . (isset($data['IdAkses']) ? $data['IdAkses'] : '') . "'><br>";
        echo "<input type='submit' value='Simpan' class='form-submit'>";
        echo "<a href=\"index.php?action=tampilkanPengguna\" class='button-outline-green'>Kembali</a>";  
        echo "</form>";		
    }
	
	public function tampilkanFormEditPengguna($data) {
        // Panggil fungsi header
        $this->tampilkanHeaderDashboard();

        echo "<h2>Formulir Edit Data Pengguna</h2>";
        echo "<form method='post' action='./index.php?action=pengguna_edit' class='form-container'>";
		echo "<label class='form-label'>ID Pengguna</label> <input type='text' maxlength='5' name='IdPengguna_new' class='form-input' value='" . (isset($data['IdPengguna']) ? $data['IdPengguna'] : '') . "'><br>"; //ini debug
        echo "<label class='form-label'>Nama Pengguna</label> <input type='text' name='NamaPengguna' class='form-input' value='" . (isset($data['NamaPengguna']) ? $data['NamaPengguna'] : '') . "'><br>";
		echo "<label class='form-label'>Password</label> <input type='text' name='Password' class='form-input' value='" . (isset($data['Password']) ? $data['Password'] : '') . "'><br>";
        echo "<label class='form-label'>Nama Depan</label> <input type='text' name='NamaDepan' class='form-input' value='" . (isset($data['NamaDepan']) ? $data['NamaDepan'] : '') . "'><br>";
		echo "<label class='form-label'>Nama Belakang</label> <input type='text' name='NamaBelakang' class='form-input' value='" . (isset($data['NamaBelakang']) ? $data['NamaBelakang'] : '') . "'><br>"; //ini debug
        echo "<label class='form-label'>No HP</label> <input type='text' name='NoHp' class='form-input' value='" . (isset($data['NoHp']) ? $data['NoHp'] : '') . "'><br>";
		echo "<label class='form-label'>Alamat</label> <input type='text' name='Alamat' class='form-input' value='" . (isset($data['Alamat']) ? $data['Alamat'] : '') . "'><br>";
        echo "<label class='form-label'>ID Akses</label> <input type='text' maxlength='5' name='IdAkses' class='form-input' value='" . (isset($data['IdAkses']) ? $data['IdAkses'] : '') . "'><br>";
        echo "<input type='hidden' name='IdPengguna' class='form-input' value='" . (isset($data['IdPengguna']) ? $data['IdPengguna'] : '') . "'>";
        echo "<input type='submit' value='Simpan' class='form-submit'>";
        echo "<a href=\"index.php?action=tampilkanPengguna\" class='button-outline-green'>Kembali</a>"; 
        echo "</form>";		
		
    }
	
	//----------------tabel barang----------------
    public function tampilkanBarang($data) {
        // Panggil fungsi header
        $this->tampilkanHeaderDashboard();

        echo "<h2>Data Barang</h2>";
        echo "<table border='1'>
                <tr>
                    <th>ID Barang</th>
                    <th>ID Pengguna</th>
                    <th>Keterangan</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Control</th>
                </tr>";
        foreach ($data as $row) {
            echo "<tr>
                    <td>{$row['IdBarang']}</td>
                    <td>{$row['IdPengguna']}</td>
                    <td>{$row['Keterangan']}</td>
                    <td>{$row['NamaBarang']}</td>
                    <td>{$row['Satuan']}</td>
                    <td><a href='index.php?action=barang_edit&id={$row['IdBarang']}'>Edit</a> | <a href='index.php?action=barang_delete&id={$row['IdBarang']}'>Hapus</a></td>
                </tr>";
        }
        echo "</table>";
        echo "<br>";
		echo "<h3><a href=\"index.php?action=barang_add\">+ Tambah Data Barang Baru</a></h3>";
		echo "<h3><a href=\"index.php\">Kembali ke Dashboard</a></h3>";
    }

    public function tampilkanFormTambahBarang($data) {
        // Panggil fungsi header
        $this->tampilkanHeaderDashboard();

        echo "<h2>Formulir Tambah Barang</h2>";
        echo "<form method='post' action='./index.php?action=barang_add' class='form-container'>";
		echo "<label class='form-label'>ID Barang</label> <input type='text' name='IdBarang' class='form-input' value='" . (isset($data['IdBarang']) ? $data['IdBarang'] : '') . "'><br>"; //ini debug
        echo "<label class='form-label'>ID Pengguna</label> <input type='text' name='IdPengguna' class='form-input' value='" . (isset($data['IdPengguna']) ? $data['IdPengguna'] : '') . "'><br>";
        echo "<label class='form-label'>Nama Barang</label> <input type='text' name='NamaBarang' class='form-input' value='" . (isset($data['NamaBarang']) ? $data['NamaBarang'] : '') . "'><br>";
        echo "<label class='form-label'>Keterangan</label> <input type='text' name='Keterangan' class='form-input' value='" . (isset($data['Keterangan']) ? $data['Keterangan'] : '') . "'><br>";
        echo "<label class='form-label'>Satuan</label> <input type='text' name='Satuan' class='form-input' value='" . (isset($data['Satuan']) ? $data['Satuan'] : '') . "'><br>";
        echo "<input type='submit' value='Simpan' class='form-submit'>"; 
        echo "<a href=\"index.php?action=tampilkanBarang\" class='button-outline-green'>Kembali</a>";   
        echo "</form>";			
		
    }
	
	public function tampilkanFormEditBarang($data) {
        // Panggil fungsi header
        $this->tampilkanHeaderDashboard();

        echo "<h2>Formulir Edit Barang</h2>";
        echo "<form method='post' action='./index.php?action=barang_edit' class='form-container'>";	
		echo "<label class='form-label'>ID Barang</label> <input type='text' maxlength='5' name='IdBarang_new' class='form-input' value='" . (isset($data['IdBarang']) ? $data['IdBarang'] : '') . "'><br>"; //ini debug
        echo "<label class='form-label'>Nama Barang</label> <input type='text' name='NamaBarang' class='form-input' value='" . (isset($data['NamaBarang']) ? $data['NamaBarang'] : '') . "'><br>";
        echo "<label class='form-label'>ID Pengguna</label> <input type='text' maxlength='5' name='IdPengguna' class='form-input' value='" . (isset($data['IdPengguna']) ? $data['IdPengguna'] : '') . "'><br>";
        echo "<label class='form-label'>Keterangan</label> <input type='text' name='Keterangan' class='form-input' value='" . (isset($data['Keterangan']) ? $data['Keterangan'] : '') . "'><br>";
        echo "<label class='form-label'>Satuan</label> <input type='text' name='Satuan' class='form-input' value='" . (isset($data['Satuan']) ? $data['Satuan'] : '') . "'><br>";
        echo "<input type='hidden' name='IdBarang' class='form-input' value='" . (isset($data['IdBarang']) ? $data['IdBarang'] : '') . "'>";
        echo "<input type='submit'  value='Simpan' class='form-submit'>";
        echo "<a href=\"index.php?action=tampilkanBarang\" class='button-outline-green'>Kembali</a>";
        echo "</form>";			
    }
		
	//----------------tabel penjualan----------------	
	public function tampilkanPenjualan($data) {
        // Panggil fungsi header
        $this->tampilkanHeaderDashboard();

        echo "<h2>Data Penjualan</h2>";
        echo "<table border='1'>
                <tr>
                    <th>ID Penjualan</th>
                    <th>Jumlah Penjualan</th>
                    <th>Harga Jual</th>
					<th>ID Barang</th>
					<th>Control</th>
                </tr>";
        foreach ($data as $row) {
            echo "<tr>
                    <td>{$row['IdPenjualan']}</td>
                    <td>{$row['JumlahPenjualan']}</td>
                    <td>{$row['HargaJual']}</td>
					<td>{$row['IdBarang']}</td>
                    <td><a href='index.php?action=penjualan_edit&id={$row['IdPenjualan']}'>Edit</a> | <a href='index.php?action=penjualan_delete&id={$row['IdPenjualan']}'>Hapus</a></td>
                </tr>";
        }
        echo "</table>";
        echo "<br>";
		echo "<h3><a href=\"index.php?action=penjualan_add\">+ Tambah Data Penjualan Baru</a></h3>";
		echo "<h3><a href=\"index.php\">Kembali ke Dashboard</a></h3>";
		
		
    }
	
	public function tampilkanFormTambahPenjualan($data) {
        // Panggil fungsi header
        $this->tampilkanHeaderDashboard();

        echo "<h2>Formulir Tambah Data Penjualan</h2>";
        echo "<form method='post' action='./index.php?action=penjualan_add' class='form-container'>";	//ubah disini
		echo "<label class='form-label'>ID Penjualan</label> <input type='text' maxlength='5' name='IdPenjualan' class='form-input' value='" . (isset($data['IdPenjualan']) ? $data['IdPenjualan'] : '') . "'><br>";
		echo "<label class='form-label'>Jumlah Penjualan</label> <input type='number' name='JumlahPenjualan' class='form-input' value='" . (isset($data['JumlahPenjualan']) ? $data['JumlahPenjualan'] : '') . "'><br>";
		echo "<label class='form-label'>Harga Jual</label> <input type='number' name='HargaJual' class='form-input' value='" . (isset($data['HargaJual']) ? $data['HargaJual'] : '') . "'><br>";
        echo "<label class='form-label'>ID Barang</label> <input type='text' maxlength='5' name='IdBarang' class='form-input' value='" . (isset($data['IdBarang']) ? $data['IdBarang'] : '') . "'><br>";
        echo "<input type='submit' value='Simpan' class='form-submit'>";
        echo "<a href=\"index.php?action=tampilkanPenjualan\" class='button-outline-green'>Kembali</a>";
        echo "</form>";	
			
    }
	
	public function tampilkanFormEditPenjualan($data) {
        // Panggil fungsi header
        $this->tampilkanHeaderDashboard();

        echo "<h2>Formulir Edit Data Penjualan</h2>";
        echo "<form method='post' action='./index.php?action=penjualan_edit' class='form-container'>";	
		echo "<label class='form-label'>ID Penjualan</label> <input type='text' maxlength='5' name='IdPenjualan_new' class='form-input' value='" . (isset($data['IdPenjualan']) ? $data['IdPenjualan'] : '') . "'><br>"; //ini debug
    
		echo "<label class='form-label'>Jumlah Penjualan</label> <input type='number' name='JumlahPenjualan' class='form-input' value='" . (isset($data['JumlahPenjualan']) ? $data['JumlahPenjualan'] : '') . "'><br>";
		echo "<label class='form-label'>Harga Jual</label> <input type='number' name='HargaJual' class='form-input' value='" . (isset($data['HargaJual']) ? $data['HargaJual'] : '') . "'><br>";
        echo "<label class='form-label'>ID Barang</label> <input type='text' maxlength='5' name='IdBarang' class='form-input' value='" . (isset($data['IdBarang']) ? $data['IdBarang'] : '') . "'><br>";
        echo "<input type='hidden' name='IdPenjualan' class='form-input' value='" . (isset($data['IdPenjualan']) ? $data['IdPenjualan'] : '') . "'>";
        echo "<input type='submit' value='Simpan' class='form-submit'>";
        echo "<a href=\"index.php?action=tampilkanPenjualan\" class='button-outline-green'>Kembali</a>";
        echo "</form>";		
    }
	
	//----------------tabel pembelian----------------	
	public function tampilkanPembelian($data) {
        // Panggil fungsi header
        $this->tampilkanHeaderDashboard();

        echo "<h2>Data Pembelian</h2>";
        echo "<table border='1'>
                <tr>
                    <th>ID Pembelian</th>
                    <th>Jumlah Pembelian</th>
                    <th>Harga Beli</th>
					<th>ID Barang</th>
					<th>Control</th>
                </tr>";
        foreach ($data as $row) {
            echo "<tr>
                    <td>{$row['IdPembelian']}</td>
                    <td>{$row['JumlahPembelian']}</td>
                    <td>{$row['HargaBeli']}</td>
					<td>{$row['IdBarang']}</td>
                    <td><a href='index.php?action=pembelian_edit&id={$row['IdPembelian']}'>Edit</a> | <a href='index.php?action=pembelian_delete&id={$row['IdPembelian']}'>Hapus</a></td>
                </tr>";
        }
        echo "</table>";
        echo "<br>";		
		echo "<h3><a href=\"index.php?action=pembelian_add\">+ Tambah Data Pembelian Baru</a></h3>";
		echo "<h3><a href=\"index.php\">Kembali ke Dashboard</a></h3>";
    }
	
	public function tampilkanFormTambahPembelian($data) {
        // Panggil fungsi header
        $this->tampilkanHeaderDashboard();

        echo "<h2>Formulir Tambah Data Pembelian</h2>";
        echo "<form method='post' action='./index.php?action=pembelian_add' class='form-container'>";	
		echo "<label class='form-label'>ID Pembelian</label> <input type='text' maxlength='5' name='IdPembelian' class='form-input' value='" . (isset($data['IdPembelian']) ? $data['IdPembelian'] : '') . "'><br>";
		echo "<label class='form-label'>Jumlah Pembelian</label> <input type='number' name='JumlahPembelian' class='form-input' value='" . (isset($data['JumlahPembelian']) ? $data['JumlahPembelian'] : '') . "'><br>";
		echo "<label class='form-label'>Harga Beli</label> <input type='number' name='HargaBeli' class='form-input' value='" . (isset($data['HargaBeli']) ? $data['HargaBeli'] : '') . "' required><br>";
        echo "<label class='form-label'>ID Barang</label> <input type='text' maxlength='5' name='IdBarang' class='form-input' value='" . (isset($data['IdBarang']) ? $data['IdBarang'] : '') . "'><br>";
        echo "<input type='submit' class='form-submit' value='Simpan' class='form-submit'>";
        echo "<a href=\"index.php?action=tampilkanPembelian\" class='button-outline-green'>Kembali</a>";
        echo "</form>";

    }
	
	public function tampilkanFormEditPembelian($data) {
        // Panggil fungsi header
        $this->tampilkanHeaderDashboard();

        echo "<h2>Formulir Edit Data Pembelian</h2>";
        echo "<form method='post' action='./index.php?action=pembelian_edit' class='form-container'>";
		echo "<label class='form-label'>ID Pembelian</label> <input type='text' maxlength='5' name='IdPembelian_new' class='form-input' value='" . (isset($data['IdPembelian']) ? $data['IdPembelian'] : '') . "'><br>"; //ini debug
        echo "<label class='form-label'>Jumlah Pembelian</label> <input type='number' name='JumlahPembelian' class='form-input' value='" . (isset($data['JumlahPembelian']) ? $data['JumlahPembelian'] : '') . "' required><br>";
		echo "<label class='form-label'>Harga Beli</label> <input type='number' name='HargaBeli' class='form-input' value='" . (isset($data['HargaBeli']) ? $data['HargaBeli'] : '') . "'><br>";
        echo "<label class='form-label'>ID Barang</label> <input type='text' maxlength='5' name='IdBarang' class='form-input' value='" . (isset($data['IdBarang']) ? $data['IdBarang'] : '') . "'><br>";
        echo "<input type='hidden' name='IdPembelian' class='form-input' value='" . (isset($data['IdPembelian']) ? $data['IdPembelian'] : '') . "'>";
        echo "<input type='submit' value='Simpan' class='form-submit'>";
        echo "<a href=\"index.php?action=tampilkanPembelian\" class='button-outline-green'>Kembali</a>";
        echo "</form>";	
	
    }
	
    public function tampilkanHeaderDashboard() {
        echo "
            <nav class=\"navbar navbar-dark bg-success fixed-top\">
                <div class=\"container-fluid\">
                    <a class=\"navbar-brand\" href=\"index.php\">DASHBOARD</a>
                    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasDarkNavbar\" aria-controls=\"offcanvasDarkNavbar\" aria-label=\"Toggle navigation\">
                        <span class=\"navbar-toggler-icon\"></span>
                    </button>
                    <div class=\"offcanvas offcanvas-end text-bg-success\" tabindex=\"-1\" id=\"offcanvasDarkNavbar\" aria-labelledby=\"offcanvasDarkNavbarLabel\">
                        <div class=\"offcanvas-header\">
                            <h5 class=\"offcanvas-title\" id=\"offcanvasDarkNavbarLabel\">Menu</h5>
                            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
                        </div>
                        <div class=\"offcanvas-body\">
                            <ul class=\"navbar-nav justify-content-end flex-grow-1 pe-3\">
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" aria-current=\"page\" href=\"index.php?action=tampilkanHakAkses\">Data Hak Akses</a>
                                </li>
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" aria-current=\"page\" href=\"index.php?action=tampilkanPengguna\">Data Pengguna</a>
                                </li>
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" aria-current=\"page\" href=\"index.php?action=tampilkanBarang\">Data Barang</a>
                                </li>
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" aria-current=\"page\" href=\"index.php?action=tampilkanPembelian\">Data Pembelian</a>
                                </li>
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" aria-current=\"page\" href=\"index.php\">Data Supplier</a>
                                </li>
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" aria-current=\"page\" href=\"index.php?action=tampilkanPenjualan\">Data Penjualan</a>
                                </li>
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" aria-current=\"page\" href=\"index.php\">Data Pelanggan</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <br><br>
        ";
    }
    

    public function tampilkanDashboard($data1, $data2, $data3) {
        // Panggil fungsi header
        $this->tampilkanHeaderDashboard();
    
        // Lanjutkan dengan konten dashboard
        echo "
            <div class=\"row row-cols-1 row-cols-md-3 g-4\">
                <div class=\"col\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title text-start\">Total Pembelian</h5>
                            <p style=\"font-size:40px;\">Rp " . number_format($data1[0]['totalPembelian'], 0, ',', '.') . "</p>
                        </div>
                    </div>
                </div>
                <div class=\"col\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title text-start\">Total Penjualan</h5>
                            <p style=\"font-size:40px;\">Rp " . number_format($data2[0]['totalPenjualan'], 0, ',', '.') . "</p>
                        </div>
                    </div>
                </div>
                <div class=\"col\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title text-start\">Total Keuntungan</h5>
                            <p style=\"font-size:40px;\">Rp " . number_format($data3[0]['totalKeuntungan'], 0, ',', '.') . "</p>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br><br>
            <div class=\"group\">
                <h2>Kelompok 6 - IDIM</h2>
                <ul>
                    <li>DHIMAZ NUR RAMADHAN (2702500744)</li>
                    <li>HABIB AZIZUL HAQ (2702488253)</li>
                    <li>NADIA OLIVIA KURNIAWAN (2702491595)</li>
                    <li>RIZKY ANUGRAH (2702483776)</li>
                </ul>
            </div>
        ";
    }
    




}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    
</body>
</html>
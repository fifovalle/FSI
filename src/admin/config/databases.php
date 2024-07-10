<?php
include 'connection.php';

// ===================================ADMIN===================================
class Admin
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilanganString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }

    public function tambahAdmin($data)
    {
        $query = "INSERT INTO admin (Foto_Admin, Nama_Admin, Email_Admin, Kata_Sandi, Konfirmasi_Kata_Sandi, Jenis_Kelamin_Admin, Status_Verifikasi_Email, Token_Verifikasi) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "sssssssi",
            $this->menghilanganString($data['Foto_Admin']),
            $this->menghilanganString($data['Nama_Admin']),
            $this->menghilanganString($data['Email_Admin']),
            $this->menghilanganString($data['Kata_Sandi']),
            $this->menghilanganString($data['Konfirmasi_Kata_Sandi']),
            $this->menghilanganString($data['Jenis_Kelamin_Admin']),
            $this->menghilanganString($data['Status_Verifikasi_Email']),
            $this->menghilanganString($data['Token_Verifikasi'])
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function perbaruiAdmin($idAdmin, $dataAdmin)
    {
        $sql = "UPDATE admin SET Nama_Admin = ?, Email_Admin = ?, Jenis_Kelamin_Admin = ? WHERE ID_Admin = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("sssi", $dataAdmin['Nama_Admin'], $dataAdmin['Email_Admin'], $dataAdmin['Jenis_Kelamin_Admin'], $idAdmin);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function perbaruiKataSandi($id, $data)
    {
        $query = "UPDATE admin SET Kata_Sandi=?, Konfirmasi_Kata_Sandi=? WHERE ID_Admin=?";
        $statement = $this->koneksi->prepare($query);
        $statement->bind_param("ssi", $data['Kata_Sandi'], $data['Konfirmasi_Kata_Sandi'], $id);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function perbaruiProfile($id, $data)
    {
        $query = "UPDATE admin SET Foto_Admin=?, Nama_Admin=?, Email_Admin=?, Kata_Sandi=?, Konfirmasi_Kata_Sandi=? WHERE ID_Admin=?";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param("sssssi", $data['Foto_Admin'], $data['Nama_Admin'], $data['Email_Admin'], $data['Kata_Sandi'], $data['Konfirmasi_Kata_Sandi'], $id);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateStatusVerifikasi($adminId, $status)
    {
        $query = "UPDATE admin SET Status_Verifikasi_Email = ? WHERE ID_Admin = ?";
        $stmt = mysqli_prepare($this->koneksi, $query);
        mysqli_stmt_bind_param($stmt, "si", $status, $adminId);
        return mysqli_stmt_execute($stmt);
    }

    public function updateToken($adminId, $token)
    {
        $query = "UPDATE admin SET Token_Verifikasi = ? WHERE ID_Admin = ?";
        $stmt = mysqli_prepare($this->koneksi, $query);
        mysqli_stmt_bind_param($stmt, "ii", $token, $adminId);
        return mysqli_stmt_execute($stmt);
    }

    public function getAdminById($idAdmin)
    {
        $sql = "SELECT * FROM admin WHERE ID_Admin = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("i", $idAdmin);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public function getAdminByEmail($email)
    {
        $query = "SELECT * FROM admin WHERE Email_Admin = '$email'";
        $result = mysqli_query($this->koneksi, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $adminData = mysqli_fetch_assoc($result);
            return $adminData;
        } else {
            return null;
        }
    }

    public function updateTokenByEmail($email, $newToken)
    {
        $query = "UPDATE admin SET Token_Verifikasi = '$newToken' WHERE Email_Admin = '$email'";
        $result = mysqli_query($this->koneksi, $query);

        if ($result) {
            return true;
            return false;
        }
    }

    public function getAdminByToken($token)
    {
        $query = "SELECT * FROM admin WHERE Token_Verifikasi = ?";
        $stmt = mysqli_prepare($this->koneksi, $query);
        mysqli_stmt_bind_param($stmt, "i", $token);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

    public function cekEmailSudahAda($email)
    {
        $query = "SELECT COUNT(*) as total FROM admin WHERE Email_Admin = ?";
        $statement = $this->koneksi->prepare($query);
        $statement->bind_param("s", $email);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();

        $total = $row['total'];

        if ($total > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function tampilkanDataAdmin()
    {
        $query = "SELECT * FROM admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    function tampilkanAdminDenganSessionId($idSessionAdmin)
    {
        $idSessionAdmin = intval($idSessionAdmin);
        $query = "SELECT * FROM admin WHERE ID_Admin = $idSessionAdmin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    function getPlainPassword($adminId, $koneksi)
    {
        $query = "SELECT Kata_Sandi FROM admin WHERE ID_Admin = $adminId";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        $plainPassword = $row['Kata_Sandi'];
        return $plainPassword;
    }

    public function hapusAdmin($id)
    {
        $query = "SELECT ID_Admin, Foto_Admin FROM admin WHERE ID_Admin=?";
        $statement = $this->koneksi->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();
        $idPemilikFoto = $row['ID_Admin'];
        $namaFoto = $row['Foto_Admin'];

        if ($idPemilikFoto != $id) {
            return false;
        }

        $queryDelete = "DELETE FROM admin WHERE ID_Admin=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            $direktoriFoto = "../../uploads/";

            if (file_exists($direktoriFoto . $namaFoto)) {
                if (unlink($direktoriFoto . $namaFoto)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function autentikasiAdmin($email, $kataSandi)
    {
        $query = "SELECT * FROM admin WHERE Email_Admin = ?";
        $statement = $this->koneksi->prepare($query);
        $statement->bind_param("s", $email);
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedKataSandi = $row['Kata_Sandi'];
            if (password_verify($kataSandi, $hashedKataSandi)) {
                return $row;
            }
        }
        return null;
    }

    public function generateRandomCaptchaAdmin($length = 5)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $captcha = '';
        $max = strlen($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $captcha .= $characters[mt_rand(0, $max)];
        }

        return $captcha;
    }
}
// ===================================ADMIN===================================


// ===================================NAVBAR==================================
class Navbar
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilanganString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }

    public function tambahNavbar($data)
    {
        $query = "INSERT INTO navbar (ID_Admin, Daftar_Nama, Tautan, Kategori, Sub_Kategori) VALUES (?, ?, ?, ?, ?)";
        $statement = $this->koneksi->prepare($query);
        $daftarNama = mysqli_real_escape_string($this->koneksi, $data['Daftar_Nama']);
        $tautan = mysqli_real_escape_string($this->koneksi, $data['Tautan']);
        $kategori = mysqli_real_escape_string($this->koneksi, $data['Kategori']);
        $subKategori = mysqli_real_escape_string($this->koneksi, $data['Sub_Kategori']);
        $idAdmin = intval($data['ID_Admin']);
        $statement->bind_param("issss", $idAdmin, $daftarNama, $tautan, $kategori, $subKategori);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function tampilkanDataNavbar()
    {
        $query = "SELECT * FROM navbar LEFT JOIN admin ON navbar.ID_Admin = admin.ID_Admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function tampilkanDataNavbarKategoriProfil()
    {
        $query = "SELECT * FROM navbar WHERE Kategori = 'profil' AND Sub_Kategori IS NULL";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function tampilkanDataNavbarKategoriProfilSubSurvey()
    {
        $query = "SELECT * FROM navbar WHERE Kategori = 'profil' AND Sub_Kategori = 'survey'";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function tampilkanDataNavbarKategoriSDM()
    {
        $query = "SELECT * FROM navbar WHERE Kategori = 'SDM' AND Sub_Kategori IS NULL";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function tampilkanDataNavbarKategoriAkademik()
    {
        $query = "SELECT * FROM navbar WHERE Kategori = 'Akademik' AND Sub_Kategori IS NULL";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function tampilkanDataNavbarKategoriAkademikSubDokumen()
    {
        $query = "SELECT * FROM navbar WHERE Kategori = 'Akademik' AND Sub_Kategori = 'Dokumen Akademik'";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function tampilkanDataNavbarKategoriFasilitas()
    {
        $query = "SELECT * FROM navbar WHERE Kategori = 'Fasilitas' AND Sub_Kategori IS NULL";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function tampilkanDataNavbarKategoriPenjaminan()
    {
        $query = "SELECT * FROM navbar WHERE Kategori = 'Penjaminan Mutu' AND Sub_Kategori IS NULL";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }
    public function tampilkanDataNavbarKategoriMahasiswa()
    {
        $query = "SELECT * FROM navbar WHERE Kategori = 'Mahasiswa' AND Sub_Kategori IS NULL";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }
    public function tampilkanDataNavbarKategoriPenelitianDanPengabdian()
    {
        $query = "SELECT * FROM navbar WHERE Kategori = 'Penelitian Dan Pengabdian' AND Sub_Kategori IS NULL";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function tampilkanDataNavbarKategoriPenelitian()
    {
        $query = "SELECT * FROM navbar WHERE Kategori = 'Penelitian Dan Pengabdian' AND Sub_Kategori = 'Penelitian'";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }
    public function tampilkanDataNavbarKategoriSiterpadu()
    {
        $query = "SELECT * FROM navbar WHERE Kategori = 'Siterpadu' AND Sub_Kategori IS NULL";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function perbaruiNavbar($idNavbar, $dataNavbar)
    {
        $sql = "UPDATE navbar SET Daftar_Nama = ?, Tautan = ?, Kategori = ?, Sub_Kategori = ? WHERE ID_Navbar = ?";

        $stmt = $this->koneksi->prepare($sql);

        $stmt->bind_param("ssssi", $dataNavbar['Daftar_Nama'], $dataNavbar['Tautan'], $dataNavbar['Kategori'], $dataNavbar['Sub_Kategori'], $idNavbar);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function hapusNavbar($id)
    {
        $queryDelete = "DELETE FROM navbar WHERE ID_Navbar=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            return true;
        } else {
            return false;
        }
    }

    public function getSubcategories($kategori)
    {
        switch ($kategori) {
            case 'Profil':
                return array('Survey');
            case 'SDM':
                return array('Pilih Sub Kategori');
            case 'Akademik':
                return array('Dokumen Akademik');
            case 'Fasilitas':
            case 'Penjaminan Mutu':
            default:
                return array('Pilih Sub Kategori');
        }
    }
}
// ===================================NAVBAR==================================

// ===================================BERITA==================================
class Berita
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilanganString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }


    public function tambahBerita($data)
    {
        $query = "INSERT INTO berita (ID_Admin, Gambar, Judul, Isi_Berita, Tanggal_Terbit) VALUES (?, ?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "issss",
            $this->menghilanganString($data['ID_Admin']),
            $this->menghilanganString($data['Gambar']),
            $this->menghilanganString($data['Judul']),
            $this->menghilanganString($data['Isi_Berita']),
            $this->menghilanganString($data['Tanggal_Terbit'])
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function tampilkanDataBerita()
    {
        $query = "SELECT * FROM berita LEFT JOIN admin ON berita.ID_Admin = admin.ID_Admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function perbaruiBerita($idBerita, $dataBerita)
    {
        $sql = "UPDATE berita SET Judul = ?, Isi_Berita = ?, Tanggal_Terbit = ?, Gambar = ? WHERE ID_Berita = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("ssssi", $dataBerita['Judul'], $dataBerita['Isi_Berita'], $dataBerita['Tanggal_Terbit'], $dataBerita['Gambar'], $idBerita);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getGambarBeritaById($idBerita)
    {
        $sql = "SELECT Gambar FROM berita WHERE ID_Berita = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("i", $idBerita);
        $stmt->execute();

        $gambar = null;
        $stmt->bind_result($gambar);
        $stmt->fetch();
        $stmt->close();

        return $gambar;
    }

    public function hapusBerita($id)
    {
        $query = "SELECT ID_Berita, Gambar FROM berita WHERE ID_Berita=?";
        $statement = $this->koneksi->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();
        $idPemilikFoto = $row['ID_Berita'];
        $namaFoto = $row['Gambar'];

        if ($idPemilikFoto != $id) {
            return false;
        }

        $queryDelete = "DELETE FROM berita WHERE ID_Berita=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            $direktoriFoto = "../../uploads/";

            if (file_exists($direktoriFoto . $namaFoto)) {
                if (unlink($direktoriFoto . $namaFoto)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}
// ===================================BERITA==================================


// ===================================CAROUSEL==================================
class Carousel
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilanganString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }

    public function tambahDataCarousel($data)
    {
        $query = "INSERT INTO carousel (ID_Admin, Judul, Deskripsi, Gambar) VALUES (?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "isss",
            $this->menghilanganString($data['ID_Admin']),
            $this->menghilanganString($data['Judul']),
            $this->menghilanganString($data['Deskripsi']),
            $this->menghilanganString($data['Gambar']),
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function tampilkanDataCarousel()
    {
        $query = "SELECT * FROM carousel LEFT JOIN admin ON carousel.ID_Admin = admin.ID_Admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function getGambarCarouselById($idCarousel)
    {
        $sql = "SELECT Gambar FROM carousel WHERE ID_Carousel = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("i", $idCarousel);
        $stmt->execute();

        $gambar = null;
        $stmt->bind_result($gambar);
        $stmt->fetch();
        $stmt->close();

        return $gambar;
    }


    public function perbaruiCarousel($idCarousel, $dataCarousel)
    {
        $sql = "UPDATE carousel SET Judul = ?, Deskripsi = ?, Gambar = ? WHERE ID_Carousel = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("sssi", $dataCarousel['Judul'], $dataCarousel['Deskripsi'], $dataCarousel['Gambar'], $idCarousel);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusCarousel($id)
    {
        $query = "SELECT ID_Carousel, Gambar FROM carousel WHERE ID_Carousel=?";
        $statement = $this->koneksi->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();
        $idPemilikFoto = $row['ID_Carousel'];
        $namaFoto = $row['Gambar'];

        if ($idPemilikFoto != $id) {
            return false;
        }

        $queryDelete = "DELETE FROM carousel WHERE ID_Carousel=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            $direktoriFoto = "../../uploads/";

            if (file_exists($direktoriFoto . $namaFoto)) {
                if (unlink($direktoriFoto . $namaFoto)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}
// ===================================CAROUSEL==================================

// ===================================PROGRAM STUDI===================================
class ProgramStudi
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilanganString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }

    public function tambahProgramStudi($data)
    {
        $query = "INSERT INTO program_studi (ID_Admin, Nama_Prodi, Gambar_Prodi, Tautan_Prodi) VALUES (?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "isss",
            $this->menghilanganString($data['ID_Admin']),
            $this->menghilanganString($data['Nama_Prodi']),
            $this->menghilanganString($data['Gambar_Prodi']),
            $this->menghilanganString($data['Tautan_Prodi'])
        );


        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function tampilkanDataProgramStudi()
    {
        $query = "SELECT * FROM program_studi LEFT JOIN admin ON program_studi.ID_Admin = admin.ID_Admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function perbaruiProgramStudi($idProdi, $dataProdi)
    {
        $sql = "UPDATE program_studi SET Nama_Prodi = ?, Gambar_Prodi = ?, Tautan_Prodi = ? WHERE ID_Prodi = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("sssi", $dataProdi['Nama_Prodi'], $dataProdi['Gambar_Prodi'], $dataProdi['Tautan_Prodi'], $idProdi);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getProgramStudiById($idProdi)
    {
        $sql = "SELECT Gambar_Prodi FROM program_studi WHERE ID_Prodi = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("i", $idProdi);
        $stmt->execute();

        $foto = null;
        $stmt->bind_result($foto);
        $stmt->fetch();
        $stmt->close();

        return $foto;
    }

    public function hapusProgramStudi($id)
    {
        $queryDelete = "DELETE FROM program_studi WHERE ID_Prodi=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            return true;
        } else {
            return false;
        }
    }
}
// ===================================PROGRAM STUDI===================================

// ===================================TESTIMONI==================================
class Testimoni
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilanganString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }

    public function tambahTestimoni($data)
    {
        $query = "INSERT INTO testimoni (ID_Admin, Foto_Mahasiswa, Nama_Mahasiswa, Kesan_Mahasiswa, Tanggal_Testimoni) VALUES (?, ?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "issss",
            $this->menghilanganString($data['ID_Admin']),
            $this->menghilanganString($data['Foto_Mahasiswa']),
            $this->menghilanganString($data['Nama_Mahasiswa']),
            $this->menghilanganString($data['Kesan_Mahasiswa']),
            $this->menghilanganString($data['Tanggal_Testimoni'])
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function tampilkanDataTestimoni()
    {
        $query = "SELECT * FROM testimoni LEFT JOIN admin ON testimoni.ID_Admin = admin.ID_Admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function getFotoMahasiswaById($idTestimoni)
    {
        $sql = "SELECT Foto_Mahasiswa FROM testimoni WHERE ID_Testimoni = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("i", $idTestimoni);
        $stmt->execute();

        $foto = null;
        $stmt->bind_result($foto);
        $stmt->fetch();
        $stmt->close();

        return $foto;
    }

    public function perbaruiTestimoni($idTestimoni, $dataTestimoni)
    {
        $sql = "UPDATE testimoni SET Nama_Mahasiswa = ?, Kesan_Mahasiswa = ?, Tanggal_Testimoni = ?, Foto_Mahasiswa = ? WHERE ID_Testimoni = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("ssssi", $dataTestimoni['Nama_Mahasiswa'], $dataTestimoni['Kesan_Mahasiswa'], $dataTestimoni['Tanggal_Testimoni'], $dataTestimoni['Foto_Mahasiswa'], $idTestimoni);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusTestimoni($id)
    {
        $query = "SELECT ID_Testimoni, Foto_Mahasiswa FROM testimoni WHERE ID_Testimoni=?";
        $statement = $this->koneksi->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();
        $idPemilikFoto = $row['ID_Testimoni'];
        $namaFoto = $row['Foto_Mahasiswa'];

        if ($idPemilikFoto != $id) {
            return false;
        }

        $queryDelete = "DELETE FROM testimoni WHERE ID_Testimoni=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            $direktoriFoto = "../../uploads/";

            if (file_exists($direktoriFoto . $namaFoto)) {
                if (unlink($direktoriFoto . $namaFoto)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}
// ===================================TESTIMONI==================================

// ===================================DOSEN==================================
class Dosen
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilanganString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }

    public function tambahDosen($data)
    {
        $query = "INSERT INTO  tenaga_dosen (NIP_NID_Dosen, Nama_Dosen, Jabatan_Dosen) VALUES (?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "iss",
            $this->menghilanganString($data['NIP_NID_Dosen']),
            $this->menghilanganString($data['Nama_Dosen']),
            $this->menghilanganString($data['Jabatan_Dosen'])
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function perbaruiDosen($idDosen, $dataDosen)
    {
        $sql = "UPDATE tenaga_dosen SET NIP_NID_Dosen = ?, Nama_Dosen = ?, Jabatan_Dosen = ? WHERE ID_Dosen = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("issi", $dataDosen['NIP_NID_Dosen'], $dataDosen['Nama_Dosen'], $dataDosen['Jabatan_Dosen'], $idDosen);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function tampilkanDataDosen()
    {
        $query = "SELECT * FROM tenaga_dosen";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function tampilkanDataDosenBeranda($offset, $limit)
    {
        $query = "SELECT * FROM tenaga_dosen LIMIT ?, ?";
        $statement = $this->koneksi->prepare($query);
        $statement->bind_param("ii", $offset, $limit);
        $statement->execute();
        $result = $statement->get_result();

        $dataDosen = [];
        while ($row = $result->fetch_assoc()) {
            $dataDosen[] = $row;
        }

        return $dataDosen;
    }

    public function hapusDosen($id)
    {
        $queryDelete = "DELETE FROM tenaga_dosen WHERE ID_Dosen=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            return true;
        } else {
            return false;
        }
    }

    public function hitungTotalDataDosen()
    {
        $query = "SELECT COUNT(*) as total FROM tenaga_dosen";
        $result = $this->koneksi->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
}
// ===================================DOSEN==================================

// ===================================STAFF==================================
class Staff
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilanganString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }

    public function tambahStaff($data)
    {
        $query = "INSERT INTO tenaga_staff (NIP_NID_Staff, Nama_Staff, Jabatan_Staff) VALUES (?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "iss",
            $this->menghilanganString($data['NIP_NID_Staff']),
            $this->menghilanganString($data['Nama_Staff']),
            $this->menghilanganString($data['Jabatan_Staff'])
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function perbaruiStaff($idStaff, $dataStaff)
    {
        $sql = "UPDATE tenaga_staff SET NIP_NID_Staff = ?, Nama_Staff = ?, Jabatan_Staff = ? WHERE ID_Staff = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("issi", $dataStaff['NIP_NID_Staff'], $dataStaff['Nama_Staff'], $dataStaff['Jabatan_Staff'], $idStaff);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function tampilkanDataStaff()
    {
        $query = "SELECT * FROM tenaga_staff";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function hapusStaff($id)
    {
        $queryDelete = "DELETE FROM tenaga_staff WHERE ID_Staff=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            return true;
        } else {
            return false;
        }
    }
}
// ===================================STAFF==================================


// ===================================AGENDA==================================
class Agenda
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilanganString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }


    public function tambahAgenda($data)
    {
        $query = "INSERT INTO agenda(ID_Admin, Gambar_Agenda, Judul_Agenda, Isi_Agenda) VALUES ( ?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "isss",
            $this->menghilanganString($data['ID_Admin']),
            $this->menghilanganString($data['Gambar_Agenda']),
            $this->menghilanganString($data['Judul_Agenda']),
            $this->menghilanganString($data['Isi_Agenda'])
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function tampilkanDataAgenda()
    {
        $query = "SELECT * FROM agenda LEFT JOIN admin ON agenda.ID_Admin = admin.ID_Admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function hapusAgenda($id)
    {
        $query = "SELECT ID_Agenda, Gambar_Agenda FROM agenda WHERE ID_Agenda=?";
        $statement = $this->koneksi->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();
        $idPemilikFoto = $row['ID_Agenda'];
        $namaFoto = $row['Gambar_Agenda'];

        if ($idPemilikFoto != $id) {
            return false;
        }

        $queryDelete = "DELETE FROM agenda WHERE ID_Agenda=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            $direktoriFoto = "../../uploads/";

            if (file_exists($direktoriFoto . $namaFoto)) {
                if (unlink($direktoriFoto . $namaFoto)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function getGambarAgendaById($idAgenda)
    {
        $sql = "SELECT Gambar_Agenda FROM agenda WHERE ID_Agenda = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("i", $idAgenda);
        $stmt->execute();

        $gambarAgenda = null;
        $stmt->bind_result($gambarAgenda);
        $stmt->fetch();
        $stmt->close();

        return $gambarAgenda;
    }

    public function perbaruiAgenda($idAgenda, $dataAgenda)
    {
        $sql = "UPDATE agenda SET Judul_Agenda = ?, Isi_Agenda = ?, Gambar_Agenda = ? WHERE ID_Agenda = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("sssi", $dataAgenda['Judul_Agenda'], $dataAgenda['Isi_Agenda'], $dataAgenda['Gambar_Agenda'], $idAgenda);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
// ===================================AGENDA==================================


// ===================================PENGUMUMAN==================================
class Pengumuman
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilanganString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }


    public function tambahPengumuman($data)
    {
        $query = "INSERT INTO pengumuman(ID_Admin, Foto_Pengumuman, Judul_Pengumuman, Isi_Pengumuman) VALUES ( ?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "isss",
            $this->menghilanganString($data['ID_Admin']),
            $this->menghilanganString($data['Foto_Pengumuman']),
            $this->menghilanganString($data['Judul_Pengumuman']),
            $this->menghilanganString($data['Isi_Pengumuman'])
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function tampilkanDataPengumuman()
    {
        $query = "SELECT * FROM pengumuman LEFT JOIN admin ON pengumuman.ID_Admin = admin.ID_Admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function hapusPengumuman($id)
    {
        $query = "SELECT ID_Pengumuman, Foto_Pengumuman FROM pengumuman WHERE ID_Pengumuman=?";
        $statement = $this->koneksi->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();
        $idPemilikFoto = $row['ID_Pengumuman'];
        $namaFoto = $row['Foto_Pengumuman'];

        if ($idPemilikFoto != $id) {
            return false;
        }

        $queryDelete = "DELETE FROM pengumuman WHERE ID_Pengumuman=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            $direktoriFoto = "../../uploads/";

            if (file_exists($direktoriFoto . $namaFoto)) {
                if (unlink($direktoriFoto . $namaFoto)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function getGambarPengumumanById($idPengumuman)
    {
        $sql = "SELECT Foto_Pengumuman FROM pengumuman WHERE ID_Pengumuman = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("i", $idPengumuman);
        $stmt->execute();

        $fotoPengumuman = null;
        $stmt->bind_result($fotoPengumuman);
        $stmt->fetch();
        $stmt->close();

        return $fotoPengumuman;
    }

    public function perbaruiPengumuman($idPengumuman, $dataPengumuman)
    {
        $sql = "UPDATE pengumuman SET Judul_Pengumuman = ?, Isi_Pengumuman = ?, Foto_Pengumuman = ? WHERE ID_Pengumuman = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("sssi", $dataPengumuman['Judul_Pengumuman'], $dataPengumuman['Isi_Pengumuman'], $dataPengumuman['Foto_Pengumuman'], $idPengumuman);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
// ===================================PENGUMUMAN==================================


// ===================================PENELITIAN TEKNIK INFORMATIKA==================================
class Informatika
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilanganString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }

    public function tampilkanDataTeknikInformatika()
    {
        $query = "SELECT * FROM penelitian_if LEFT JOIN admin ON penelitian_if.ID_Admin = admin.ID_Admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function tambahInformatika($data)
    {
        $query = "INSERT INTO penelitian_if(ID_Admin, Judul_Penelitian, Link_Penelitian, Tingkatan,  Judul_Jurnal, Link_Jurnal, Pencipta, Tahun) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "isssssss",
            $this->menghilanganString($data['ID_Admin']),
            $this->menghilanganString($data['Judul_Penelitian']),
            $this->menghilanganString($data['Link_Penelitian']),
            $this->menghilanganString($data['Tingkatan']),
            $this->menghilanganString($data['Judul_Jurnal']),
            $this->menghilanganString($data['Link_Jurnal']),
            $this->menghilanganString($data['Pencipta']),
            $this->menghilanganString($data['Tahun'])
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusInformatika($id)
    {
        $queryDelete = "DELETE FROM penelitian_if WHERE ID_Penelitian_If=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            return true;
        } else {
            return false;
        }
    }

    public function perbaruiInformatika($idIF, $dataInformatika)
    {
        $sql = "UPDATE penelitian_if SET Judul_Penelitian = ?, Link_Penelitian = ?, Tingkatan = ?, Judul_Jurnal = ?, Link_Jurnal = ?, Pencipta = ?, Tahun = ? WHERE ID_penelitian_if = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("sssssssi", $dataInformatika['Judul_Penelitian'], $dataInformatika['Link_Penelitian'], $dataInformatika['Tingkatan'], $dataInformatika['Judul_Jurnal'], $dataInformatika['Link_Jurnal'], $dataInformatika['Pencipta'], $dataInformatika['Tahun'], $idIF);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
// ===================================PENELITIAN TEKNIK INFORMATIKA==================================

// ===================================PENELITIAN MAGISTER KIMIA==================================
class magisterKimia
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilangkanString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }

    public function tambahMagisterKimia($data)
    {
        $query = "INSERT INTO penelitian_magister_kimia(ID_Admin, Judul_Penelitian, Tautan_Penelitian, Tingkatan, Judul_Journal, Tautan_Journal, Pencipta, Tahun) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "isssssss",
            $this->menghilangkanString($data['ID_Admin']),
            $this->menghilangkanString($data['Judul_Penelitian']),
            $this->menghilangkanString($data['Tautan_Penelitian']),
            $this->menghilangkanString($data['Tingkatan']),
            $this->menghilangkanString($data['Judul_Journal']),
            $this->menghilangkanString($data['Tautan_Journal']),
            $this->menghilangkanString($data['Pencipta']),
            $this->menghilangkanString($data['Tahun'])
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusMagisterKimia($id)
    {
        $queryDelete = "DELETE FROM penelitian_magister_kimia WHERE ID_Penelitian_Magister_Kimia=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            return true;
        } else {
            return false;
        }
    }

    public function perbaruiMagisterKimia($idKimia, $dataKimia)
    {
        $sql = "UPDATE penelitian_magister_kimia SET Judul_Penelitian = ?, Tautan_Penelitian = ?, Tingkatan = ?, Judul_Journal = ?, Tautan_Journal = ?, Pencipta = ?, Tahun = ? WHERE ID_Penelitian_Magister_Kimia = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("sssssssi", $dataKimia['Judul_Penelitian'], $dataKimia['Tautan_Penelitian'], $dataKimia['Tingkatan'], $dataKimia['Judul_Journal'], $dataKimia['Tautan_Journal'], $dataKimia['Pencipta'], $dataKimia['Tahun'], $idKimia);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function tampilkanDataMagisterKimia()
    {
        $query = "SELECT * FROM penelitian_magister_kimia LEFT JOIN admin ON penelitian_magister_kimia.ID_Admin = admin.ID_Admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }
}
// ===================================PENELITIAN MAGISTER KIMIA==================================

// ===================================PENELITIAN KIMIA==================================
class Kimia
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilanganString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }

    public function tambahKimia($data)
    {
        $query = "INSERT INTO penelitian_kimia(ID_Admin, Judul_Penelitian, Tautan_Penelitian, Tingkatan, Judul_Jurnal, Tautan_Jurnal, Pencipta, Tahun) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "isssssss",
            $this->menghilanganString($data['ID_Admin']),
            $this->menghilanganString($data['Judul_Penelitian']),
            $this->menghilanganString($data['Tautan_Penelitian']),
            $this->menghilanganString($data['Tingkatan']),
            $this->menghilanganString($data['Judul_Jurnal']),
            $this->menghilanganString($data['Tautan_Jurnal']),
            $this->menghilanganString($data['Pencipta']),
            $this->menghilanganString($data['Tahun'])
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function tampilkanDataKimia()
    {
        $query = "SELECT * FROM penelitian_kimia LEFT JOIN admin ON penelitian_kimia.ID_Admin = admin.ID_Admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function hapusKimia($id)
    {
        $queryDelete = "DELETE FROM penelitian_kimia WHERE ID_Penelitian_Kimia=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            return true;
        } else {
            return false;
        }
    }

    public function perbaruiKimia($idKimia, $dataKimia)
    {
        $sql = "UPDATE penelitian_kimia SET Judul_Penelitian = ?, Tautan_Penelitian = ?, Tingkatan = ?, Judul_Jurnal = ?, Tautan_Jurnal = ?, Pencipta = ?, Tahun = ? WHERE ID_Penelitian_Kimia = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("sssssssi", $dataKimia['Judul_Penelitian'], $dataKimia['Tautan_Penelitian'], $dataKimia['Tingkatan'], $dataKimia['Judul_Jurnal'], $dataKimia['Tautan_Jurnal'], $dataKimia['Pencipta'], $dataKimia['Tahun'], $idKimia);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
// ===================================PENELITIAN KIMIA==================================


// ===================================PENELITIAN SISTEM INFORMASI==================================
class SistemInformasi
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilanganString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }

    public function tambahSistemInformasi($data)
    {
        $query = "INSERT INTO penelitian_sistem_informasi(ID_Admin, Judul_Penelitian, Tautan_Penelitian, Tingkatan, Judul_Jurnal, Tautan_Jurnal, Pencipta, Tahun) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "isssssss",
            $this->menghilanganString($data['ID_Admin']),
            $this->menghilanganString($data['Judul_Penelitian']),
            $this->menghilanganString($data['Tautan_Penelitian']),
            $this->menghilanganString($data['Tingkatan']),
            $this->menghilanganString($data['Judul_Jurnal']),
            $this->menghilanganString($data['Tautan_Jurnal']),
            $this->menghilanganString($data['Pencipta']),
            $this->menghilanganString($data['Tahun'])
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function tampilkanDataSistemInformasi()
    {
        $query = "SELECT * FROM penelitian_sistem_informasi LEFT JOIN admin ON penelitian_sistem_informasi.ID_Admin = admin.ID_Admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function hapusSistemInformasi($id)
    {
        $queryDelete = "DELETE FROM penelitian_sistem_informasi WHERE ID_Sistem_Informasi=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            return true;
        } else {
            return false;
        }
    }

    public function perbaruiSistemInformasi($idSistemInformasi, $dataSistemInformasi)
    {
        $sql = "UPDATE penelitian_sistem_informasi SET Judul_Penelitian = ?, Tautan_Penelitian = ?, Tingkatan = ?, Judul_Jurnal = ?, Tautan_Jurnal = ?, Pencipta = ?, Tahun = ? WHERE ID_Sistem_Informasi = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("sssssssi", $dataSistemInformasi['Judul_Penelitian'], $dataSistemInformasi['Tautan_Penelitian'], $dataSistemInformasi['Tingkatan'], $dataSistemInformasi['Judul_Jurnal'], $dataSistemInformasi['Tautan_Jurnal'], $dataSistemInformasi['Pencipta'], $dataSistemInformasi['Tahun'], $idSistemInformasi);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
// ===================================PENELITIAN SISTEM INFORMASI==================================


// ===================================PRESTASI MAHASISWA==================================
class prestasiMahasiswa
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilanganString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }

    public function getGambarPrestasiById($idBerita)
    {
        $sql = "SELECT Gambar FROM prestasi WHERE ID_Prestasi = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("i", $idBerita);
        $stmt->execute();

        $gambar = null;
        $stmt->bind_result($gambar);
        $stmt->fetch();
        $stmt->close();

        return $gambar;
    }

    public function tambahPrestasiMahasiswa($data)
    {
        $query = "INSERT INTO prestasi(ID_Admin, Gambar, Nama_Mahasiswa, Kegiatan, Pencapaian, Tahun_Pencapaian) VALUES ( ?, ?, ?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "isssss",
            $this->menghilanganString($data['ID_Admin']),
            $this->menghilanganString($data['Gambar']),
            $this->menghilanganString($data['Nama_Mahasiswa']),
            $this->menghilanganString($data['Kegiatan']),
            $this->menghilanganString($data['Pencapaian']),
            $this->menghilanganString($data['Tahun_Pencapaian'])
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function tampilkanDataPrestasiMahasiswa()
    {
        $query = "SELECT * FROM prestasi LEFT JOIN admin ON prestasi.ID_Admin = admin.ID_Admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function hapusPrestasiMahasiswa($id)
    {
        $query = "SELECT ID_Prestasi, Gambar FROM prestasi WHERE ID_Prestasi=?";
        $statement = $this->koneksi->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();
        $idPemilikFoto = $row['ID_Prestasi'];
        $namaFoto = $row['Gambar'];

        if ($idPemilikFoto != $id) {
            return false;
        }

        $queryDelete = "DELETE FROM prestasi WHERE ID_Prestasi=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            $direktoriFoto = "../../uploads/";

            if (file_exists($direktoriFoto . $namaFoto)) {
                if (unlink($direktoriFoto . $namaFoto)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function perbaruiPrestasiMahasiswa($idPrestasiMahasiswa, $dataPrestasiMahasiswa)
    {
        $sql = "UPDATE prestasi SET Gambar = ?, Nama_Mahasiswa = ?, Kegiatan = ?, Pencapaian = ?, Tahun_Pencapaian = ? WHERE ID_Prestasi = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("sssssi", $dataPrestasiMahasiswa['Gambar'], $dataPrestasiMahasiswa['Nama_Mahasiswa'], $dataPrestasiMahasiswa['Kegiatan'], $dataPrestasiMahasiswa['Pencapaian'], $dataPrestasiMahasiswa['Tahun_Pencapaian'], $idPrestasiMahasiswa);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
// ===================================PRESTASI MAHASISWA==================================




// ===================================PRODUK INOVATIF=====================================
class ProdukInovatif
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilangkanString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }

    public function tambahProdukInovatif($data)
    {
        $query = "INSERT INTO produk_inovatif(ID_Admin, Judul_Inovasi, Tautan_Inovasi, Leader, Event, Personil, Tahun) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "issssss",
            $data['ID_Admin'],
            $this->menghilangkanString($data['Judul_Inovasi']),
            $this->menghilangkanString($data['Tautan_Inovasi']),
            $this->menghilangkanString($data['Leader']),
            $this->menghilangkanString($data['Event']),
            $this->menghilangkanString($data['Personil']),
            $data['Tahun']
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function tampilkanDataProdukInovatif()
    {
        $query = "SELECT * FROM produk_inovatif LEFT JOIN admin ON produk_inovatif.ID_Admin = admin.ID_Admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function hapusProdukInovatif($id)
    {
        $queryDelete = "DELETE FROM produk_inovatif WHERE ID_Produk=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            return true;
        } else {
            return false;
        }
    }

    public function perbaruiProdukInovatif($idProduk, $dataProduk)
    {
        $sql = "UPDATE produk_inovatif SET Judul_Inovasi = ?, Tautan_Inovasi = ?, Leader = ?, Event = ?, Personil = ?, Tahun = ? WHERE ID_Produk = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("ssssssi", $dataProduk['Judul_Inovasi'], $dataProduk['Tautan_Inovasi'], $dataProduk['Leader'], $dataProduk['Event'], $dataProduk['Personil'], $dataProduk['Tahun'], $idProduk);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
// ===================================PRODUK INOVATIF====================================


// ===================================BEASISWA MAHASISWA====================================
class beasiswaMahasiswa
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilanganString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }

    public function getGambarBeasiswaById($idBerita)
    {
        $sql = "SELECT Gambar FROM beasiswa WHERE ID_Beasiswa = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("i", $idBerita);
        $stmt->execute();

        $gambar = null;
        $stmt->bind_result($gambar);
        $stmt->fetch();
        $stmt->close();

        return $gambar;
    }

    public function tambahBeasiswaMahasiswa($data)
    {
        $query = "INSERT INTO beasiswa(ID_Admin, Gambar, Nama_Penerima, Nama_Beasiswa, Durasi_Beasiswa, Link_Instagram, Link_Website) VALUES ( ?, ?, ?, ?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "issssss",
            $this->menghilanganString($data['ID_Admin']),
            $this->menghilanganString($data['Gambar']),
            $this->menghilanganString($data['Nama_Penerima']),
            $this->menghilanganString($data['Nama_Beasiswa']),
            $this->menghilanganString($data['Durasi_Beasiswa']),
            $this->menghilanganString($data['Link_Instagram']),
            $this->menghilanganString($data['Link_Website'])
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function tampilkanDataBeasiswaMahasiswa()
    {
        $query = "SELECT * FROM beasiswa LEFT JOIN admin ON beasiswa.ID_Admin = admin.ID_Admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function hapusBeasiswaMahasiswa($id)
    {
        $query = "SELECT ID_Beasiswa, Gambar FROM beasiswa WHERE ID_Beasiswa=?";
        $statement = $this->koneksi->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();
        $idPemilikFoto = $row['ID_Beasiswa'];
        $namaFoto = $row['Gambar'];

        if ($idPemilikFoto != $id) {
            return false;
        }

        $queryDelete = "DELETE FROM beasiswa WHERE ID_Beasiswa=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            $direktoriFoto = "../../uploads/";

            if (file_exists($direktoriFoto . $namaFoto)) {
                if (unlink($direktoriFoto . $namaFoto)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function perbaruiBeasiswaMahasiswa($idBeasiswaMahasiswa, $dataBeasiswaMahasiswa)
    {
        $sql = "UPDATE beasiswa SET Gambar = ?, Nama_Penerima = ?, Nama_Beasiswa = ?, Durasi_Beasiswa = ?, Link_Instagram = ?, Link_Website = ? WHERE ID_Beasiswa = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("ssssssi", $dataBeasiswaMahasiswa['Gambar'], $dataBeasiswaMahasiswa['Nama_Penerima'], $dataBeasiswaMahasiswa['Nama_Beasiswa'], $dataBeasiswaMahasiswa['Durasi_Beasiswa'], $dataBeasiswaMahasiswa['Link_Instagram'], $dataBeasiswaMahasiswa['Link_Website'], $idBeasiswaMahasiswa);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
// ===================================BEASISWA MAHASISWA====================================

// ===================================PENGABDIAN MASYARAKAT====================================
class PengabdianMasyarakat
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilangkanString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }

    public function tambahPengabdianMasyarakat($data)
    {
        $query = "INSERT INTO pengabdian_masyarakat(ID_Admin, Judul_Pengabdian, Tautan_Pengabdian, Leader, Event, Personil, Tahun) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "issssss",
            $data['ID_Admin'],
            $this->menghilangkanString($data['Judul_Pengabdian']),
            $this->menghilangkanString($data['Tautan_Pengabdian']),
            $this->menghilangkanString($data['Leader']),
            $this->menghilangkanString($data['Event']),
            $this->menghilangkanString($data['Personil']),
            $data['Tahun']
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function tampilkanDataPengabdianMasyarakat()
    {
        $query = "SELECT * FROM pengabdian_masyarakat LEFT JOIN admin ON pengabdian_masyarakat.ID_Admin = admin.ID_Admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function hapusPengabdianMasyarakat($id)
    {
        $queryDelete = "DELETE FROM pengabdian_masyarakat WHERE ID_Pengabdian=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            return true;
        } else {
            return false;
        }
    }

    public function perbaruiPengabdianMasyarakat($idPengabdian, $dataPengabdian)
    {
        $sql = "UPDATE pengabdian_masyarakat SET Judul_Pengabdian = ?, Tautan_Pengabdian = ?, Leader = ?, Event = ?, Personil = ?, Tahun = ? WHERE ID_Pengabdian = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("ssssssi", $dataPengabdian['Judul_Pengabdian'], $dataPengabdian['Tautan_Pengabdian'], $dataPengabdian['Leader'], $dataPengabdian['Event'], $dataPengabdian['Personil'], $dataPengabdian['Tahun'], $idPengabdian);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
// ===================================PENGABDIAN MASYARAKAT====================================


// ===================================STRUKTUR ORGANISASI====================================
class StrukturOrganisasi
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    private function menghilangkanString($string)
    {
        return htmlspecialchars(mysqli_real_escape_string($this->koneksi, $string));
    }

    public function tambahStrukturOrganisasi($data)
    {
        $query = "INSERT INTO struktur_organisasi(ID_Admin, Foto_Dosen_Organisasi, Nama_Dosen_Organisasi, Jabatan_Dosen_Organisasi, Kasubag_Organisasi) VALUES (?, ?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "issss",
            $data['ID_Admin'],
            $this->menghilangkanString($data['Foto_Dosen_Organisasi']),
            $this->menghilangkanString($data['Nama_Dosen_Organisasi']),
            $this->menghilangkanString($data['Jabatan_Dosen_Organisasi']),
            $this->menghilangkanString($data['Kasubag_Organisasi'])
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function tampilkanDataStrukturOrganisasi()
    {
        $query = "SELECT * FROM struktur_organisasi LEFT JOIN admin ON struktur_organisasi.ID_Admin = admin.ID_Admin";
        $result = $this->koneksi->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($baris = $result->fetch_assoc()) {
                $data[] = $baris;
            }
            return $data;
        } else {
            return null;
        }
    }

    public function buatTree($data)
    {
        $tree = [];
        $map = [];

        foreach ($data as $item) {
            $map[$item['ID_Organisasi']] = $item;
            $map[$item['ID_Organisasi']]['children'] = [];
        }

        foreach ($data as $item) {
            if ($item['ID_Admin'] == 0) {
                $tree[] = &$map[$item['ID_Organisasi']];
            } else {
                $map[$item['ID_Admin']]['children'][] = &$map[$item['ID_Organisasi']];
            }
        }

        return $tree;
    }

    public function hapusStrukturOrganisasi($id)
    {
        $query = "SELECT ID_Organisasi, Foto_Dosen_Organisasi FROM struktur_organisasi WHERE ID_Organisasi=?";
        $statement = $this->koneksi->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();
        $idPemilikFoto = $row['ID_Organisasi'];
        $namaFoto = $row['Foto_Dosen_Organisasi'];

        if ($idPemilikFoto != $id) {
            return false;
        }

        $queryDelete = "DELETE FROM struktur_organisasi WHERE ID_Organisasi=?";
        $statementDelete = $this->koneksi->prepare($queryDelete);
        $statementDelete->bind_param("i", $id);
        $isDeleted = $statementDelete->execute();

        if ($isDeleted) {
            $direktoriFoto = "../../uploads/";

            if (file_exists($direktoriFoto . $namaFoto)) {
                if (unlink($direktoriFoto . $namaFoto)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function getGambarStrukturOrganisasiById($idStrukturOrganisasi)
    {
        $sql = "SELECT Foto_Dosen_Organisasi FROM struktur_organisasi WHERE ID_Organisasi = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("i", $idStrukturOrganisasi);
        $stmt->execute();

        $foto = null;
        $stmt->bind_result($foto);
        $stmt->fetch();
        $stmt->close();

        return $foto;
    }

    public function perbaruiStrukturOrganisasi($idStrukturOrganisasi, $dataStrukturOrganisasi)
    {
        $sql = "UPDATE struktur_organisasi SET Foto_Dosen_Organisasi = ?, Nama_Dosen_Organisasi = ?, Jabatan_Dosen_Organisasi = ?, Kasubag_Organisasi = ? WHERE ID_Organisasi = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("ssssi", $dataStrukturOrganisasi['Foto_Dosen_Organisasi'], $dataStrukturOrganisasi['Nama_Dosen_Organisasi'], $dataStrukturOrganisasi['Jabatan_Dosen_Organisasi'], $dataStrukturOrganisasi['Kasubag_Organisasi'], $idStrukturOrganisasi);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
// ===================================STRUKTUR ORGANISASI====================================

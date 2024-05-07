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
        mysqli_stmt_bind_param($stmt, "si", $token, $adminId);
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
            $direktoriFoto = "../uploads/";

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
        $query = "INSERT INTO navbar (ID_Admin, Daftar_Nama, Tautan) VALUES (?, ?, ?)";
        $statement = $this->koneksi->prepare($query);
        $daftarNama = mysqli_real_escape_string($this->koneksi, $data['Daftar_Nama']);
        $tautan = mysqli_real_escape_string($this->koneksi, $data['Tautan']);
        $idAdmin = intval($data['ID_Admin']);
        $statement->bind_param("iss", $idAdmin, $daftarNama, $tautan);
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

    public function perbaruiNavbar($idNavbar, $dataNavbar)
    {
        $sql = "UPDATE navbar SET Daftar_Nama = ?, Tautan = ? WHERE ID_Navbar = ?";

        $stmt = $this->koneksi->prepare($sql);

        $stmt->bind_param("ssi", $dataNavbar['Daftar_Nama'], $dataNavbar['Tautan'], $idNavbar);

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
            $direktoriFoto = "../uploads/";

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
            $direktoriFoto = "../uploads/";

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
        $query = "INSERT INTO program_studi (ID_Admin, Nama_Prodi) VALUES (?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "is",
            $this->menghilanganString($data['ID_Admin']),
            $this->menghilanganString($data['Nama_Prodi'])
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
        $sql = "UPDATE program_studi SET Nama_Prodi = ? WHERE ID_Prodi = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("si", $dataProdi['Nama_Prodi'], $idProdi);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
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
            $direktoriFoto = "../uploads/";

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

// ===================================PENDIDIKAN DOSEN FSI==================================
class PendidikanFsi
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

    public function tambahPendidikanDosenFsi($data)
    {
        $query = "INSERT INTO  pendidikan_dosen_fsi (ID_Admin, NIP_NID, Nama_Dosen, Jabatan_Dosen) VALUES (?, ?, ?, ?)";

        $statement = $this->koneksi->prepare($query);
        $statement->bind_param(
            "isss",
            $this->menghilanganString($data['ID_Admin']),
            $this->menghilanganString($data['NIP_NID']),
            $this->menghilanganString($data['Nama_Dosen']),
            $this->menghilanganString($data['Jabatan_Dosen'])
        );

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
// ===================================PENDIDIKAN DOSEN FSI==================================

// ===================================TENAGA PENDIDIKAN FSI==================================
class DosenFsi
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
}
// ===================================TENAGA PENDIDIKAN FSI==================================
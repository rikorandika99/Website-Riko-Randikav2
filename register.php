<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "website_riko_randika";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $agama = $_POST['agama'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $nomor_hp = $_POST['nomor_hp'];
    $nomor_whatsapp = $_POST['nomor_whatsapp'];
    $kota_domisili = $_POST['kota_domisili'];
    $pekerjaan = $_POST['pekerjaan'] == "Other" ? $_POST['pekerjaan_lain'] : $_POST['pekerjaan'];
    $instansi = $_POST['instansi'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email already exists
        echo "<script>alert('Maaf, email sudah digunakan.'); window.location.href='daftar.html';</script>";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO users (nama, alamat, tempat_lahir, tanggal_lahir, agama, provinsi, kota, jenis_kelamin, email, nomor_hp, nomor_whatsapp, kota_domisili, pekerjaan, instansi, password)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssssss", $nama, $alamat, $tempat_lahir, $tanggal_lahir, $agama, $provinsi, $kota, $jenis_kelamin, $email, $nomor_hp, $nomor_whatsapp, $kota_domisili, $pekerjaan, $instansi, $password);

        if ($stmt->execute()) {
            echo "<script>alert('Pendaftaran berhasil!'); window.location.href='login.html';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>

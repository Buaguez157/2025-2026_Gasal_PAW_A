<!DOCTYPE html>
<html>
<head>
    <title>Biodata dengan Form (POST)</title>
</head>
<body>
    <h2>Form Input Biodata</h2>
    <form method="post" action="">
        Nama: <input type="text" name="nama"><br><br>
        NIM: <input type="text" name="nim"><br><br>
        Program Studi: <input type="text" name="prodi"><br><br>
        Hobi: <input type="text" name="hobi"><br><br>
        <input type="submit" value="Kirim">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama  = $_POST['nama'];
        $nim   = $_POST['nim'];
        $prodi = $_POST['prodi'];
        $hobi  = $_POST['hobi'];

        echo "<h2>Biodata Anda</h2>";
        echo "<table border='1' cellpadding='8' cellspacing='0'>
                <tr><td>Nama</td><td>$nama</td></tr>
                <tr><td>NIM</td><td>$nim</td></tr>
                <tr><td>Program Studi</td><td>$prodi</td></tr>
                <tr><td>Hobi</td><td>$hobi</td></tr>
              </table>";
    }
    ?>
</body>
</html>

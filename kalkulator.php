<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3e8ff; /* Latar belakang ungu muda */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Gaya untuk kontainer kalkulator */
        .calculator {
            background-color: #ffffff; /* Latar belakang putih untuk kalkulator */
            border-radius: 15px; /* Sudut membulat */
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1); /* memberikan shadow*/
            padding: 30px;
            text-align: center;
            width: 300px; 
        }

        .calculator h1 {
            color: #6a0dad; 
        }

        /* Gaya untuk input angka */
        .calculator input[type="number"] {
            width: calc(100% - 24px); /* Lebar penuh dengan sedikit padding */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #d1c4e9; /* Border warna ungu muda */
            border-radius: 8px; /* Sudut membulat untuk input */
            font-size: 16px; /* Ukuran font */
        }

        /* Gaya untuk dropdown operator */
        .calculator select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #d1c4e9;
            border-radius: 8px;
            font-size: 16px;
            width: 100%;
            background-color: #f3e8ff; /* Latar belakang dropdown */
            color: #6a0dad; /* Warna teks dropdown */
        }

        /* Gaya untuk tombol submit */
        .calculator button {
            background-color: #6a0dad; /* Warna ungu untuk tombol */
            color: white; /* Warna teks putih */
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer; /* Pointer saat hover */
            width: 100%;
        }

        /* Efek hover pada tombol */
        .calculator button:hover {
            background-color: #4b0082; /* Warna ungu lebih gelap saat hover */
        }

        /* Gaya untuk hasil perhitungan */
        .calculator h2 {
            color: #4b0082; /* Warna hasil */
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="calculator">
    <h1>Kalkulator PHP</h1>
    <!-- Form untuk input angka dan operator -->
    <form method="post">
        <input type="number" name="num1" placeholder="Masukkan angka pertama" required> <!-- Input angka pertama -->
        <select name="operator">
            <!-- Pilihan operator matematika -->
            <option value="tambah">+ (Tambah)</option>
            <option value="kurang">- (Kurang)</option>
            <option value="kali">* (Kali)</option>
            <option value="bagi">/ (Bagi)</option>
            <option value="modulus">% (Modulus)</option>
            <option value="pangkat">^ (Pangkat)</option>
        </select>
        <input type="number" name="num2" placeholder="Masukkan angka kedua" required> <!-- Input angka kedua -->
        <br><br>
        <button type="submit" name="submit" value="submit">Hitung</button> <!-- Tombol shitung -->
    </form>

    <?php
    // Jika tombol submit ditekan
    if (isset($_POST['submit'])) {
        // Mengambil nilai input dari form
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];

        // Switch case untuk menentukan operator mana yang dipilih
        if (is_numeric($num1)&&is_numeric($num2)) {
        switch ($operator) {
            case "tambah":
                $hasil = $num1 + $num2; // Penjumlahan
                break;
            case "kurang":
                $hasil = $num1 - $num2; // Pengurangan
                break;
            case "kali":
                $hasil = $num1 * $num2; // Perkalian
                break;
            case "bagi":
                if ($num2 != 0) {
                    $hasil = $num1 / $num2; // Pembagian, cek agar tidak membagi dengan nol
                } else {
                    $hasil = "Tidak bisa membagi dengan nol"; // Error jika pembagi nol
                }
                break;
            case "modulus":
                if ($num2 != 0) {
                    $hasil = $num1 % $num2; // Modulus, cek agar tidak modulus dengan nol
                } else {
                    $hasil = "Tidak bisa menggunakan modulus dengan nol"; // Error jika modulus nol
                }
                break;
            case "pangkat":
                $hasil = $num1 ** $num2; // Pangkat
                break;
            default:
                $hasil = "Operator tidak valid"; // Error jika operator tidak dikenali
        }
        // Menampilkan hasil
        echo "<h2>Hasil: $hasil</h2>";
        } else {
            //jika input bukan angka akan menampilkan pesan error
            echo "Silahkan masukkan dengan angka.";
        }
    }
    ?>
</div>
</body>
</html>

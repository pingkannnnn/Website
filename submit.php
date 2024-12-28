<?php
// memeriksa apakah telah disubmit
if (isset($_POST['username'])) {
    // mengambil data formulir
    $uname = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $nmlengkap = htmlspecialchars($_POST['nama_lengkap']);
    $password = htmlspecialchars($_POST['password']);

    // Memproses array barang dan jumlah
    $barang = isset($_POST['barang']) ? $_POST['barang'] : []; // Array produk yang dipilih
    $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : []; // Array jumlah produk


    $jeksonbarang = json_encode($barang);
    // Menghubungkan ke file koneksi.php
    include 'koneksi.php';

    $id = htmlspecialchars($_POST['id']);
    if(!empty($id)){
        // Query untuk memperbarui data
        $sql = "UPDATE transaksi SET nama = '$usename', email = '$email', nama_lengkap ='$nama_lengkap', passord = '$password', data_barang = '$json_barang' WHERE id = '$id'";
    }else{
        // Query untuk menyimpan data
    $sql = "INSERT INTO transaksi (nama,email,nama_lengkap,password,data_barang) VALUES ('$username','$email','$nama_lengkap','$password','$json_nbarang')";
    }

    // Menjalankan query 
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil disimpan!";
    } else {
        echo "error: " . $sql . "<br>" . mysqli_eror($conn);
    }

    // Menutup koneksi
    mysqli_Close($conn);

    // Tampilkan data dalam format invoice yang lebih menarik
    $tampil = "
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-colour: #f4f4f4;
            margin:0;
            padding:0;
        }
        .invoice {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            font-size: 26px;
            color: #007BFF;
            margin: 10px 0;
        }
        .header .logo {
            font-size: 24px;
            font-weight: bold;
            color: #007BFF;
        }
        .separator {
            border-bottom: 2px solid #007BFF;
            margin: 20px 0;
        }
        .content {
            font-size: 14px;
            line-height: 1.6;
        }
        .content .item {
            margin-bottom: 10px;
            font-weight: normal;
            color: #333;
        }
        .content .item strong {
            color: #007BFF;
        }
        .products {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
        .products p {
            margin: 5px 0;
            color: #333;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-style: italic;
            color: #888;
        }
        .footer a {
            color: #007BFF;
            text-decoration: none;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
        }
    </style>
    <div class='invoice'>
        <div class='header'>
            <div class='logo'>KASIR SEDERHANA</div>
            <h2>INVOICE</h2>
            <div class='separator'></div>
                <img src='https://media-cdn.tripadvisor.com/media/photo-s/11/7f/23/ec/jokla-icelandic-design.jpg' />
            </a>
        </div>
        
        <div class='content'>
            <div class='item'><strong>NIM:</strong> 23050031</div>
            <div class='item'><strong>Nama Anda:</strong> Herliana Pingkan</div>
            <div class='item'><strong>Username:</strong> $uname</div>
            <div class='item'><strong>Nama Lengkap:</strong> $nmlengkap</div>
            <div class='item'><strong>Email:</strong> $email</div>
            <div class='item'><strong>Password:</strong> $password</div>
        </div>

        <div class='products'>
            <h3>Produk yang dipilih:</h3>";
            
            if (!empty($barang)) {
                foreach ($barang as $key => $product) {
                    $produk_quantity = $jumlah[$key];
                    $tampil .= "<p><strong>$product</strong> - Jumlah: $produk_quantity</p>";
                }
            } else {
                $tampil .= "<p>Belum ada produk yang dipilih</p>";
            }
            
            $tampil .= "
        </div>

        <div class='footer'>
            <p>Terima kasih telah berbelanja di Kasir Sederhana!</p>
        </div>
    </div>";

} else {
    $tampil = "Data belum disubmit.";
}

echo $tampil;
?>
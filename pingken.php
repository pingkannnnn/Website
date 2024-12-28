<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background: radial-gradient(circle, #ff9a9e, #fad0c4);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    color: #333;
}

form {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    width: 100%;
    max-width: 400px;
    box-sizing: border-box;
    transform: translateY(0);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

form:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
}

h2 {
    text-align: center;
    color: #444;
    margin-bottom: 20px;
    font-size: 22px;
    font-weight: 600;
}

table {
    width: 100%;
    border-spacing: 0 10px;
}

td {
    padding: 10px;
    vertical-align: middle;
}

label {
    font-size: 14px;
    color: #555;
    font-weight: bold;
    margin-bottom: 5px;
    display: inline-block;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="number"] {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ccc;
    border-radius: 12px;
    margin-bottom: 15px;
    font-size: 14px;
    background: #f7f8fa;
    box-sizing: border-box;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
input[type="number"]:focus {
    border-color: #ff6f91;
    box-shadow: 0 0 8px rgba(255, 111, 145, 0.5);
    outline: none;
    background: #fff;
}

input[type="checkbox"] {
    margin-right: 10px;
}

.barang {
    margin-bottom: 20px;
}

.barang div {
    margin-bottom: 10px;
}

.barang label {
    font-size: 15px;
    font-weight: bold;
    color: #666;
}

input[type="submit"] {
    background: linear-gradient(135deg, #ff6f91, #ffc3a0);
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 25px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    width: 100%;
    transition: background 0.3s ease, transform 0.2s ease;
}

input[type="submit"]:hover {
    background: linear-gradient(135deg, #ffc3a0, #ff6f91);
    transform: scale(1.05);
}

.footer {
    text-align: center;
    margin-top: 15px;
    color: #555;
    font-size: 14px;
    font-weight: 300;
}


    </style>
</head>
<body>

    <form action="submit.php" method="post" onsubmit="return validateform()">  
        <h2>Pendaftaran</h2>

        <input type="hidden" name="id" value="<?php if(!empty($data['id'])){ echo $data['id'];} ?>">
        <table>
            <tr>
                <td><label for="username">Username</label></td>
                <td>:</td>
                <td><input type="text" id="username" name="username" required value="<?php if (!empty($data['username'])){ echo $dataa['username'];}?>"></td>
            </tr>
            <tr>
                <td><label for="nama_lengkap">Nama Lengkap</label></td>
                <td>:</td>
                <td><input type="text" id="nama_lengkap" name="nama_lengkap" required value="<?php if (!empty($data['nama_lengkap'])){ echo $dataa['nama_lengkap'];}?>"></td>></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td>:</td>
                <td><input type="email" id="email" name="email" required value="<?php if (!empty($data['email'])){ echo $dataa['email'];}?>"></td>></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td>:</td>
                <td><input type="password" id="password" name="password" required value="<?php if (!empty($data['password'])){ echo $dataa['password'];}?>"></td>></td>
            </tr>

            <?php
            //Decode data barang terpilih
            $data_barang_terpilih = (!empty($data['data_barang'])) ? json_decode($data['data_barang'], true) : array();
            ?>
            <tr>
                <td><label>Barang</label></td>
                <td>:</td>
                <td class="barang">
                    <div>
                        <input type="checkbox" name="barang[]" value="Sepatu - Rp.100.000" id="Sepatu" <?php echo in_array("Sepatu - Rp.100.000", $data_barang_terpilih) ? 'checked' :''; ?>>
                        <label for="Sepatu">Sepatu - Rp.100.000</label>
                        <input type="number" name="jumlah[]" placeholder="Jumlah" min="1" style="width: 80px;">
                    </div>
                    <div>
                        <input type="checkbox" name="barang[]" value="Sendal - Rp.50.000" id="Sendal" <?php echo in_array("Sendal - Rp.50.000", $data_barang_terpilih) ? 'checked' :''; ?>>
                        <label for="Sendal">Sendal - Rp.50.000</label>
                        <input type="number" name="jumlah[]" placeholder="Jumlah" min="1" style="width: 80px;">
                    </div>
                    <div>
                        <input type="checkbox" name="barang[]" value="Tas - Rp.80.000" id="Tas" <?php echo in_array("Tas - Rp.80.000", $data_barang_terpilih) ? 'checked' :''; ?>>
                        <label for="Tas">Tas - Rp.80.000</label>
                        <input type="number" name="jumlah[]" placeholder="Jumlah" min="1" style="width: 80px;">
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <input type="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>

    <script>
        function validateform() {
            var password = document.getElementById("password").value;
            if (password.length < 6) {
                alert("Password harus memiliki minimal 6 karakter");
                return false;
            }
            return true;
        }
    </script>

</body>
</html>
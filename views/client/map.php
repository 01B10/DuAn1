<!DOCTYPE html>
<html>

<head>
    <title>Pesan Go-Back</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_."/views/client/assets/css/style.css"?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
</head>

<body>
    <div id="pesan">
        <div class="inner">
            <h1 id="title">Pesan Go-Back</h1>
            <form>
                <div class="form-group">
                    <label>Masukkan Lokasi Anda</label>
                    <input type="text" class="form-control" id="start" placeholder="Jl. Mayjend Ahmad Yani" required>
                </div>

                <div class="form-group">
                    <label>Masukkan Lokasi Tujuan</label>
                    <input type="text" class="form-control" id="end" placeholder="Jl. Semarang" required>
                </div>
                <input type="submit" class="btn btn-light" id="pesan-btn" value="Pesan">
            </form>

            <div id="detail">
                <hr />
                <h4>Detail Pesanan</h4>
                <div class="card-custom">
                    <table>
                        <tr>
                            <th>Jarak</th>
                            <th>:</th>
                            <td id="distance"></td>
                        </tr>
                        <tr>
                            <th>Durasi</th>
                            <th>:</th>
                            <td id="duration"></td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <th>:</th>
                            <td id="price"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_qHKYFum4g_Y8e7sgqS3T26Fjz1IxBpg&libraries=places"></script>
    <script src="<?php echo _WEB_ROOT_."/views/client/assets/js/app.js"?>"></script>
</body>

</html>
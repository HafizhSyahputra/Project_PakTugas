<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edit pesanan</title>
</head>
<body>
<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('bdd8bfa32c939823f0f0', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('pesanan-channel');
    channel.bind('pesanan-event', function(data) {
        console.log('Received dashboard-event with data:', data);
        document.getElementById('event').innerHTML = data.message;
        alert(data.message);
    });
</script>
<h1 align="center" class="container mt-5">Edit pesanan</h1>
<div align="center" class="container mt-5">
    <button class="btn btn-outline-primary mr-2"><a href="<?php echo base_url('pesanan'); ?>">Back to pesanan List</a></button>
</div>
<div class="container">
<form method="post" action="<?php echo base_url('pesanan/update_pesanan/' . $hasil->pesanan_id); ?>">
        <div class="form-group">
            <label>Pesanan ID</label>
            <input type="number" class="form-control" name="id" value="<?php echo $hasil->pesanan_id; ?>" readonly>
        </div>
        <div class="form-group">
            <label>User ID</label>
            <input type="number" class="form-control" name="id" value="<?php echo $hasil->id; ?>">
        </div>
        <div class="form-group">
            <label>Id Rute</label>
            <input type="number" class="form-control" name="id_rute" value="<?php echo $hasil->id_rute; ?>">
        </div>
        <div class="form-group">
            <label>Id Pesawat</label>
            <input type="number" class="form-control" name="id_pesawat" value="<?php echo $hasil->id_pesawat; ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" value="<?php echo $hasil->tanggal; ?>">
        </div>
        <div class="form-group">
                         <label>Jumlah Kursi</label>
                         <input type="number"  placeholder="Masukan Jumlah Kursi"class="form-control" name="jumlah_kursi" value="<?php echo $hasil->jumlah_kursi; ?>">
                    </div>
                    <label>Pilih Pesawat</label>
                    <div class="form-group">
                        <select name="harga_kursi" class="form-control" id="harga_kursi" value="<?php echo $hasil->harga_kursi; ?>">
                            <option value="100000">Lion Air - Rp. 100.000</option>
                            <option value="120000">Batik Air - Rp. 120.000</option>
                            <option value="90000">Citilink - Rp. 90.000</option>
                            <option value="150000">Garuda - Rp. 150.000</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Total Harga</label>
                        <input type="number" class="form-control"  id="total_harga" name="total_harga" value="<?php echo $hasil->total_harga; ?>" readonly >
                    </div>
        <button type="submit" value="submit" class="btn btn-primary mb-4">Update</button>
    </form>
</div>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('bdd8bfa32c939823f0f0', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('pesanan-channel');
    channel.bind('pesanan-event', function(data) {
      alert(JSON.stringify(data));
    });


        function confirmDelete(id) {
            if (confirm('Yakin Ingin Menghapus Data?')) {
                window.location.href = "<?php echo base_url('pesanan/delete_pesanan/'); ?>" + id;
            }
        }
    </script>
    <script>
    var hargaKursiSelect = document.getElementById('harga_kursi');
    var jumlahKursiInput = document.querySelector('input[name="jumlah_kursi"]');
    var totalHargaInput = document.getElementById('total_harga');

    // Mendengarkan perubahan pada elemen input dan select
    hargaKursiSelect.addEventListener('change', updateTotalHarga);
    jumlahKursiInput.addEventListener('input', updateTotalHarga);

    // Fungsi untuk menghitung total harga berdasarkan perubahan pada input
    function updateTotalHarga() {
        var hargaKursi = parseFloat(hargaKursiSelect.value); // Mendapatkan nilai harga kursi yang dipilih
        var jumlahKursi = parseFloat(jumlahKursiInput.value); // Mendapatkan nilai jumlah kursi
        
        // Memastikan kedua nilai telah diisi
        if (!isNaN(hargaKursi) && !isNaN(jumlahKursi)) {
            var totalHarga = hargaKursi * jumlahKursi; // Menghitung total harga
            totalHargaInput.value = totalHarga; // Menampilkan total harga pada input
        }
    }

    // Panggil fungsi untuk menginisialisasi total harga saat halaman dimuat
    updateTotalHarga();
</script>
</body>
</html>

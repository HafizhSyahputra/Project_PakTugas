<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edit Rute</title>
</head>
<body>
<script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('bdd8bfa32c939823f0f0', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('rute-channel');
        channel.bind('rute-event', function(data) {
            console.log('Received rute-event with data:', data);
            document.getElementById('event').innerHTML = data.message;
            alert(data.message);
        });
    </script>
<h1 align="center" class="container mt-5">Edit Rute</h1>
<div align="center" class="container mt-5">
    <button class="btn btn-outline-primary mr-2"><a href="<?php echo base_url('rute'); ?>">Back to Rute List</a></button>
</div>
<div class="container">
<form method="post" action="<?php echo base_url('rute/update_rute/' . $hasil->id_rute); ?>">
        <div class="form-group">
            <label>Kota Asal </label>
            <input type="text" class="form-control" name="asal" value="<?php echo $hasil->asal; ?>">
        </div>
        <div class="form-group">
            <label>Kota Tujuan</label>
            <input type="text" class="form-control" name="tujuan" value="<?php echo $hasil->tujuan; ?>">
        </div>
        <div class="form-group">
            <label>Jarak Kota</label>
            <input type="text" class="form-control" name="jarak" value="<?php echo $hasil->jarak; ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Id Pesawat</label>
            <input type="number" class="form-control" name="id_pesawat" value="<?php echo $hasil->id_pesawat; ?>">
        </div>
        <button type="submit" value="submit" class="btn btn-primary mb-4">Update</button>
    </form>
</div>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>

    Pusher.logToConsole = true;

    var pusher = new Pusher('bdd8bfa32c939823f0f0', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('rute-channel');
    channel.bind('rute-event', function(data) {
      alert(JSON.stringify(data));
    });


        function confirmDelete(id) {
            if (confirm('Yakin Ingin Menghapus Data?')) {
                window.location.href = "<?php echo base_url('rute/delete_rute/'); ?>" + id;
            }
        }
    </script>
</body>
</html>

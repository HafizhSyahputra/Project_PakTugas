<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edit Profil</title>
</head>
<body>
<script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('bdd8bfa32c939823f0f0', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('pesawat-event', function(data) {
            console.log('Received pesawat-event with data:', data);
            document.getElementById('event').innerHTML = data.message;
            alert(data.message);
        });
    </script>
<h1 align="center" class="container mt-5">Edit Pesawat</h1>
<div align="center" class="container mt-5">
    <button class="btn btn-outline-primary mr-2"><a href="<?php echo base_url('pesawat'); ?>">Back to Pesawat List</a></button>
</div>
<div class="container">
<form method="post" action="<?php echo base_url('pesawat/update_pesawat/' . $hasil->id_pesawat); ?>">
        <div class="form-group">
            <label>Nama Pesawat</label>
            <input type="text" class="form-control" name="username" value="<?php echo $hasil->name; ?>">
        </div>
        <div class="form-group">
        <select class="form-control" name="tipe" value="<?php echo $hasil->type; ?>">
                <option>Ekonomi</option>
                <option>Bisnis</option>
                <option>Fisrt Class</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Kapasitas</label>
            <input type="number" class="form-control" name="kapasitas" value="<?php echo $hasil->capacity; ?>">
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

    var channel = pusher.subscribe('pesawat-channel');
    channel.bind('pesawat-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
</body>
</html>
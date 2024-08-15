<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edit Profil</title>
    

</head>
<body>
<h1 align="center" class="container mt-5">Edit Profil</h1>
<div align="center" class="container mt-5">
    <button class="btn btn-outline-primary mr-2"><a href="<?php echo base_url('profil'); ?>">Back to Profil List</a></button>
</div>
<div class="container">
<form method="post" action="<?php echo base_url('profil/update_user/' . $hasil->id); ?>">
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $hasil->username; ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $hasil->email; ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="text" class="form-control" name="password" value="<?php echo $hasil->password; ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" name="name" value="<?php echo $hasil->name; ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">No-Hp</label>
            <input type="number" class="form-control" name="phone" value="<?php echo $hasil->phone; ?>">
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

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url(); ?>https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="<?php echo base_url(); ?>https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar ul {
            display: flex;
            list-style: none;
            z-index: 2;
            padding: 0;
            margin: 0;
        }


        .navbar ul li {
            margin: 0 10px;
            position: relative;
            color: white;
        }

        .dropdown-menu {
            border-radius: 8px;
            padding: 10px;
            transform: translateX(-70px);
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
        }

        .dropdown-item {
            padding: 8px 20px;
            color: #333333;
        }

        .dropdown-item:hover {
            background-color: #f1f1f1;
        }

        .dropdown-toggle::after {
            display: inline-block;
            margin-left: 5px;
            vertical-align: middle;
            content: "";
            border-top: 5px solid;
            border-right: 5px solid transparent;
            border-left: 5px solid transparent;
        }

        .swal2-actions button {
            margin-right: 10px;
        }
    </style>
    <title>Profile</title>
</head>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('bdd8bfa32c939823f0f0', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
        <img src="<?php echo base_url(); ?>assets/img/logo.png" class="navbar-brand" href="dashboard">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="pesanan">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pesawat">Data Pesawat</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rute">Data Rute</a>
                </li>
            </ul>
            <ul>
                <li class="nav-item" style="transform:translateX(800px);">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo base_url(); ?>assets/img/profil.png">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <center>
                        <a style="color:#220059; font-size:20px;" class="dropdown-item">Hi'&nbsp;<?php echo $this->session->userdata('username');?></a>
                        </center>
                        <a class="dropdown-item" href="auth/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <h1 align="center" style="margin-top: 100px;">Profile</h1>
    <div class="container mt-5">
        <table class="table" border="1">
        <tr style="background-color: navy; color: white; font-weight: bold; " >
                <td scope="col">ID</td>
                <td scope="col">Username</td>
                <td scope="col">Email</td>
                <td scope="col">Password</td>
                <td scope="col">Nama</td>
                <td scope="col">No-Hp</td>
                <?php if ($this->session->userdata('role') === 'admin') : ?>
                    <td scope="col">Edit</td>
                <?php endif; ?>
            </tr>
            <?php foreach ($users as $user) : ?>
                <?php if ($this->session->userdata('role') === 'admin' || $this->session->userdata('username') === $user->username) : ?>
                    <tr>
                        <td><?php echo $user->id; ?></td>
                        <td><?php echo $user->username; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->password; ?></td>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->phone; ?></td>
                        <?php if ($this->session->userdata('role') === 'admin') : ?>
                            <td>
                                <a href="<?php echo base_url('profil/edit_user/' . $user->id); ?>">Edit</a> |
                                <a href="#" onclick="confirmDelete(<?php echo $user->id; ?>);">Delete</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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

        function confirmDelete(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?php echo base_url('profil/delete_user/'); ?>" + id;
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire({
                title: "Cancelled",
                text: "Your data is safe :)",
                icon: "error"
            });
        }
    });
}


    </script>
</body>

</html>
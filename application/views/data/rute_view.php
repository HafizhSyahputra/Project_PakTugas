<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo base_url(); ?>https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

        .cr{
            text-decoration: none; 
            color: navy; 
        }
        .cr:hover{
            text-decoration: none; 
            color: grey; 
        }

        .edel{
            text-decoration: none;
            color: navy;

        }
        .edel:hover{
            text-decoration: none;
            color: grey;
            
        }

        .site-footer
{
  background-color: #0D2783;
  padding:45px 0 20px;
  font-size:12px;
  line-height:24px;
  color:#737373;
}
.site-footer hr
{
  border-top-color:#bbb;
  opacity:0.5
}
.site-footer hr.small
{
  margin:20px 0
}
.site-footer h6
{
  color:#fff;
  font-size:16px;
  text-transform:uppercase;
  margin-top:5px;
  letter-spacing:2px
}
.site-footer a
{
  color:#737373;
}
.site-footer a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links
{
  padding-left:0;
  list-style:none
}
.footer-links li
{
  display:block
}
.footer-links a
{
  color:#737373
}
.footer-links a:active,.footer-links a:focus,.footer-links a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links.inline li
{
  display:inline-block
}
.site-footer .social-icons
{
  text-align:right
}
.site-footer .social-icons a
{
  width:40px;
  height:40px;
  line-height:40px;
  margin-left:6px;
  margin-right:0;
  border-radius:100%;
  background-color:white
}
.copyright-text
{
  margin:0
}
@media (max-width:991px)
{
  .site-footer [class^=col-]
  {
    margin-bottom:30px
  }
}
@media (max-width:767px)
{
  .site-footer
  {
    padding-bottom:0
  }
  .site-footer .copyright-text,.site-footer .social-icons
  {
    text-align:center
  }
}
.social-icons
{
  padding-left:0;
  margin-bottom:0;
  list-style:none
}
.social-icons li
{
  display:inline-block;
  margin-bottom:4px
}
.social-icons li.title
{
  margin-right:15px;
  text-transform:uppercase;
  color:#96a2b2;
  font-weight:700;
  font-size:13px
}
.social-icons a{
  background-color:#eceeef;
  color:#818a91;
  font-size:16px;
  display:inline-block;
  line-height:44px;
  width:44px;
  height:44px;
  text-align:center;
  margin-right:8px;
  border-radius:100%;
  -webkit-transition:all .2s linear;
  -o-transition:all .2s linear;
  transition:all .2s linear
}
.social-icons a:active,.social-icons a:focus,.social-icons a:hover
{
  color:#fff;
  background-color:#29aafe
}
.social-icons.size-sm a
{
  line-height:34px;
  height:34px;
  width:34px;
  font-size:9px
}
.social-icons a.facebook:hover
{
  background-color:#3b5998
}
.social-icons a.twitter:hover
{
  background-color:#00aced
}
.social-icons a.linkedin:hover
{
  background-color:#007bb6
}
.social-icons a.dribbble:hover
{
  background-color:#ea4c89
}
@media (max-width:767px)
{
  .social-icons li.title
  {
    display:block;
    margin-right:0;
    font-weight:600
  }
}

.swal2-actions button {
            margin-right: 10px;
        }
    </style>
    <title>Profile</title>
</head>

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
                    <a class="nav-link" href="pesawat">Data Pesawat</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="rute">Data Rute <span class="sr-only">(current)</span></a>
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
                        <a class="dropdown-item" href="profil">Data Profil</a>
                        <a class="dropdown-item" href="auth/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <h1 align="center" style="margin-top: 110px;"> Rute</h1>
    <div class="container mt-5">
        <?php if ($this->session->userdata('role') === 'admin') : ?>
            <a href="<?php echo base_url('rute/buat'); ?>" class="cr" >➕ Create </a>
        <?php endif; ?>
        <table class="table" border="1" style="margin-top: 20px; margin-bottom: 390px; ">
            <tr style="background-color: navy; color: white; font-weight: bold; " >
                <td scope="col">ID</td>
                <td scope="col">Asal</td>
                <td scope="col">Tujuan</td>
                <td scope="col">Jarak</td>
                <td scope="col">Id Pesawat</td>
                <?php if ($this->session->userdata('role') === 'admin') : ?>
                    <td scope="col">Edit</td>
                <?php endif; ?>
            </tr>
            <?php foreach ($rute as $rutes) : ?>
                <tr>
                    <td><?php echo $rutes->id_rute; ?></td>
                    <td><?php echo $rutes->asal; ?></td>
                    <td><?php echo $rutes->tujuan; ?></td>
                    <td><?php echo $rutes->jarak; ?></td>
                    <td><?php echo $rutes->id_pesawat; ?></td>
                    <?php if ($this->session->userdata('role') === 'admin') : ?>
                        <td>
                            <a href="<?php echo base_url('rute/edit_rute/' . $rutes->id_rute); ?>" class="edel"  >Edit</a> |
                            <a href="#" onclick="confirmDelete(<?php echo $rutes->id_rute; ?>);" class="edel"  >Delete</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

      <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6"  >
            <img src="<?php echo base_url();?>assets/img/image 9.png"   width="150px;" >
            <p class="text-justify">Dengan komitmen yang tak tergoyahkan untuk menghadirkan pengalaman penerbangan yang tak tertandingi, kami menjunjung tinggi keamanan, kenyamanan, dan keandalan. Melintasi cakrawala dengan layanan yang luar biasa, kami mengantarkan Anda menuju destinasi impian Anda, membuka pintu menuju petualangan yang tak terlupakan. Bersama kami, nikmati perjalanan yang menyenangkan, sambil merasakan kebebasan di langit biru, dan hadirkan momen-momen tak terlupakan dalam perjalanan Anda.</p>

            
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Type</h6>
            <ul class="footer-links">
              <li><a href="http://scanfcode.com/category/c-language/">Premium Class</a></li>
              <li><a href="http://scanfcode.com/category/front-end-development/">Bussiness Class</a></li>
              <li><a href="http://scanfcode.com/category/back-end-development/">First Class</a></li>
              <li><a href="http://scanfcode.com/category/java-programming-language/">Economy Class</a></li>
              <li><a href="http://scanfcode.com/category/android/">Executive Class</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="http://scanfcode.com/about/">About Us</a></li>
              <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
              <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
              <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
              <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
         <a href="#">Flight Safe</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons" >
              <li ><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('bdd8bfa32c939823f0f0', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('rute-channel');
        channel.bind('rute-event', function(data) {
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
            window.location.href = "<?php echo base_url('rute/delete_rute/'); ?>" + id;
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
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="<?php echo base_url()?> https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
    font-family: 'Poppins', sans-serif;
}

.body{
    background: #05123E;
    color: white;
}
a{
    text-decoration: none;
    color: grey;
}

a:hover{
    color: white;
    text-decoration: none;
}


.logo{
    margin-left: 120px;
    margin-top: 60px;
    width: 254px;
    height: 50px;
}

.login{
    color: #717070;
font-size: 24px;
font-family: Arial;
font-style: normal;
font-weight: 600;
display: flex;
line-height: normal;
}


.login ul {
    list-style: none;
    display: flex;
    justify-content: space-between;
    width: 200px; 
    margin-left: 130px; 
    margin-top: 40px;
    padding: 0;    
}


.login ul li {
    position: relative;
}

.login ul li::after {
    content: "";
    position: absolute;
    bottom: -8px; 
    left: 0;
    width: 100%;
    height: 0.5px;
    background-color: black;
}


.login ul .signin::after {
    background-color: #FCBE05;
    stroke-width: 10px;
    width: 90px;
    stroke: #ffffff;
}

.signin{
    color: white;
}


.login ul .signup::after {
    width: 90px;
    background-color: #717070;
}


.cna{
    color: #FFF;
font-size: 64px;
margin-left: 130px; 
margin-top: 20px;
font-style: normal;
font-weight: 600;
line-height: normal;
}




.login .form-control {
    background-color: #333645;
    border: none;
    height: 70px;
    margin-left: 130px;
    width: 562px;
    border-radius: 20px;
    margin-top: 70px;
    box-sizing: border-box; 
}

.form-control p {
    margin: -2px; 
    color: white;
}



.form-control input {
    width: calc(100% - 40px);
    padding: 10px; 
    border: none;
    margin-left: 8px;
    border-radius: 3px;
    background: transparent;
    color: white;
}

.form-control input::placeholder {
    color: rgb(255, 255, 255);
}

.login2 .form-control {
    background-color: #333645;
    border: none;
    height: 70px;
    margin-left: 130px;
    width: 562px;
    border-radius: 20px;
    margin-top: 30px;
    box-sizing: border-box; 
}

.sb {
    margin-left: 130px;
    margin-top: 30px;
    border-radius: 20px;
    background: #333645;
    width: 100px;
    height: 45px;
    color: white;
    border: none; 
    outline: none; 
    cursor: pointer; 
    transition: background-color 0.3s; 
    font-size: 16px;
}

.sb:hover {
    background-color: #555;
    box-shadow: none; 
}

    </style>
    <title>Login</title>
</head>
<body class="body">
    <!-- Logo -->
    <div class="logo">
        <img src="<?php echo base_url();?>assets/img/image 9.png">
    </div>
    <!-- Signin/Signup -->
    <div class="login">
        <ul>
            <li class="signin">Sign in</li>
            <li class="signup"><a href="<?php echo base_url('register')?>">Sign up</a></li>
        </ul>
    </div>
    <h1 class="cna">Login</h1>
    <p style="margin-left: 130px;">Enter your login data here</p>

    <!-- Form Username -->
    <div class="login">
    <form action="<?php echo base_url('Auth/login')?>" method="post">
        <div class="form-control">
        <p for="username" style="color: grey; font-weight: lighter; margin-left: 18px; margin-top: 3px; ">Username:</p>
        <input class="form-input" style="border: none; padding-right: 30vh; background-color: #333645; height: 30px; " type="text" id="username" placeholder="Masukan Username" name="username" required>
    </div>

    <!-- Form Password -->
    <div class="login2">
            <div class="form-control">
            <p for="password" style="color: grey; font-weight: lighter; margin-left: 18px; margin-top: 3px;">Password:</p>
            <input class="form-input" style="border: none; padding-right: 30vh; background-color: #333645; height: 30px;" type="password" id="password" placeholder="Masukan Password" name="password" required>
        </div>

    <!-- Login Button -->
    <input class="sb" type="submit" value="Login" required>

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
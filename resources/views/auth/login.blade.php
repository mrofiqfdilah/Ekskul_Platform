<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ekskul Platform | Login</title>
  <link rel="icon" href="image/title.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <style>
    body {
        font-family: poppins;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #014585;
    }
    .login-box {
      width: 500px;
      padding: 20px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
      border: 1px solid #ccc;
      background-color: #fff;
      border-radius: 5px;
      margin-left: -100px;
      margin-top:100px;
      position: relative;
      left:-70px;
    }
    input{
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    @media (max-width: 844px) {
    .login{
      margin-left: -140px;
      margin-top: -100px;
    }
    .login-box{
      position: relative;
      left:10px;
      width: 330px;
      top:-50px;
    }


}
    
  </style>
</head>
<body>
    <img src="image/logologin.png" class="login" style=" left:190px; position: relative; top:-150px;" alt="">
  <div class="login-box">
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
       
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" style="letter-spacing:1px;">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Masukan Email Anda" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" style="letter-spacing:1px;">Password</label>
        <input type="password" name="password"  placeholder="Masukan Password Anda" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
      </div>
      <button type="submit" class="btn " style="letter-spacing:1px;background-color: #348CFF; color:#fff; float:right;">Log In</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>

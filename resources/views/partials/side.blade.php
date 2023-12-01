<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ekskul Platform</title>
    <link rel="icon" href="image/title.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg" style="background-color: #014585; height:90px;">
    <div class="container-fluid mg" style="margin-left: 100px;">
      <a class="navbar-brand" id="logos" href="#"><img src="image/logo.png" alt=""></a>
      <button style="border:none;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span> <i class="ri-menu-line " id="menu" style="color:#fff; font-size: 2rem; border: none; "></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 10px;">
          <li class="nav-item">
            <a class="nav-link active " aria-current="page" style="font-weight: 600; font-family:poppins; color:#66D694;" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#" style="font-weight: 600; font-family:poppins;">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#" style="font-weight: 600; font-family:poppins;">Kegiatan</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link disabled text-light" href="" style="font-weight: 600; font-family:poppins;">Gallery</a>
          </li>
        </ul>
       <p style="color: #fff; font-weight:600; font-family:poppins; position:relative; left:-150px; top:10px; letter-spacing:1px;">Welcome {{ auth()->user()->name }} <p class="emoji" style="font-size: 28px; transform(20deg); transition:0.5s; position: relative; top:5px; left:-150px;">&#x1F44B;</p>
      </p>
      <style>
        .emoji{
           animation: wave 2s infinite;
        }
        @keyframes wave {
    0% { transform: rotate(0deg); }
    25% { transform: rotate(20deg); }
    50% { transform: rotate(0deg); }
    
    
  }
      </style>
       <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit"  style="background-color: #D83F3F; box-shadow:0 5px 10px #D83F3F; position:relative; left:-110px; width:100px; height:40px; border:1px solid red; color:#fff; border-radius:5px;"><a href="" style="text-decoration: none; color:#fff; font-weight:700;">Logout <i style="position: relative; top:2px;" class="ri-logout-circle-r-line"></i></a></button>
       </form>
      
      
      
      </div>
    </div>
  </nav>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
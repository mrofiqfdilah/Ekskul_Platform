<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ekskul Platform</title>
    <link rel="icon" href="/image/title.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
  <div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
            <label for="nourut" class="form-label">Nama Murid</label>
            <input type="text" class="form-control" value="{{ $user->name }}" name="name" placeholder="Masukan Nama Murid">
            </div>

            <div class="mb-4">
                <label for="alamat" class="form-label">Email Murid</label>
               <input type="email" value="{{ $user->email }}" name="email" placeholder="Masukan Email Murid" class="form-control">
            </div>

            <div class="mb-4">
                <label for="nourut" class="form-label">Password</label>
                <input type="password"  class="form-control" name="password" placeholder="Masukan Password ">
            </div>

            <div class="mb-4">
                <label for="nourut" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" name="cpassword" placeholder="Konfirmasi Password ">
            </div>
          
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
<style>
    body{
        font-family: poppins;
        background-color:#014585;
    }
    .card{
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    .form-label{
      letter-spacing: 1px;
    }
</style>
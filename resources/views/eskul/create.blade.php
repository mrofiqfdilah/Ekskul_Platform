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
            <form action="{{ route('eskul.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
            <label for="nourut" class="form-label">Nama Ekskul</label>
            <input type="text" class="form-control" name="namaeskul" placeholder="Masukan Nama Ekskul">
            </div>

            <div class="mb-4">
                <label for="alamat" class="form-label">Jadwal Hadir</label>
               <input type="text" name="deskripsi" placeholder="Masukan Jadwal Ekskul" class="form-control">
            </div>

            <div class="mb-4">
                <label for="nourut" class="form-label">Tempat Pelaksanaan</label>
                <input type="text" class="form-control" name="jadwaltempat" placeholder="Masukan Tempat Pelaksanaan">
            </div>

            <div class="mb-4">
              <label for="guru_id" class="form-label">Pilih Guru</label>
              <select class="form-select" name="guru_id">
                <option value="" selected disabled>Pilih Guru</option>
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id }}">{{ $guru->name }}</option>
                @endforeach
            </select>            
          </div>
          
          
            <div class="mb-4">
            <label for="namapaslon" class="form-label">Icon Ekskul</label>
            <input type="file" class="form-control" name="gambar" placeholder="Masukan Nama Paslon">
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
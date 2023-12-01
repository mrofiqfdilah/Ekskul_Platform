<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Ekskul Platform</title>
    <link rel="icon" href="image/title.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <div class="logo"><i class="ri-infinity-line"></i> <img src="image/logo.png" alt=""></div>
        <ul class="menu">
          <li><a href="{{ route('eskul.index') }}"><i class="ri-basketball-fill"></i>Data Ekskul</a></li>
          <li><a href="{{ route('dataguru.index') }}"><i class="ri-user-shared-fill"></i>Data Guru</a></li>
          <li><a href="{{ route('user.index') }}"><i class="ri-team-line"></i>Data Siswa</a></li>
          <li><a href="{{ route('gabung.index') }}"><i class="ri-mail-check-fill"></i>Data Daftar</a></li>
          <li><a href="{{ route('home') }}"><i class="ri-user-voice-fill"></i>User Page</a></li>
            <form action="{{ route('logout') }}" method="post">
                @csrf
           <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        </ul>
    </div>
    <div class="logo" style="box-shadow:0 4px 10px rgba(0,0,0,0.1); position: relative; width:1115px; border-bottom:1px solid; background-color:#FDFDFD; margin-left:280px;margin-top:-597px; color:#C4C3C5; "><i class="ri-menu-line" style="position: relative; left:-450px;"></i><p style="color: #C4C3C5; font-size:20px; left:-430px; position: relative; top:8px; font-weight:400;">Dashboard</p></div>
    <div class="content">
        <div class="card" data-aos="fade-up"
        data-aos-offset="300"
        data-aos-easing="ease-in-sine" style="width: 980px; margin-left:260px;">
            <div class="card-body">
                <a href="{{ route('eskul.create') }}" style="background-color:#0D6EFD; height:40px; color:#fff;" class="btn  mb-3"><p style=" letter-spacing:1px; position: relative; top:-5px;">Tambah Data <i class="ri-add-circle-line" style="font-size: 20px; position: relative; top:5px;"></i></p></a>
              
                        

                <table>
                    <tr>
                        <th style="letter-spacing:0.5px; border: 1px solid #ddd; padding: 8px;"><div class="d-flex justify-content-center">No </div></th>
                        <th style="letter-spacing:0.5px; border: 1px solid #ddd; padding: 8px;"><div class="d-flex justify-content-center">Nama Ekskul</div></th>
                        <th style="letter-spacing:0.5px; border: 1px solid #ddd; padding: 8px;"><div class="d-flex justify-content-center">Pelaksanaan</div></th>
                        <th style="letter-spacing:0.5px; border: 1px solid #ddd; padding: 8px;"><div class="d-flex justify-content-center">Pembimbing</div></th>
                        <th style="letter-spacing:0.5px; border: 1px solid #ddd; padding: 8px;"><div class="d-flex justify-content-center">Jadwal Hadir</div></th>
                        <th style="letter-spacing:0.5px; border: 1px solid #ddd; padding: 8px;"><div class="d-flex justify-content-center">Actions</div></th>
                    </tr>
                    @foreach ($eskul as $no => $hasil)
                    <tr>
                        <td style="border: 1px solid #ddd; text-align:center; padding: 8px; color: rgba(204, 60, 40, 1);"><a href="" style="text-decoration: none;">{{ $no+1 }}</a></td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align:center;">{{ $hasil->namaeskul }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align:center;">{{ $hasil->jadwaltempat }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align:center;">
                            @if ($hasil->guru)
                            {{ $hasil->guru->name }}
                        @else
                        Not exist
                        @endif
                        <td style="border: 1px solid #ddd; padding: 8px; text-align:center;">{{ $hasil->deskripsi }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            <div class="d-flex justify-content-center"> <!-- Edit button -->
                                <a href="{{ route('eskul.edit', $hasil->id) }}" class="btn btn-primary"><i class="ri-pencil-fill"></i></a>
                                <!-- Delete button -->
                                <form action="{{ route('eskul.destroy', $hasil->id) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="margin-left: 5px;"><i class="ri-delete-bin-7-line"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <p style="margin-top: 20px;">
                {{ $eskul->links() }}
            </p>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
     <!-- Modal -->
     <div id="myModal" class="modal">
        <span class="close"><a href="{{ route('eskul.index') }}" style="color: #fff; text-decoration:none;">&times;</a></span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
      </div>
  
      <script>
        // Get all thumbnail images and set up click event listeners
        var thumbnails = document.querySelectorAll('.thumbnail');
        thumbnails.forEach(function (thumbnail, index) {
          thumbnail.onclick = function () {
            var modal = document.getElementById("myModal");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
  
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
          };
        });
  
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
  
        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
          modal.style.display = "none";
        };
      </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-bw5l9t3sbKg6Cf5n7tjqpOjG5WYAB/P6bDVJ0UqNU8rC4hxlKkqGK0fbF9aKqMQG7" crossorigin="anonymous"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>
<style>
 #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 50%;
  max-width: 300px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
    body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        background-color:#EBECF0;
        font-family: poppins;
    }
      /* Add your CSS styling here */
      table {
            border-collapse: collapse;
            width: 940px;
            position: relative;
            
            
            
            border: 1px solid #ddd;
        }
        th, td {
            text-align: left;
            padding: 8px;
           
        }
        th {
            background-color: #f2f2f2;
        }
      
        .btn {
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #2EB961;
            color: #fff;
            border: none;
        }
        .btn-primary:hover{
            background-color: #2EB961;
        }
        .btn-danger {
            background-color: #DE5554;
            color: #fff;
            border: none;
        }

    .sidebar {
        width: 250px;
        background-color: #3B4A64;
        color: white;
        height: 100vh;
        padding: 20px;
        box-sizing: border-box;
    }

    .logo {
        width: 260px;
        height: 75px;
        background-color: #2C344B;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: bold;
        position: relative;
        top: -22px;
        left: -30px;
        margin-bottom: 20px;
    }

    .menu {
        list-style: none;
        padding: 0;
    }

    .menu li {
        margin-bottom: 20px;
    }

    .menu a {
        text-decoration: none;
        color: #9AA4BD;
        font-size: 20px;
        transition: 0.3s;
        display: flex;
        align-items: center;
    }

    .menu a i {
        margin-right: 10px;
    }

    .menu a:hover {
        color: #fff;
       
    }

    .content {
        padding: 20px;
    }
</style>

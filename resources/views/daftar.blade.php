@include('partials.side')
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ekskul Platform</title>
    <link rel="stylesheet" href="stylehome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="box">
    <div class="box-content">
       <img src="image/radius3.png" alt="" class="img-fluid">
        @if(isset($eskul))
        <p style="position: relative; top:7px;"  class="box-text">{{ $eskul->namaeskul }}</p>
        <!-- Tambahkan semua field lainnya sesuai kebutuhan -->
        @else
        <p>Anda belum memilih ekskul untuk mendaftar.</p>
        @endif
    </div>
</div>
<div class="container">
    
    <!-- Konten lainnya -->
</div>
<div class="card">
    @if(isset($eskul))
    <p class="tst"><span class="label">Nama Eskul &nbsp;&nbsp;&nbsp;:</span>{{ $eskul->namaeskul }} </p>
    <div class="d-flex">
        <p class="tst" style="position: relative;"><span class="label">Pebimbing &nbsp;&nbsp;&nbsp; :</span>{{ $eskul->guru->name }}</p>
    </div>
    <p class="tst"><span class="label">Jadwal Eskul&nbsp; :</span>{{ $eskul->deskripsi }} </p>
    <p class="tst"><span class="label">Pelaksanaan&nbsp; :</span>{{ $eskul->jadwaltempat }}</p>
    @if ($alreadyJoined)
    <a href="" class="status">Anda Telah Terdaftar Di Ekskul Ini</a>
    <a href="{{ route('home') }}" class="btn" id="ask" style="width: 220px; position: relative; top:20px;">Kembali Ke Beranda</a>
@else
    <form method="POST" action="{{ route('gabung.store') }}">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="ekskul_id" value="{{ $eskul->id }}">
        <!-- Tambahkan input lain sesuai kebutuhan -->

        <button type="submit" class="btn">Gabung Eskul</button>
    </form>
@endif
       
    @else
    <p>Anda belum memilih ekskul untuk mendaftar.</p>
    @endif
</div>
@include('sweetalert::alert')



<section class="section-4" style="position: relative; top:120px;font-family: poppins;">
    <p class="fs-2 text fw-bolder" id="kegiatan"  style="  text-align:center; color:#152C5B; ">Gallery Kegiatan Ekskul</p>
    <div class="wrapper">
      <i id="left" class="fa-solid fa-angle-left"></i>
      <div class="carousel">
        <img src="image/bola (1).jpg" alt="img" draggable="false">
        <img src="image/smk-coding-5.webp" alt="img" draggable="false">
        <img src="image/Basket.jpg" alt="img" draggable="false">
        <img src="image/img-4.jpg" alt="img" draggable="false">
        <img src="image/img-5.jpg" alt="img" draggable="false">
        <img src="image/img-6.jpg" alt="img" draggable="false">
        <img src="image/img-7.jpg" alt="img" draggable="false">
        <img src="image/img-8.jpg" alt="img" draggable="false">
        <img src="image/img-9.jpg" alt="img" draggable="false">
      </div>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
  </section>

  <script>
    const carousel = document.querySelector(".carousel"),
firstImg = carousel.querySelectorAll("img")[0],
arrowIcons = document.querySelectorAll(".wrapper i");

let isDragStart = false, isDragging = false, prevPageX, prevScrollLeft, positionDiff;

const showHideIcons = () => {
  // showing and hiding prev/next icon according to carousel scroll left value
  let scrollWidth = carousel.scrollWidth - carousel.clientWidth; // getting max scrollable width
  arrowIcons[0].style.display = carousel.scrollLeft == 0 ? "none" : "block";
  arrowIcons[1].style.display = carousel.scrollLeft == scrollWidth ? "none" : "block";
}

arrowIcons.forEach(icon => {
  icon.addEventListener("click", () => {
      let firstImgWidth = firstImg.clientWidth + 14; // getting first img width & adding 14 margin value
      // if clicked icon is left, reduce width value from the carousel scroll left else add to it
      carousel.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
      setTimeout(() => showHideIcons(), 60); // calling showHideIcons after 60ms
  });
});

const autoSlide = () => {
  // if there is no image left to scroll then return from here
  if(carousel.scrollLeft - (carousel.scrollWidth - carousel.clientWidth) > -1 || carousel.scrollLeft <= 0) return;

  positionDiff = Math.abs(positionDiff); // making positionDiff value to positive
  let firstImgWidth = firstImg.clientWidth + 14;
  // getting difference value that needs to add or reduce from carousel left to take middle img center
  let valDifference = firstImgWidth - positionDiff;

  if(carousel.scrollLeft > prevScrollLeft) { // if user is scrolling to the right
      return carousel.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
  }
  // if user is scrolling to the left
  carousel.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
}

const dragStart = (e) => {
  // updatating global variables value on mouse down event
  isDragStart = true;
  prevPageX = e.pageX || e.touches[0].pageX;
  prevScrollLeft = carousel.scrollLeft;
}

const dragging = (e) => {
  // scrolling images/carousel to left according to mouse pointer
  if(!isDragStart) return;
  e.preventDefault();
  isDragging = true;
  carousel.classList.add("dragging");
  positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
  carousel.scrollLeft = prevScrollLeft - positionDiff;
  showHideIcons();
}

const dragStop = () => {
  isDragStart = false;
  carousel.classList.remove("dragging");

  if(!isDragging) return;
  isDragging = false;
  autoSlide();
}

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("touchstart", dragStart);

document.addEventListener("mousemove", dragging);
carousel.addEventListener("touchmove", dragging);

document.addEventListener("mouseup", dragStop);
carousel.addEventListener("touchend", dragStop);
  </script>


  <footer class="section-5" style="font-family: poppins;">
    <img src="image/logologin.png" style="position: relative; margin-top:75px; top:70px; width:150px;" alt="" class="image-footer">
  
      <div class="footer-txt d-flex justify-content-center" style="margin-top: 10px;">
      <p class="text-white text-center fw-light" id="txtft" style="font-family: poppins;" >Program di luar jam pelajaran yang ditawarkan oleh sekolah untuk<br> melengkapi pendidikan formal siswa SMKN 1 Sampit.</p>
      </div>
      <div class="menu-footer" style="position:relative; top:-110px;font-family: poppins;">  
      <ul>
        <li><a href="">Beranda</a></li>
        <li><a href="">Tentang</a></li>
        <li><a href="">Kegiatan</a></li>
        <li><a href="">Gallery</a></li>
      </ul>
  </div>
  <div>
  <img src="image/sosmed-fb.png"  alt="" class="image-footer-fb">
  <img src="image/sosmed-ig.png" alt="" class="image-footer-ig">
  </div>
  
     
  </footer>
  <div class="footer-bgn" style="position: relative; font-family:poppins; top:120px;">
    <p id="ptx" style="letter-spacing: 1px;" class="fw-light">&copy;Ekskul Platform All rights reserved.</p>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<style>
body {
    font-family: poppins;
   overflow-x: hidden;
}
.status{
    position: relative;
    left: 20.5px;
    color: #66D694;
}
.gr{
    color: #152C5B;
    letter-spacing: 1px;
    font-size: 28px;
    font-family: poppins;
    font-weight: 700;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    top:140px;
}
html::-webkit-scrollbar{
    width:0.6rem;
}
      html::-webkit-scrollbar-track{
    background:#A1A9AF;
}

html::-webkit-scrollbar-thumb{
    background:#808B93;
    border-radius: 50px;
}
.box {
    width: 100%;
    height: 200px;
    background-color: #023C73;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.btn{
    background-color: #348CFF;
    width: 150px;
    position: relative;
    left: 20px;
    top:10px;
    color: #fff;
    letter-spacing: 1px;
}
.btn:hover{
    background-color: #348CFF;
    width: 150px;
    position: relative;
    left: 20px;
    top:10px;
    color: #fff;
}


.box-content {
    text-align: center;
}

.box-text {
    font-weight: 600;
    font-size: 36px;
    color: #fff;
    letter-spacing: 1px;
}

.card {
    color: #5B6B8C;
    letter-spacing: 1px;
    font-weight: 300;
    border: none;
    position: relative;
    top:50px;
    left: 485px;
}

.label {
    width: 150px;
    display: inline-block;
    text-align: right;
    margin-right: 10px;
}

.tst {
    display: flex;
    align-items: center;
}
</style>
<style>
    .section-1{
    background-color:#023C73;
    height:500px;
   
}

.txt-desc{
    margin-top: 50px; 
    margin-left:110px; 
    color:#fff; 
    font-size:36px; 
    font-weight:700; 
    float:left
}
#radius1{
    position: relative;
    top:30px;
}
.wrapper{
    display: flex;
    max-width: 1100px;
    position: relative;
    margin-left: 100px;
    margin-top: 40px;
  }
  #kegiatan{
    position: relative;
    top:10px;
  }
  .wrapper i{
    top: 50%;
    height: 44px;
    width: 44px;
    color: #fff;
    cursor: pointer;
    font-size: 1.15rem;
    position: absolute;
    text-align: center;
    line-height: 44px;
    background: #348CFF;
    border-radius: 50%;
    transform: translateY(-50%);
    transition: transform 0.1s linear;
    z-index: 2;
  }
  .wrapper i:active{
    transform: translateY(-50%) scale(0.9);
  }
  .wrapper i:first-child{
    left: -22px;
    display: none;
  }
  .wrapper i:last-child{
    right: -22px;
  }
  .wrapper .carousel{
    font-size: 0px;
    cursor: pointer;
    overflow: hidden;
    white-space: nowrap;
    scroll-behavior: smooth;
  }
  .carousel.dragging{
    cursor: grab;
    scroll-behavior: auto;
  }
  .carousel.dragging img{
    pointer-events: none;
  }
  .carousel img{
    height: 340px;
    object-fit: cover;
    user-select: none;
    margin-left: 20px;
    border-radius: 8px;
    z-index: 1;
    width: calc(100% / 3);
  }
  .carousel img:first-child{
    margin-left: 0px;
  }
  
  @media screen and (max-width: 900px) {
    .carousel img{
      width: calc(100% / 2);
    }
  }
  
  @media screen and (max-width: 550px) {
    .carousel img{
      width: 100%;
    }
}
#daftar{
    position: relative;
    top:-20px;
}
#textpanjang{
    width:550px;
    position: relative;
    top:-10px;
}
#lengkap{
    position: relative;
    top:-60px;
}
.halo{
    position: relative;
    top:-50px;
}
.emoji{
    position: relative;
    top:-80px;
}
.btn-daftar{
    float: left;
    width: 170px; 
    height:45px; 
    font-size:14px; 
    color:#fff; 
    background-color:#348CFF; 
    letter-spacing:0.1em; 
    font-weight:550; 
    border-radius:6px; 
    margin-top:-200px; 
    border:1px solid #348CFF; 
    margin-left:110px;
}
.image-selamatdatang{
    margin-top: 70px; 
    margin-left:110px;
}
.img-program{
    width: 480px; 
    margin-left:110px; 
    margin-top:70px;
}
#btn-daftar{
    display: flex;
}    
.section-2{
    height: 640px; 
    background-color:#fff;
}
#image-eskul{
    margin-right: 65px; 
    margin-top:-220px;
    float: right;
}
.txt-judulpro{
    margin-top:-370px; 
    margin-left:675px; 
    color:#152C5B; 
}
.txt-ket{
    margin-left: 670px;
    color: #5B6B8C; 
    letter-spacing:1px; 
    font-size:16px; 
    text-align:justify;
    margin-top: -300px;
}

.img-tnng-pro{
    margin-top:-280px; 
    margin-left:70px;
}
.btn-selengkapnya{
    width: 200px; 
    height:45px; 
    letter-spacing:0.1em;  
    color:#fff; 
    background-color:#348CFF; 
    font-size:14px; 
    font-weight:550; 
    border-radius:6px; 
    border:1px solid #348CFF;
    margin-top: -100px;
    margin-left:670px;
}
.section-3{
    background-color:#F5F6F8; 
    height:700px;
}
footer{
    background-color:#014585; 
    height:350px;
}
.footer-bgn{
    background-color:#023C73; 
    height:50px;
    position: relative;
    top: 60px;
}
.footer-txt{
    padding: 100px;
}
.section-4{
    background-color: #fff; 
    height:600px
}
.img-logo{
    margin: auto;
    margin-top: 20px;
  display: block; 
  position:relative;
}
.box-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
    gap: 30px;
    padding: 79px;

    margin:auto;
  }
.image-footer{
   display: block;
   margin: auto;
   position: relative;
   top: 50px;
}
#txtft{
    position: relative;
    top: -20px;
    font-weight: 400;
    letter-spacing: 0.1em;
}
#text1{
    color:#66D694;
}
#ptx{
    text-align: center;
    color: #fff;
    position: relative;
    top: 14px;
}
#menu{
    font-size: 40px;
}
.footer-bgn{
    margin-top: -170px;
}
.image-footer-fb{
    position: relative;
    top: -100px;
    display: block;
    margin: auto;
}
.image-footer-ig{
    position: relative;
    top: -139px;
    display: block;
    margin: auto;
    left:55px;
}

.menu-footer ul{
    display: inline-flex;
    list-style-type: none;
}
.menu-footer li a{
    text-decoration: none;
    padding: 20px;
    color: #fff;
}
.menu-footer{
    display: flex;
    justify-content: center;
}
.section-5{
    overflow-y: hidden;
    height: 465px;
}




  .box-container .box {
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    background: #fff;
    text-align: center;
    margin-left: 50px;
    height: 200px;
    padding: 20px 20px;
    width: 250px;
  }

  .box:hover {
    border: 1px solid #348CFF;
    transform: scale(1.02);
    transition: .1s;
  }
  .gallery{
    width: 900px;
    display: flex;
    overflow-x: scroll;
  }
  .gallery div{
     width: 100%;
     display: grid;
     grid-template-columns: auto auto auto;
     grid-gap: 20px;
     padding: 10px;
     flex: none;
  }
  .gallery div img{
    width: 100%;
    border-radius: 6px;
  }
  .gallery::-webkit-scrollbar{
    display: none;
  }
  .gallery-wrap{
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 3% auto;
  }
  #backBtn,#nextBtn{
   width: 50px;
   cursor: pointer;
   margin: 40px;
  }
  .gallery div img:hover{
    filter: grayscale(0);
    cursor: pointer;
    transform: scale(1.1);
  }

  /* halaman tentang */

.sec-tentang{
    background-color: #f4f5f8;
    width: 100%;
    height: 800px;
}
.img-tentang{
    display: block;
    margin: auto;
    position: relative;
    top: 60px;
}
#texttentang{
    text-align: center;
   position: relative;
  top:100px;
  color: #5B6B8C;
}
#text2{
    text-align: center;
   position: relative;
  top:200px;
}
.judul1{
    text-align: center;
    position: relative;
    top: 70px;
    color: #152C5B;
    font-size: 36px;
    font-weight: 700;
}




@media only screen and (max-width: 844px) {
    #logos{
        position: relative;
        left:-90px;
    }
    .status{
        position: relative;
        left: 45px;
    }
    .card{
        margin-left: -500px;
        font-size: 13px;
        margin-top: -10px;
    }
    .btn{
        width: 130px;
        font-size: 13px;
        margin-left: 23px;
    }



    .wrapper{
       width: 300px;
       position: relative;
       left:-50px;

    }
    #image-eskul{
        position: relative;
        top:-250px;
        margin-left: 160px;
        width:350px;
        margin-top: -140px;
    }
    #radius1{
       position: relative;
       top:365px;
       left:-85px;
       width:280px;
    }
    #txt{
        position: relative;
        top:330px;
        text-align: justify;

        font-size: 20px;
        letter-spacing: 1px;
        font-weight: 600;
    }
    #kegiatan{
        position: relative;
        top:20px;
    }
    #photo{
        position: relative;
        top:30px;
       
    }
    #nextBtn{
        display: none;
    }
    #backBtn{
        display: none;
    }

    #extra{
        position: relative;
        top:20px;
        left: 30px;
    }
    #daftar{
        position: relative;
        left: -82px;
       top:-70px;
    }
    #textpanjang{
        text-align: justify;
        font-size: 12px;
        position: relative;
        top:30px;
        width:320px;
    }
    #lengkap{
        position: relative;
        top:55px;
        left:-60px;
    }

    #boxapaitu{
        position: relative;
        top:35px;
    }
    #programeskul{
        position: relative;
        top:25px;
    }
    #basket{
        position: relative;
        top:30px;
    }
  }

/*responsive*/
@media only screen and (max-width: 1327px) {
    .section-3{
        background-color:#F5F6F8; 
        height:950px;
    }
  }
@media only screen and (max-width: 1200px) {
    .txt-desc{
            margin-left:0px; 
            font-size: 15px;
    }
   
    .btn-daftar{
        margin-left: 0px;
    }
  }
  @media screen and (max-width: 1146px) {
    .img-program{
        width: 470px; 
        margin-left:40px; 
    }
    .img-tnng-pro{ 
        margin-left:40px;
    }
    .txt-judulpro{
        margin-left:555px; 
    }
    .txt-ket{
        margin-left: 555px;
    }
    .btn-selengkapnya{
        margin-left:550px;
    }
  }

  @media screen and (max-width: 1027px) {
    .section-3{
        background-color:#F5F6F8; 
        height:1180px;
    }
  }

  @media screen and (max-width: 991px){
    .img-program {
        width: 250px;
        margin-left: 30px;
    }
    .txt-judulpro{
        margin-left:100px; 
        margin-top: 0;
    }
    .img-tnng-pro{ 
        margin-left:50px;
        margin-top: -140px;
    }
    .txt-judulpro{
        margin-left: 330px; 
        margin-top: -200px;
    }
    .btn-selengkapnya{
        margin-left:350px; 
        margin-top: -100px;
    }
    .txt-ket{
        margin-top: 200px;
        margin-left: 330px;
        margin-top: -130px;    
    }
}   
  @media only screen and (max-width: 768px) {
    .section-1{
        height:700px;
    }
    
    .btn-daftar{
        margin-top:-100px; 
        margin-left: 0;
    }
  }
  @media screen and (max-width: 727px) {
    .section-3{
        background-color:#F5F6F8; 
        height:2100px;
    }
    .box-container {
        display: block;
        grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
        padding: 0;
        margin:auto;
      }
    
      .box-container .box {
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        background: #fff;
        text-align: center;
        margin:auto;
        margin-top: 40px;
        height: 200px;
        width: 250px;
      }
    
      .box:hover {
        border: 1px solid #348CFF;
        transform: scale(1.02);
        transition: .1s;
      }
  }
  @media only screen and (max-width: 621px) {
    .img-program {
        margin: auto;
        display: block;
        margin-top: 30px;
    }
    .txt-judulpro{
        margin: auto;
        display: block;
        margin-top: 20px;
    }
    .img-tnng-pro{ 
        margin: auto;
        display: block;
        margin-top: 20px;
    }
    .btn-selengkapnya{
        margin: auto;
        display: block;
    }
    .txt-ket{
        margin: auto;
        display: block; 
        margin-top: 10px;
        text-align: center;
    }
  }

  @media only screen and (max-width: 578px) {
    .btn-daftar{
        margin-top:-70px; 
        margin-left: 0;
    }
  }
  @media only screen and (max-width: 480px) {
    .txt-desc{
        font-size: 30px;
    }
    .txt-ket{
        font-size: 13px;
    }
  }
  @media only screen and (max-width: 466px) {
    .btn-daftar{
        margin-top:-70px; 
        margin-left: 0;
    }
    .section-2{
        height: 700px; 
        background-color:#fff;
    }
  }
</style>

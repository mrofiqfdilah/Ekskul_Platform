@include('partials.side')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ekskul Platform</title>
    <link rel="stylesheet" href="css/stylehome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    

<section class="section-1" style="margin-top: -30px;">
    <div class="d-flex justify-content-center justify-content-xl-start">
      <img src="/image/radius1.png" id="radius1"  class="img-fluid image-selamatdatang"
        alt="Responsive image">
    </div>
    <div class="d-flex justify-content-center justify-content-xl-start text-center text-xl-start">
      <p class="txt-desc" id="txt" style="font-family: poppins;">Kembangkan Bakat dan Minat<br>
        melalui Program Ekskul!</p>
    </div>
    <div class="d-flex d-xl-flex d-md-none justify-content-sm-center justify-content-center justify-content-xl-end">
      <img src="image/konten1.png" style="position:relative; top:10px; left:-50px;" class="img-fluid" id="image-eskul" alt="Responsive image">
    </div>
  </section>

  <div id="btn-daftar" class="d-flex justify-content-center justify-content-xl-start">
    <button  class="btn-daftar" id="daftar" style="font-family: poppins;">Daftar Sekarang</button>
  </div>



  <section class="section-2" data-aos="fade-up"
  data-aos-easing="linear"
  data-aos-duration="1200">
    <img src="image/konten2.jpg" class="img-program" id="basket" alt="Responsive image">
    <img src="image/radius2.png" id="boxapaitu" class="img-tnng-pro" alt="Responsive image">
    <div class="d-flex">
      <p id="programeskul" class="fs-2 txt-judulpro fw-bolder d-flex justify-content-start" style="font-family: poppins;">Apa Itu Program Ekskul ?</p>
  </div>
      <div class="d-flex justify-content-start" >
        <p id="textpanjang" class="fw-normal txt-ket" style="font-family: poppins; text-align:justify;">
          Program Ekstrakurikuler adalah program di luar jam pelajaran
          yang ditawarkan oleh sekolah untuk melengkapi pendidikan
          formal siswa. Ekstrakurikuler memberikan siswa kesempatan
          untuk mengembangkan minat, bakat, dan keterampilan di luar
          kurikulum akademik.Program ekstrakurikuler membantu siswa
          mengembangkan keterampilan sosial, kepemimpinan, kerja tim,
          serta membantu mereka menjelajahi minat dan bakat mereka di luar kelas.</p>
      </div>
      <div id="btn-selengkapnya">
      <button id="lengkap" class="btn-selengkapnya" style="font-family: poppins;">Baca Selengkapnya</button>
  </div>
    </section>



    <section class="section-3" data-aos="fade-up"
    data-aos-easing="linear"
    data-aos-duration="1200">
      <img src="image/radius3.png" class="img-fluid " alt="Responsive image" style="margin: auto;
    display: block; position:relative; top:50px; ">
      <p class="fs-2 text fw-bolder" style=" margin-top:60px; text-align:center; color:#152C5B; ">Macam macam kegiatan
        ekskul</p>
  
      <div class="box-container" style="font-family: poppins; position:relative; left:-30px; top:-30px;">
        @foreach ($eskul as $hasil)
        <div class="box" id="extra">
          <a href="{{ route('daftar', ['namaeskul' => $hasil->namaeskul]) }}">
            <img src="{{ $hasil->gambar }}" alt="" width="100"><br>
            <p style="margin-top: 20px; margin-left: -10px; color: #152C5B;" class="fw-semibold">
              <a href="{{ route('daftar', ['namaeskul' => $hasil->namaeskul]) }}" style="text-decoration: none; color: #152C5B; font-size: 20px;">
                {{ $hasil->namaeskul }}
              </a>
            </p>
          </a>
        </div>
        @endforeach
      </div>
    </section>



    <section class="section-4" data-aos="fade-up"
    data-aos-easing="linear"
    data-aos-duration="1200" style="position: relative; top:50px;font-family: poppins;">
      <img src="image/radius4.png" class="img-fluid img-logo" alt="Responsive image">
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
      <img src="image/logologin.png" style="position: relative; top:70px; width:150px;" alt="" class="image-footer">
    
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
    <style>
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
    </style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
  





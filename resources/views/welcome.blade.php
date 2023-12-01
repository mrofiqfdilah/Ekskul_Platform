<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ekskul Platform | Developer</title>
   <link rel="icon" href="image/title.png">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
      rel="stylesheet"
    />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <a href="{{ route('register') }}" class="btn">Get Started</a>
    <section>
      <div class="row">
      <h1><a style="text-decoration: none;"  href="">Our Team</a></h1>
      </div>
      <div class="row" data-aos="fade-down"
      data-aos-easing="linear"
      data-aos-duration="2000">
        <!-- Column 1-->
        <div class="column">
          <div class="card">
            <div class="img-container">
              <img src="image/david (3).jpeg" style="height: 145px;" />
            </div>
            <h3>Hilkia Farel Azaria</h3>
            <p>Work as Web Architect</p>
            <div class="icons">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin"></i>
              </a>
              <a href="#">
                <i class="fab fa-github"></i>
              </a>
              <a href="#">
                <i class="fas fa-envelope"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- Column 2-->
        <div class="column">
          <div class="card">
            <div class="img-container">
              <img src="image/david (2).jpeg" style="height: 145px;" />
            </div>
            <h3>M.Rofiq Fadilah</h3>
            <p>Work As Fullstack Dev</p>
            <div class="icons">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin"></i>
              </a>
              <a href="#">
                <i class="fab fa-github"></i>
              </a>
              <a href="#">
                <i class="fas fa-envelope"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- Column 3-->
        <div class="column">
          <div class="card">
            <div class="img-container">
              <img src="image/david (1).jpeg" style="height: 145px;" />
            </div>
            <h3>David Jonathan</h3>
            <p>Work as Presenter Team</p>
            <div class="icons">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin"></i>
              </a>
              <a href="#">
                <i class="fab fa-github"></i>
              </a>
              <a href="#">
                <i class="fas fa-envelope"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <h1 style="margin-top: 100px;" >Tech Stack</h1>
      <div class="image-container"  data-aos="fade-down"
      data-aos-easing="linear"
      data-aos-duration="1300">
        <img class="aos" src="image/aos1.png" alt="">
        <img class="laravel" src="image/laravel.png" alt="">
        <img class="boot" src="image/boot.png" alt="">
        <img class="js" src="image/js.png" alt="">
        <img class="sql" src="image/sql.png" alt="">
        <img class="vs" src="image/vs.png" alt="">
    </div>
    
    <style>
    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .image-container img {
        margin: 5px; /* Atur jarak antar gambar */
        filter: grayscale(100%);
        transition: filter 0.3s; /* Efek transisi filter */
    }
    
    .image-container img:hover {
        filter: grayscale(0);
    }
    .aos {
        width: 130px;
    }
    
    .laravel {
        width: 100px;
    }
    
    .boot {
        width: 140px;
    }
    
    .js {
        width: 90px;
    }
    
    .sql {
        width: 140px;
    }
    
    .vs {
        width: 90px;
    }
    </style>
    
    </section>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
  </body>
</html>
<style>
    * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  background-color: #f5f5f5;;
}
.row {
  display: flex;
  flex-wrap: wrap;
  padding: 2em 1em;
  text-align: center;
}
.btn{
  padding: 10px 15px;
  background-color: #6045ea;
  color: #fff;
  border-radius: 8px;
  text-decoration: none;
  letter-spacing: 1px;
  position: relative;
  left: 1150px;
  top:30px;
}
.column {
  width: 100%;
  padding: 0.5em 0;
}
h1 {
  width: 100%;
  text-align: center;
  font-size: 3em;
  letter-spacing: 1px;

  color: #1f003b;
}
.card {
  box-shadow: 0 0 2.4em rgba(25, 0, 58, 0.1);
  padding: 3em 1em;
  width: 350px;
  border-radius: 0.6em;
  color: #1f003b;
  margin-left: 28px;
  cursor: pointer;
  transition: 0.3s;
  background-color: #ffffff;
}
.card .img-container {
  width: 10em;
  height: 10em;
  background-color: #a993ff;
  padding: 0.5em;
  border-radius: 50%;
  margin: 0 auto 2em auto;
}
.card img {
  width: 100%;
  border-radius: 50%;
}
.card h3 {
  font-weight: 500;
}
.card p {
  font-weight: 300;
  text-transform: uppercase;
  margin: 0.5em 0 2em 0;
  letter-spacing: 1px;
}
.icons {
  width: 50%;
  min-width: 180px;
  margin: auto;
  display: flex;
  justify-content: space-between;
}
.card a {
  text-decoration: none;
  color: inherit;
  font-size: 1.4em;
}
.card:hover {
  background: linear-gradient(#6045ea, #8567f7);
  color: #ffffff;
}
.card:hover .img-container {
  transform: scale(1.15);
}
@media screen and (min-width: 768px) {
  section {
    padding: 1em 7em;
  }
}
@media screen and (min-width: 992px) {
  section {
    padding: 1em;
  }
  .card {
    padding: 5em 1em;
  }
  .column {
    flex: 0 0 33.33%;
    max-width: 33.33%;
    padding: 0 1em;
  }
}
</style>
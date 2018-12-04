<?php 
  session_start(); 
  require("config/header.php");
?>
    
    <link rel="stylesheet" href="./css/style-header.css">
    <link rel="stylesheet" href="./css/style-content.css">
    <link rel="stylesheet" href="./css/style-footer.css">
    
    <title>Wellcome to summoner's rift!</title>
  </head>
  <body>

    <!-- ======================== Header ======================== -->
    
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #181412; height: 90px; font-family: 'Helvetica', sans-serif;">
    
      <a class="navbar-brand mr-4 ml-3" href="./index.html">
        <img src="./image/logo.png"  alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Image and text -->
        <nav class="navbar navbar-dark" style="background-color: #181412;">
          <a class="navbar-brand mx-4" href="#">
            <span class="mr-3" style=" color: #fae639;">
              <i class="fas fa-circle "></i>
            </span>
            FEATURED
          </a>
          <?php 
            if(isset($_SESION["taikhoan"]))
            {
              echo "Xin chào ".$_SESION["taikhoan"].", <a href='logout.php'>(Đăng xuất)</a>";
            }
            else
            {             
              echo "<a style='color:white;' class='navbar-brand mx-4' href='login.php'></a>";
            }            
          ?>         
          <!--   <span class="mr-3" style=" color: #9befe0;">
              <i class="fas fa-circle"></i>
            </span>
            Đăng nhập
          </a> -->
          <a class="navbar-brand mx-4" href="#">
            <span class="mr-3" style=" color: #f573a0;">
              <i class="fas fa-circle"></i>
            </span>
            SHARE
          </a>
        </nav>      

      </div>

      <form class="form-inline my-2 my-lg-0 mr-5">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
      </form>
  
  </nav>

  <!-- ======================== Content ======================== -->
    
    <div class="content">
      
    </div>



  <!-- ======================== Footer ======================== -->
  
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #181412;font-family: 'Helvetica',sans-serif; height: 40px;">
    
      <a class="navbar-brand ml-5" style="color: #fff; opacity: .4; font-size: .8em;" href="https://www.facebook.com/tea.al.50">
        Copyright 2018 Personal NP
      </a>
      

      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <!-- Image and text -->
        <nav class="navbar navbar-dark" style="background-color: #181412; height: 40px; margin-left: 66%;">
          <a class="navbar-brand mx-4" style="font-size: .9em;" href="#">            
            Get Personal
          </a>
          <a class="navbar-brand mx-4" style="font-size: .9em;" href="#">            
            Legal
          </a>
          <a class="navbar-brand mx-4" style="font-size: .9em;" href="#">            
            Cookies
          </a>
        </nav>     
      </div> 

  </nav>  
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php  
      require("config/footer.php");
    ?>
    
  </body>
</html>
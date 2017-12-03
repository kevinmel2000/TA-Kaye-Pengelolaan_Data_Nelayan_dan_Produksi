<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contoh Kaurosel</title>
<meta content='Ilmu Detil' name='description'/>
<meta content='Pusat Ilmu Secara Detil' name='keywords'/>
<meta content='Informasi tentang Bootstrap' name='author'/>
<meta content='All' name='robots'/>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" href="bootstrap/css/style.css"  />
<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script  src="bootstrap/js/bootstrap.min.js"></script>
<script  src="bootstrap/js/portfolio/setting.js"></script>

<style type="text/css">
.navbar-inverse {
    background-color: #800040;
    border-color: #080808;
	font-size:18px;
	
	
	
}
@font-size-h4:            ceil((@font-size-base * 1.25)); // ~18px
.navbar-inverse .navbar-nav > li > a {
    color: #F9F1F1;
	
}
.nav {
    padding-left: 40px;
    margin-bottom: 0;
    list-style: none;
}



.carousel-inner>.item>img, .carousel-inner>.item>a>img {

      height: 253px;
	  width:  1253px;
}

 .carousel-control {
    position: absolute;
    top: 40%;
    left: 15px;
    width: 40px;
    height: 40px;
    margin-top: -20px;
    font-size: 60px;
    font-weight: 100;
    line-height: 30px;
    color: #ffffff;
    text-align: center;
    background: #222222;
    border: 3px solid #ffffff;
    -webkit-border-radius: 23px;
    -moz-border-radius: 23px;
    border-radius: 23px;
    opacity: 0.5;
    filter: alpha(opacity=50);
}
.carousel-control.right {
    right: 15px;
    left: auto;
}
.carousel-caption {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 5px;
    background: #333333;
    background: rgba(0, 0, 0, 0.75);
}
.carousel-caption p {
    margin-bottom: 0;
}
.carousel-indicators{
   top:0px;
   
}


@media screen and (max-width: 700px){
     .carousel-caption p {
        font-size: 13px;
    }
    .carousel-caption {
    background: rgba(0, 0, 0, 0.55);
    }
    .carousel-control {
        top: 20%;
    }
}   
  </style>


 </head>
<body>


<div class="container">
	   <div class ="row">
		<div class="col-md-6 ">
			<div class="panel panel-primary">
				<div class="panel-heading">Headline News</div>
										
				<!-- Slider News by Carousel -->		
					<div id='myCarousel' class='carousel slide' data-ride='carousel'>				
						<ol class='carousel-indicators'>
						<?php
							include "config/koneksi.php";
							$query      = "select * from berita order by id desc limit 3";
							$res        = mysqli_query($con,$query);
							$count      =   mysqli_num_rows($res);
							$slides     ='';
							$Indicators ='';
							$counter    =0;
							echo	"<li data-target='#myCarousel' data-slide-to='0'></li>";
							echo    "<li data-target='#myCarousel' data-slide-to='1'></li>";
							echo    "<li data-target='#myCarousel' data-slide-to='2'></li>";
						?>		
						</ol>															
							<div class='carousel-inner'>
							<?php
								include "config/koneksi.php";
								$query      = "select * from berita order by id desc limit 3";
								$res        = mysqli_query($con,$query);
								$count      =   mysqli_num_rows($res);
								while($c=mysqli_fetch_array($res)){
																
									$judul  = $c['judul'];
									$konten = $c['konten'];
									$gbr    = $c['gambar'];
									$artikel= substr($konten,0,200);
									$spasi  =strrpos($artikel,' ');
									$ringkas= substr($artikel,0,$spasi); // pemecah artikel
									if($counter==0)
									{
										echo"<div class='item active'>";		 								
										echo	"<a href=''>";
										echo 		"<img src='img/$gbr'>";
										echo	"</a>";
																
					
										echo	"<div class='container'>";				
										echo	"<div class='carousel-caption left-caption style='background-color:#EE0930'>";
										echo		"<a href=''> <font color=#ffffffff style='font-family: Verdana,Arial,Helvetica,Georgia; font-size: 13px;'>";
										echo			"<h5 class='text-left'>".$judul."</h5></font>";
										echo	   "</a>";
										echo		"<br>";
										echo		"<p style='font-family: Verdana,Arial,Helvetica,Georgia; font-size: 10px; text-align: justify;'> ".$ringkas."</p>";
										echo		"<br> ";
										echo		"<p><a href=''>";
										echo			"<h6 class='text-left'>Selengkapnya</b></h6>";
										echo		"</p>";
										echo   "</div>";
										echo"</div>";
										echo 	"</div>";
									}
									else
									{
										echo	"<div class='item'>";				
										echo		"<a href=''>";
										echo			"<img src='img/$gbr'>";
										echo		"</a>";											
										echo		"<div class='container'>";
																
										echo		"<div class='carousel-caption left-caption style='background-color:#EE0930'>";
										echo			"<a href=''> <font color=#ffffffff style='font-family: Verdana,Arial,Helvetica,Georgia; font-size: 13px;'><h5 class='text-left'>".$judul."</h5></font>
										</a>";
										echo	  "<br>";
										echo	  "<p style='font-family: Verdana,Arial,Helvetica,Georgia; font-size: 10px; text-align: justify;'> 
												".$ringkas."</p>";
										echo	"<br>";
										echo	"<p><a href=''> <h6 class='text-left'>Selengkapnya</b> </h6></p>";				
										echo	"</div>";
										echo		"</div>";
										echo	"</div>";
												}
												$counter++;
												}
													   
										echo"</div>";
										echo	"<a class='left carousel-control' href='#myCarousel' data-slide='prev'>‹</a>";
										echo	"<a class='right carousel-control' href='#myCarousel' data-slide='next'>&rsaquo;</a>";
													 
										echo"</div>";
															 
										echo"<!-- End Slider Caraousel-->";
										?>
			</div>
		</div>						
													

  </div>
  
</div>
</body>
</html>
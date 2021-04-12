












<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */

	//$this->extend('layout.html.php');

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>pimcore</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="/static/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="/static/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="/static/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="/static/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/static/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/static/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      
       <style>
    .card-body {
      border-bottom-left-radius: inherit !important;
      border-bottom-right-radius: inherit !important;
    }
  
.card {
padding: 1rem;
border: 1px solid black;
margin: 1rem;

 }
.cont {
background-color:#f7f5f5;
}

#myimg{
  width:100px;
  height:100px;
}



  </style>

  
</head>
<!-- body -->

<body class="main-layout ">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">

            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                <h3>SPORTS</h3>    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li class="active"> <a href="http://project.local/homepage">Home</a> </li>
                                        <li> <a href="http://project.local/products">Products</a> </li>
                                        
                                        <li><a href="http://project.local/admin">Log In</a></li>
                                        <li class="last">
                                            <a href="#"><img src="/static/images/search_icon.png" alt="icon" /></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                   
            </div>
        </div>
        <!-- end header inner -->
    </header>





<div class="container cont my-5 py-5 z-depth-1 ">

<?php
                
                 $product =  \Pimcore\Model\DataObject\Products::getById($_GET["id"]);
            
 ?>


  <!--Section: Content-->
  <section class="text-center">

    <!-- Section heading -->
    <h1 class="font-weight-bold mb-5">Product Details</h1>

    <div class="row">
      <div class="col-lg-6">

        <!--Carousel Wrapper-->
        <div id="carousel-thumb1" class="carousel slide carousel-fade carousel-thumbnails mb-5 pb-4" data-ride="carousel">

          <!--Slides-->
          <div class="carousel-inner text-center text-md-left" role="listbox">
            <div class="carousel-item active">
               
               <?php
               $picture = $product->getProductImage ();
		    if($picture instanceof \Pimcore\Model\Asset\Image):
			/** @var \Pimcore\Model\Asset\Image $Image */
		  echo $picture->getThumbnail()->getHtml(["width" => 100,"height" => 100]);
		  endif;
		  
		  ?>
           

        
        
      

      <div class="col-lg-8 text-center text-md-left">

        <h2 ><?php echo "Product name: ".$product->getProductName () ;  ?></h2>
        
        <span class="badge badge-success product mb-4 ml-2">DETAILS</span>

        <h2><?php echo "Price : </strong>".$product->getprice () ;  ?><br/>
             <?php 
             if($product->getReturnable()=='1'){echo 'Returnable : Yes<br/>';}
             else{'echo<strong> Returnable : </strong> No <br/>';}
            ?> 
             <?php echo  'ratings : '.$product->getRatings() ;  ?><br/>
             <?php echo 'discount :' .$product->getDiscount()->getValue();  ?><br/>
        </h2>
        
          <h2>Description :<?php echo $product->getdescription () ;  ?></h2>

          <h2>brand : <?php echo $product->getBrandName ()  ;  ?></h2>
         
          <h2>Warranty : <?php echo $product->getWarranty () ;  ?></h2> 
          
          <h2>country : <?php echo $product->getCountry ();  ?></h2>
          
           <?php
           
            $Type=array();
            $Type[0]= $product->getProductType()->getHeadwear();
            $Type[1]= $product->getProductType()->getBag();
            $Type[2]= $product->getProductType()->getBottle();
            $Type[3]= $product->getProductType()->getGlasses();
            $Type[4]= $product->getProductType()->getJacket();
            $Type[5]= $product->getProductType()->getPants();
            $Type[6]= $product->getProductType()->getShoes();
            $Type[7]= $product->getProductType()->getSocks();
            $Type[8]= $product->getProductType()->getTshirt();
            $Type[9]= $product->getProductType()->getWatches();
            
            $productType="";
            foreach($Type as $x){
               if($x !==null){
                 $productType=$x->getType();
                 break;
               }
            }
           
                   //tshirt
        		if($productType=="tshirt"){
        		        echo "<h2>Product Type: ".'t-shirt'."</h2>";
        			$productT = $Type[8];
        			$necktype=$productT->getNeckType();
        			$material=  $productT->getMaterial();
        			 $size = $productT->getSize();
        			 $sleeveType = $productT->getSleeveType();
        		     
        		      echo "<h2>necktype:".$necktype. "</h2>";
        		      echo "<h2>material:" . $material . "</h2>";
        		     echo "<h2>size:" .  $size  . "</h2>";
        		     echo "<h2>sleeveType:" .$sleeveType. "</h2>";	
        		}
                      	
        		//bag
        		if($productType=="Bag"){
        			echo "<h2>Product Type: ".'bag'."</h2>";
        			$productT= $Type[1];
        			$Capacity = $productT->getCapacity();
        			$size = $productT->getSize();
        			$height = $productT->getHeight();
                		$length = $productT->getLength();
                		$width = $productT->getWidth();
        			$bagType = $productT->getBagType();
        			$Waterproof = $productT->getWaterproof();
        		
        		       echo "<h2>Capacity" .$Capacity. "</h2>";
        		       echo "<h2>size" .  $size  . "</h2>";
        		       echo "<h2>height" .$height. "</h2>";
        		       echo "<h2>length" .$length. "</h2>";
        		       echo "<h2>width" . $width . "</h2>";
        		       echo "<h2>bagType" . $bagType . "</h2>";
        		        if($Waterproof=='1'){ echo 'waterproof : Yes'."<br/>";}
        		        else{echo 'waterproof : No'."<br/>";}
        		       echo "<h2>Waterproof" .$Waterproof. "</h2>";
        			
      		  	}
      		  	
      		  	
      		  	//bottle
      	  		if($productType=="bottle"){
      	  		
      	  		        echo "<h2>Product Type: ".'bottle'."</h2>";
        			$productT = $Type[2];
        			$Capacity = $productT->getCapacity();
        			$BottleType = $productT->getBottleType();
        			$material =  $productT->getMaterial();
        			
        		       echo "<h2>Capacity" .$Capacity. "</h2>";
        		       echo "<h2>BottleType" .$BottleType. "</h2>";
        		       echo "<h2>Material" .$material. "</h2>";
        			
        		}
        		
        		//Glassess
        		if($productType=="Glasses"){
        		        echo "<h2>Product Type :".'Glasses'."</h2>";
        			$productT = $Type[3];
        			$GlassType = $productT->getglassType();
                		$FrameShape = $productT->getFrameShape();
                		
                	       echo "<h2>GlassType: " .$GlassType. "</h2>";
        		       echo "<h2>FrameShape: " .$FrameShape. "</h2>";
        		
       
        		}
        		
        		//Headwear
        		if($productType=="Headwear"){
        		        echo "<h2>Product Type: Headwear</h2>";
        			$productT = $Type[0];
        			$HeadwearType = $productT->getHeadwearType();
        			$size = $productT->getSize();
        			
        		       echo "<h2>HeadwearType: " .$HeadwearType. "</h2>";
        		       echo "<h2>size: " .$size. "</h2>";
        			
        			
    		          }
    		          //Jacket
        		if($productType=="Jacket"){
        		        echo "<h2>Product Type: ".'jacket'."</h2>";
        			$productT = $Type[4];
        			$JacketType = $productT->getJacketType();
        			$material =  $productT->getMaterial();
                		$size = $productT->getSize();
        			
        		       echo "<h2>JacketType" .$JacketType . "</h2>";
        		       echo "<h2>Material" .$material. "</h2>";
        		       echo "<h2>Size" .$size . "</h2>";
        		       
        	
        		}
        	
        		//pants
        		if($productType=="pants"){
        		       echo "<h2> Product Type: ".'pants'."</h2>";
        			$productT = $Type[5];
        			$BottomType = $productT->getBottomType();
        			$material =  $productT->getMaterial();
                		$size = $productT->getSize();
        		        $length = $productT->getLength();
        		        
        		       echo "<h2>BottomType: " .$BottomType . "</h2>";
        		       echo "<h2>Material: " .$material. "</h2>";
        		       echo "<h2>Size: " .$size . "</h2>";
        		       echo "<h2>Length: " .$length . "</h2>";
        		
        		}
        	
        	
        		//shoes
        		if($productType=="shoes"){
        		        echo "<h2>Product Type: ".'shoes'."</h2>";
        			$productT = $Type[6];
        			$ShoesType = $productT->getShoesType();
               	        $Laces = $productT->getLaces();
        			$material =  $productT->getMaterial();
                		$size = $productT->getSize();
                		
                	       echo "<h2>ShoesType: " .$ShoesType  . "</h2>";
        		       echo "<h2>Laces: " .$Laces. "</h2>";
        		       echo "<h2>material: " .$material . "</h2>";
        		       echo "<h2>size: " .$size . "</h2>";
        		
        			
        		}
        	
        		//socks
        		if($productType=="socks"){
        		        echo "<h2>Product Type: ".'socks'."</h2>";
        			$productT = $Type[7];
        			$SocksType = $productT->getSocksType();
        			$material =  $productT->getMaterial();
                		$size = $productT->getSize();
        		
        		       echo "<h2>SocksType" .$SocksType  . "</h2>";
        		       echo "<h2>material" .$material . "</h2>";
        		       echo "<h2>size" .$size . "</h2>";
        		}
        	
        	
        		//watches
        		if($productType=="watches"){
        		    echo "<h2>".'watches: '."</h2>";
        	           $productT = $Type[9];
        		   $WatchType = $productT->getWatchType();
        		   $Waterproof = $productT->getWaterproof();
        		   
        		       echo "<h2>WatchType" .$WatchType  . "</h2>";
        		       echo "<h2>Material" .$material . "</h2>";
        		       if($Waterproof=='1'){ echo 'waterproof : Yes'."<br/>";}
        		        else{echo 'waterproof : No'."<br/>";}
        			
        			
        		}
           
           ?>

        </div>

      </div>
    </div>

  </section>
  <!--Section: Content-->


</div>


  
  
    <!-- footer -->
    <footer>
        <div id="contact" class="footer">
            <div class="container">
                <div class="row pdn-top-30">
                    <div class="col-md-12 ">
                        <div class="footer-box">
                            <div class="headinga">
                                <h3>Address</h3>
                                <span>Sports india, 176 W Streetname,INDIA, ,IN</span>
                                <h2>(+91) 1234567892
                                    <br>xyz@gmail.com</h2>
                            </div>
                            <ul class="location_icon">
                                <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li> <a href="#"><i class="fa fa-instagram"></i></a></li>

                            </ul>
                            <div class="menu-bottom">
                                <ul class="link">
                                    <li> <a href="#">Home</a></li>
                                    <li> <a href="#">About</a></li>
                                    
                                    <li> <a href="#">Products </a></li>
                                    <li> <a href="#">Specials  </a></li>
                                    <li> <a href="#"> Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <h2>© 2021 All Rights Reserved. Designed By GROUP ONE </a></h2>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    
    <!-- Javascript files-->
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/popper.min.js"></script>
    <script src="/static/js/bootstrap.bundle.min.js"></script>
    <script src="/static/js/jquery-3.0.0.min.js"></script>
    <script src="/static/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="/static/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/static/js/custom.js"></script>
    <!-- javascript -->
    <script src="/static/js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    


 
    
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
</body>

</html>




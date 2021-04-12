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
    
    *{
  	box-sizing: border-box;
  	
	}
  
    table {  
        border-collapse: collapse;  
    }  
        .inline{   
            display: inline-block;   
            float: right;   
            margin: 20px 0px;   
        }   
         
        input, button{   
            height: 34px;   
        }
        
        #myInput {
		  background-image: url('/static/icon/search.png');   /* Add a search icon to input */
		  background-position: 10px 12px;   /* Position the search icon */
		  background-repeat: no-repeat;     /* Do not repeat the icon image */
		  width: 200px;   /* width */
		  font-size: 16px;   /* Increase font-size */
		  padding: 12px 20px 12px 20px;   /* Add some padding */
		  border: 1px solid #ddd;   /* Add a grey border */
		  margin-bottom: 12px;   /* Add some space below the input */
		  float: right;
		  margin-right: 12px;
	}
   
  
    .pagination {   
        display: inline-block;   
    }   
    .pagination a {   
        font-weight:bold;   
        font-size:18px;   
        color: black;   
        float: left;   
        padding: 8px 16px;
        text-decoration: none;   
        border:1px solid black;   
    }   
    .pagination a.active {   
            background-color: white;   
    }   
    .pagination a:hover:not(.active) {   
        background-color: skyblue;   
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
                                <h3><?= $this->input("headline", ["width" => 540]); ?></h3>    
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
    <!-- end header -->
    <section class="slider_section">
        <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="/static/images/1.jpg" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <span >All New T-Shirts </span>
                            <h1>up to 25% Flat Sale</h1>
                            <p>It is a long established fact that a reader will be distracted by the readable content
                                <br> of a page when looking at its layout. The point of using Lorem Ipsum is that</p>
                            
                        </div>
                    </div>
                </div>
               
                <div class="carousel-item">
                    <img class="third-slide" src="/static/images/8.jpg" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <span>All New Bags </span>
                            <h1>up to 35% Flat Sale</h1>
                            <p>It is a long established fact that a reader will be distracted by the readable content
                                <br> of a page when looking at its layout. The point of using Lorem Ipsum is that</p>
                            
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <i class='fa fa-angle-left'></i>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <i class='fa fa-angle-right'></i>
            </a>
        </div>
    </section>
    <div class="container mt-5">

  <style>
    .card-body {
      border-bottom-left-radius: inherit !important;
      border-bottom-right-radius: inherit !important;
    }
  </style>

  <!--Section: Content-->
  <input type="text" id="myInput" onkeyup="searchProductByName()" placeholder="Search for names..">
	<!-- <button id="myBtn" onclick="myFunction()">Search</button> -->

	
	
  <center>  
    <?php  
         
    
        $per_page_record = 2;  // Number of entries to show in a page.   
        // Look for a GET variable page if not found default is 1.        
            
          if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        }    
        else {
          $page=1;    
           } 
    	//echo $page;
    	echo "<br>";
    	
        $start_from = ($page-1) * $per_page_record; 
     
        $products = new \Pimcore\Model\DataObject\Products\Listing();
        
       
        $products->setLimit($per_page_record);
   
        
        if($start_from > 0){
          $products->setOffset($start_from);
        }
        else{
          $products->setOffset(0);
        }
        
        //}
        
    ?>    
    

  
    <div class="container" style="overflow: scroll;">   
      <br>   
      <div>   
         
        <table id="myTable" class="table table-striped table-condensed    
                                          table-bordered">   
          <thead>   
            <tr>   
              <th >SKU</th>   
              <th onclick="sortTable(1)">Product Name</th>  
              <th >producttype</th>
              <th>Brand</th>
              <th>Category</th>
              <th>Price</th>
              <th>Discount</th>
              <th onclick="sortTable(2)">Ratings</th>  
              <th>Color</th>
             
           <!--   <th>Capacity</th>
           <th>height</th>
           <th>lenght</th>
           <th>width</th>
           <th>bag type</th>
           <th>Waterproof</th>
           <th>BottleType</th>
           <th>GlassType</th>
           <th>FrameShape</th>
           <th>HeadwearType</th>
            <th>JacketType</th>
             <th>BottomType</th>
              <th>ShoesType</th>
              <th>Laces</th>
              <th>SocksType</th>
               <th>WatchType</th>
                <th>SleeveType</th>-->
              <th>Returnable</th>
              <th>Warranty</th>
              <th>Image</th>
              
              
            </tr>   
          </thead>   
          <tbody>   
    <?php     
            	
    		foreach($products as $val=>$product)
    		{
	
		  echo "<tr>";
		  echo "<td>" . $product->getProductSKU () . "</td>";
		  echo "<td>" . $product->getProductName () . "</td>";
		  // "<td>" . $product->getProductType ()  . "</td>";
		 
		  ////////////////////////////
		  
		   
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
            /** @var  \Pimcore\Model\DataObject\Objectbrick $productType */
            //echo "<td>" . $productType() . "</td>";
             
                //tshirt
        		if($productType=="tshirt"){
        		        echo "<td>".'t-shirt'."</td>";
        			$productT = $Type[8];
        			$necktype=$productT->getNeckType();
        			$material=  $productT->getMaterial();
        			 $size = $productT->getSize();
        			 $sleeveType = $productT->getSleeveType();
        		     
        		      echo "<td>" .$necktype. "</td>";
        		      echo "<td>" . $material . "</td>";
        		     echo "<td>" .  $size  . "</td>";
        		     echo "<td>" .$sleeveType. "</td>";	
        		}
                      	
        		//bag
        		if($productType=="Bag"){
        			echo "<td>".'bag'."</td>";
        			$productT= $Type[1];
        			$Capacity = $productT->getCapacity();
        			$size = $productT->getSize();
        			$height = $productT->getHeight();
                		$length = $productT->getLength();
                		$width = $productT->getWidth();
        			$bagType = $productT->getBagType();
        			$Waterproof = $productT->getWaterproof();
        		
        		  //     echo "<td>" .$Capacity. "</td>";
        		  //     echo "<td>" .  $size  . "</td>";
        		  //     echo "<td>" .$height. "</td>";
        		  //     echo "<td>" .$length. "</td>";
        		  //     echo "<td>" . $width . "</td>";
        		  //     echo "<td>" . $bagType . "</td>";
        		  //     echo "<td>" .$Waterproof. "</td>";
        			
      		  	}
      		  	
      		  	
      		  	//bottle
      	  		if($productType=="bottle"){
      	  		
      	  		        echo "<td>".'bottle'."</td>";
        			$productT = $Type[2];
        			$Capacity = $productT->getCapacity();
        			$BottleType = $productT->getBottleType();
        			$material =  $productT->getMaterial();
        			
        		   /*    echo "<td>" .$Capacity. "</td>";
        		       echo "<td>" .$BottleType. "</td>";
        		       echo "<td>" .$material. "</td>";*/
        			
        		}
        		
        		//Glassess
        		if($productType=="Glasses"){
        		        echo "<td>".'Glasses'."</td>";
        			$productT = $Type[3];
        			$GlassType = $productT->getglassType();
                		$FrameShape = $productT->getFrameShape();
                		
                	    /*   echo "<td>" .$GlassType. "</td>";
        		       echo "<td>" .$FrameShape. "</td>";*/
        		
       
        		}
        		
        		//Headwear
        		if($productType=="Headwear"){
        		        echo "<td>".'Headwear'."</td>";
        			$productT = $Type[0];
        			$HeadwearType = $productT->getHeadwearType();
        			$size = $productT->getSize();
        			
        		 /*      echo "<td>" .$HeadwearType. "</td>";
        		       echo "<td>" .$size. "</td>";*/
        			
        			
    		          }
    		          //Jacket
        		if($productType=="Jacket"){
        		        echo "<td>".'jacket'."</td>";
        			$productT = $Type[4];
        			$JacketType = $productT->getJacketType();
        			$material =  $productT->getMaterial();
                		$size = $productT->getSize();
        			
        		  /*     echo "<td>" .$JacketType . "</td>";
        		       echo "<td>" .$material. "</td>";
        		       echo "<td>" .$size . "</td>";*/
        		       
        	
        		}
        	
        		//pants
        		if($productType=="pants"){
        		       echo "<td>".'pants'."</td>";
        			$productT = $Type[5];
        			$BottomType = $productT->getBottomType();
        			$material =  $productT->getMaterial();
                		$size = $productT->getSize();
        		        $length = $productT->getLength();
        		        
        		 /*      echo "<td>" .$BottomType . "</td>";
        		       echo "<td>" .$material. "</td>";
        		       echo "<td>" .$size . "</td>";
        		       echo "<td>" .$length . "</td>";*/
        		
        		}
        	
        	
        		//shoes
        		if($productType=="shoes"){
        		        echo "<td>".'shoes'."</td>";
        			$productT = $Type[6];
        			$ShoesType = $productT->getShoesType();
               	        $Laces = $productT->getLaces();
        			$material =  $productT->getMaterial();
                		$size = $productT->getSize();
                		
                	      /* echo "<td>" .$ShoesType  . "</td>";
        		       echo "<td>" .$Laces. "</td>";
        		       echo "<td>" .$material . "</td>";
        		       echo "<td>" .$size . "</td>";*/
        		
        			
        		}
        	
        		//socks
        		if($productType=="socks"){
        		        echo "<td>".'socks'."</td>";
        			$productT = $Type[7];
        			$SocksType = $productT->getSocksType();
        			$material =  $productT->getMaterial();
                		$size = $productT->getSize();
        		
        		    /*   echo "<td>" .$SocksType  . "</td>";
        		       echo "<td>" .$material . "</td>";
        		       echo "<td>" .$size . "</td>";*/
        		}
        	
        	
        		//watches
        		if($productType=="watches"){
        		    echo "<td>".'watches'."</td>";
        	           $productT = $Type[9];
        		   $WatchType = $productT->getWatchType();
        		   $Waterproof = $productT->getWaterproof();
        		   
        		      /* echo "<td>" .$WatchType  . "</td>";
        		       echo "<td>" .$material . "</td>";
        		       echo "<td>" .$Waterproof . "</td>";*/
        			
        			
        		}
		  ////////////////////////////
		  
		  
		  echo "<td>" . $product->getBrandName (). "</td>";
		  echo "<td>" . $product->getCategory_Id ()->getName() . "</td>";
		  echo "<td>" . $product->getPrice() . "</td>";
		  echo "<td>" . $product->getDiscount ()  . "</td>";
		  echo "<td>" . $product->getRatings () . "</td>";
		  echo "<td>" . $product->getColor() . "</td>";
		  if($product->getReturnable()=='1'){ echo "<td>".'Yes'."</td>";}else{ echo "<td>" .'No'. "</td>";}
		 
		  echo "<td>" . $product->getWarranty () . "</td>";
		  
		    $picture = $product->getProductImage ();
		    if($picture instanceof \Pimcore\Model\Asset\Image):
			/** @var \Pimcore\Model\Asset\Image $Image */
		  echo "<td>" . $picture->getThumbnail()->getHtml(["width" => 50,"height" => 50]) . "</td>";
		  endif;
		  
		    echo "<td><a href='http://project.local/productdetail?id=".$product->getId()."'> details</a><br >"; 
		    echo "<a href='http://project.local/addfeedback?id=".$product->getId()."'> +feedback</a></td>";  
		  echo "</tr>";
		  }
    
              ?>   
                 
          </tbody>   
        </table>   
  
     <div class="pagination">    
      <?php
         $products = new \Pimcore\Model\DataObject\Products\Listing(); 
          foreach($products as $val=>$product)
    		{
        $total_record = $val; 
           // echo $val;
          }
          $total_records = $total_record+1;
    	//echo "</br>";     
    	
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='http://project.local/products?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {
        	   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='http://project.local/products?page=".$i."'>".$i." </a>";   
          }         
          else  {   
              $pagLink .= "<a href='http://project.local/products?page=".$i."'>".$i." </a>";     
          }   
        };     
        echo $pagLink;
           
        if($page < $total_pages){   
            echo "<a href='http://project.local/products?page=".($page+1)."'>  Next </a>";   
        }
           
  
      ?>    
      </div>  
  
  
      <div class="inline">   
      <input id="page" type="number" min="1" max="<?php echo $total_pages?>"   
      placeholder="<?php echo $page."/".$total_pages; ?>" required>   
      <button onClick="go2Page();">Go</button>   
     </div>    
    </div>   
  </div>  
</center>   
  <script>   
  
  function searchProductByName() {
	  // Declare variables
	  var input, searchKey, table, rows, tableData, tableData1, i, txtValue;
	  input = document.getElementById("myInput");
	  searchKey = input.value.trim().toUpperCase();
	  table = document.getElementById("myTable");
	  rows = table.getElementsByTagName("tr");
	  
	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < rows.length; i++) {
	    tableData = rows[i].getElementsByTagName("td")[1];
	    if (tableData) {
	      txtValue = tableData.textContent || tableData.innerText;
	      if (txtValue.toUpperCase().indexOf(searchKey) > -1) {
		rows[i].style.display = "";
	      } else {
		rows[i].style.display = "none";
	      }
	    
	    }
	  }
	}
	

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("td")[n];
      y = rows[i + 1].getElementsByTagName("td")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
	
   
    function go2Page()   
    {   
        var page = document.getElementById("page").value;   
        page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
        window.location.href = 'http://project.local/products?page='+page;   
    }   
  </script>
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
                                <p>(+91) 1234567892
                                    <br>xyz@gmail.com</p>
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
                    <p>© 2021 All Rights Reserved. Designed By GROUP ONE </a></p>
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

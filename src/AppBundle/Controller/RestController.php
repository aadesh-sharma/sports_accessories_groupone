<?php

namespace AppBundle\Controller;

use Pimcore\Console\Dumper;
use Pimcore\Bundle\AdminBundle\Controller\Rest\AbstractRestController;
use Pimcore\Bundle\AdminBundle\HttpFoundation\JsonResponse;
use Pimcore\Bundle\AdminBundle\Security\BruteforceProtectionHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Pimcore\Model\DataObject\Products;
//use Pimcore\Model\Asset\MetaData\ClassDefinition\Data\Asset;
use Pimcore\Model\DataObject\Category;

use Pimcore\Model\DataObject;
use Pimcore\Model\Document;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject\Data\BlockElement;



/**
 * Class RestController
 * @package AppBundle\Controller
 */

 class RestController extends AbstractRestController
 {
     CONST BASE_API_SERVICE = 'base_api_service';

     /**
      * @Route("/webservice/products")
      * @Method({"GET"})
      * @param Request $request
      * @return \Symfony\Component\HttpFoundation\JsonResponse
      * @throws \Pimcore\Http\Exception\ResponseException
      * @throws \Exception
      */
    public function getProductList(Request $request, BruteforceProtectionHandler $bruteforceProtectionHandler)
    {   
    //6c4fc042e1ab3df2fc8c745ea10ea1894dbb23e501cf8542226260d0fe3ff996
       $filters=$this->getJsonData($request);
        
        $data = [];
        $products = new \Pimcore\Model\DataObject\Products\Listing();
        
        ///*       
        if($filters['limit']!=""){
        	$products->setLimit($filters['limit']);
        }
        if($filters['brandName']!=""){
        	$products->setCondition("brandName LIKE ?", [$filters['brandName']]);
        }
        if($filters['ratings']!=""){
        	//$products->filterByRatings($filters['ratings'], '==');
        	$products->setCondition("ratings = ?",$filters['ratings']);
        }
       //*/
       
       
        foreach ($products as $product)
        {   
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
        			$productT = $Type[8];
        			$necktype=$productT->getNeckType();
        			$material=  $productT->getMaterial();
        			 $size = $productT->getSize();
        			 $sleeveType = $productT->getSleeveType();
        			
        		}
        		
        		//bag
        		if($productType=="Bag"){
        			
        			$productT= $Type[1];
        			$Capacity = $productT->getCapacity();
        			$size = $productT->getSize();
        			$height = $productT->getHeight();
                		$length = $productT->getLength();
                		$width = $productT->getWidth();
        			$bagType = $productT->getBagType();
        			$Waterproof = $productT->getWaterproof();
        		
        			
      		  	}
      		  	
      		  	
      		  	//bottle
      	  		if($productType=="bottle"){
        			$productT = $Type[2];
        			$Capacity = $productT->getCapacity();
        			$BottleType = $productT->getBottleType();
        			$material =  $productT->getMaterial();
        			
        		}
        		
        		//Glassess
        		if($productType=="Glasses"){
        			$productT = $Type[3];
        			$GlassType = $productT->getglassType();
                		$FrameShape = $productT->getFrameShape();
        		
       
        		}
        		
        		//Headwear
        		if($productType=="Headwear"){
        			$productT = $Type[0];
        			$HeadwearType = $productT->getHeadwearType();
        			$size = $productT->getSize();
        			
        			
    		          }
    		          //Jacket
        		if($productType=="Jacket"){
        			$productT = $Type[4];
        			$JacketType = $productT->getJacketType();
        			$material =  $productT->getMaterial();
                		$size = $productT->getSize();
        			
        	
        		}
        	
        		//pants
        		if($productType=="pants"){
        			$productT = $Type[5];
        			$BottomType = $productT->getBottomType();
        			$material =  $productT->getMaterial();
                		$size = $productT->getSize();
        		        $length = $productT->getLength();
        		
        		}
        	
        	
        		//shoes
        		if($productType=="shoes"){
        			$productT = $Type[6];
        			$ShoesType = $productT->getShoesType();
               	        $Laces = $productT->getLaces();
        			$material =  $productT->getMaterial();
                		$size = $productT->getSize();
        		
        			
        		}
        	
        		//socks
        		if($productType=="socks"){
        			$productT = $Type[7];
        			$SocksType = $productT->getSocksType();
        			$material =  $productT->getMaterial();
                		$size = $productT->getSize();
        		
        			
        		}
        	
        	
        		//watches
        		if($productType=="watches"){
        	           $productT = $Type[9];
        		   $WatchType = $productT->getWatchType();
        		   $Waterproof = $productT->getWaterproof();
        			
        			
        		}
        	
           
            $data[] = [
                'id' => $product->getId(),
                'key' => $product->getKey(),
                'productSKU' => $product->getProductSKU(),
                'category' => $product->getCategory_Id()->getName(),
                'parent' => $product->getParentId(),
                'productName' => $product->getProductName(),
                'price' => $product->getPrice()->getValue(),
                'color' => $product->getColor()->getHex(true,true),
                'discount ' => $product->getDiscount()->getValue(),
                'brandName' => $product->getBrandName(),
                'description' => $product->getDescription(),
                'ratings' => $product->getRatings(),
                'status' => $product->getStatus(), 
                'image' => $product->getProductImage()->getFilename(), 
                'returnable' => $product->getReturnable(), 
                'warranty' => $product->getWarranty()->getValue(), 
                'country' => $product->getCountry(), 
                'manufacturedAt' => $product->getManufacturedAt(), 
                
                'productType' => $productType,
                'necktype' =>  $necktype,
                'material' => $material,
                'size' => $size,
                'sleeveType' => $sleeveType,
                'height' =>  $height,
                'length' => $length,
                'width' => $width,
                'bagType' => $bagType,
                'Waterproof' => $Waterproof,
                'Capacity' =>  $Capacity,
                'BottleType' => $BottleType,
                'Waterproof' => $Waterproof,
                'GlassType' => $GlassType,
                'FrameShape' => $FrameShape,
                'HeadwearType' => $HeadwearType,
                'JacketType' => $JacketType,
                'BottomType' => $BottomType,
                'ShoesType' => $ShoesType,
                'Laces' => $Laces,
                'SocksType' => $SocksType,
                'WatchType' => $WatchType
                
            ];
        }
     
           return $this->createSuccessResponse($data, true);
      
    }
    
    
     /**
      * @Route("/webservice/products1")
      * @Method({"GET"})
      * @param Request $request
      * @return \Symfony\Component\HttpFoundation\JsonResponse
      * @throws \Pimcore\Http\Exception\ResponseException
      * @throws \Exception
      */
    public function getProductList1(Request $request, BruteforceProtectionHandler $bruteforceProtectionHandler)
    {   
    //6c4fc042e1ab3df2fc8c745ea10ea1894dbb23e501cf8542226260d0fe3ff996
       
       
        $data = [];
        $products = new \Pimcore\Model\DataObject\Products\Listing();
        foreach ($products as $product)
        {   
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
        			$productT = $Type[8];
        			$necktype=$productT->getNeckType();
        			$material=  $productT->getMaterial();
        			 $size = $productT->getSize();
        			 $sleeveType = $productT->getSleeveType();
        			
        		}
        		
        		//bag
        		if($productType=="Bag"){
        			
        			$productT= $Type[1];
        			$Capacity = $productT->getCapacity();
        			$size = $productT->getSize();
        			$height = $productT->getHeight();
                		$length = $productT->getLength();
                		$width = $productT->getWidth();
        			$bagType = $productT->getBagType();
        			$Waterproof = $productT->getWaterproof();
        		
        			
      		  	}
      		  	
      		  	
      		  	//bottle
      	  		if($productType=="bottle"){
        			$productT = $Type[2];
        			$Capacity = $productT->getCapacity();
        			$BottleType = $productT->getBottleType();
        			$material =  $productT->getMaterial();
        			
        		}
        		
        		//Glassess
        		if($productType=="Glasses"){
        			$productT = $Type[3];
        			$GlassType = $productT->getglassType();
                		$FrameShape = $productT->getFrameShape();
        		
       
        		}
        		
        		//Headwear
        		if($productType=="Headwear"){
        			$productT = $Type[0];
        			$HeadwearType = $productT->getHeadwearType();
        			$size = $productT->getSize();
        			
        			
    		          }
    		          //Jacket
        		if($productType=="Jacket"){
        			$productT = $Type[4];
        			$JacketType = $productT->getJacketType();
        			$material =  $productT->getMaterial();
                		$size = $productT->getSize();
        			
        	
        		}
        	
        		//pants
        		if($productType=="pants"){
        			$productT = $Type[5];
        			$BottomType = $productT->getBottomType();
        			$material =  $productT->getMaterial();
                		$size = $productT->getSize();
        		        $length = $productT->getLength();
        		
        		}
        	
        	
        		//shoes
        		if($productType=="shoes"){
        			$productT = $Type[6];
        			$ShoesType = $productT->getShoesType();
               	        $Laces = $productT->getLaces();
        			$material =  $productT->getMaterial();
                		$size = $productT->getSize();
        		
        			
        		}
        	
        		//socks
        		if($productType=="socks"){
        			$productT = $Type[7];
        			$SocksType = $productT->getSocksType();
        			$material =  $productT->getMaterial();
                		$size = $productT->getSize();
        		
        			
        		}
        	
        	
        		//watches
        		if($productType=="watches"){
        	           $productT = $Type[9];
        		   $WatchType = $productT->getWatchType();
        		   $Waterproof = $productT->getWaterproof();
        			
        			
        		}
        	
           
            $data[] = [
                'id' => $product->getId(),
                'key' => $product->getKey(),
                'productSKU' => $product->getProductSKU(),
                'category' => $product->getCategory_Id()->getName(),
                'parent' => $product->getParentId(),
                'productName' => $product->getProductName(),
                'price' => $product->getPrice()->getValue(),
                'color' => $product->getColor()->getHex(true,true),
                'discount ' => $product->getDiscount()->getValue(),
                'brandName' => $product->getBrandName(),
                'description' => $product->getDescription(),
                'ratings' => $product->getRatings(),
                'status' => $product->getStatus(), 
                'image' => $product->getProductImage()->getPath(),
                'imagename' => $product->getProductImage()->getFilename(),  
                'returnable' => $product->getReturnable(), 
                'warranty' => $product->getWarranty()->getValue(), 
                'country' => $product->getCountry(), 
                'manufacturedAt' => $product->getManufacturedAt(), 
                
                'productType' => $productType,
                'necktype' =>  $necktype,
                'material' => $material,
                'size' => $size,
                'sleeveType' => $sleeveType,
                'height' =>  $height,
                'length' => $length,
                'width' => $width,
                'bagType' => $bagType,
                'Waterproof' => $Waterproof,
                'Capacity' =>  $Capacity,
                'BottleType' => $BottleType,
                'Waterproof' => $Waterproof,
                'GlassType' => $GlassType,
                'FrameShape' => $FrameShape,
                'HeadwearType' => $HeadwearType,
                'JacketType' => $JacketType,
                'BottomType' => $BottomType,
                'ShoesType' => $ShoesType,
                'Laces' => $Laces,
                'SocksType' => $SocksType,
                'WatchType' => $WatchType
                
            ];
        }
     
           return $this->createSuccessResponse($data, true);
      
    }
    
    
    
    
    /////////////////////////////
    
    
     /**
      * @Route("/webservice/addproducts")
      * @Method({"POST"})
      * @param Request $request
      * @return \Symfony\Component\HttpFoundation\JsonResponse
      * @throws \Pimcore\Http\Exception\ResponseException
      * @throws \Exception
      */
    public function setProductList(Request $request, BruteforceProtectionHandler $bruteforceProtectionHandler)
    {   
    
   
           
       // read json from request
        
       $data=$this->getJsonData($request);
       $rowCount=1;
       $err="";
       $errCount=0;
       foreach($data as $row){
       
    		$key = $row['key'];
    		$productSKU = $row['productSKU'];
    		$category_id = $row['category_id'];
    		$parentId = $row['parentId'];
    		$productType = $row['productType'];        
    		$productName = $row['productName'];
    		$priceValue = $row['priceValue'];
    		$color = $row['color'];
    		$discount = $row['discount'];
    		$brandName = $row['brandName'];
    		$description = $row['description'];
    		$ratings = $row['ratings'];
    		$status = $row['status'];
    		$productImage = $row['productImage'];
    		$returnable = $row['returnable'];
    		$warrantyValue = $row['warrantyValue'];
    		$warrantyUnit = $row['warrantyUnit'];
    		$country = $row['country'];
    		$manufacturedAt = $row['manufacturedAt'];
    		
    		//brick elements
    		$neckType = $row['neckType'];
    		$material = $row['material'];
    		$sleeveType = $row['sleeveType'];
    		$size = $row['size'];
    		$collar = $row['collar'];
    		$jacketType = $row['jacketType'];
    		$length = $row['length'];
    		$height = $row['height'];
    		$width = $row['width'];
    		$bottomType = $row['bottomType'];
    		$capacity = $row['capacity'];
    		$bagType = $row['bagType'];
    		$waterproof = $row['waterproof'];
    		$bottleType = $row['bottleType'];
    		$glassType = $row['glassType'];
    		$frameShape = $row['frameShape'];
    		$headwearType = $row['headwearType'];
    		$shoesType = $row['shoesType'];
    		$laces = $row['laces'];
    		$socksType = $row['socksType'];
    		$watchType = $row['watchType'];
           
               //brick element array
               $brickarr=['neckType','material','sleeveType','size','collar','jacketType','length','height','width','bottomType','capacity',
               'bagType','waterproof','bottleType','glassType','frameShape','headwearType','shoesType','laces','socksType','watchType'];
              
              $message="";
              
        	        
              foreach($row as $k=>$v){
   		  	if($v !="0" && empty($v) && !in_array($k,$brickarr)){
   	 			$message.="$k is empty||";
    		  		} 
    	       }
    		        
    	      if($message =="")
    	      {         
    	      		
    	      		$product = new \Pimcore\Model\DataObject\Products();
    	      		
    	      		
        		//set key 
        		$product->setKey($key);
        	 
        	        //set sku
        		$product->setProductSKU($productSKU);
        		
        	
        		//find category
        		$category =  \Pimcore\Model\DataObject\Category::getById($category_id);
        		if(!isset($category) ){$message.="category_id is invalid||";}
        		$product->setCategory_Id($category); 
        		
        		
        		//parentid
        		$product->setParentId($parentId);
        		
        	
        		//productname
        		$product->setProductName($productName);
        		
        	
        		//price
        		$price = new \Pimcore\Model\DataObject\Data\QuantityValue($priceValue,"Rs");
        		if($priceValue<"0" ){$message.="priceValue is invalid||";}
        		$product->setPrice($price);
        		
        	
        		//color
        		$clr = new \Pimcore\Model\DataObject\Data\RgbaColor();
      			$clr->setRgba($color);
        		$product->setColor($clr);
        		
        		
        		//discount
        		$disc = new \Pimcore\Model\DataObject\Data\QuantityValue($discount,"Percentage");
        		if($discount<"0"){$message.="discount is invalid||";}
        		$product->setDiscount($disc);
        		
        	
        		//brandname
        		$product->setBrandName($brandName);
        		
        	
        		//description
        		$product->setDescription($description);
        		
        	
        		//ratings
        		if($ratings<"0" && $ratings>"5"){$message.="ratings is invalid||";}
        		$product->setRatings($ratings);
        		
        	
        		//status
        		$statusValid=["active","inactive"];
        		if(!in_array($status,$statusValid) ){$message.="status is invalid||";}
        		$product->setStatus($status);
        		
        	
        		//image
        		$image = Asset\Image::getByPath("/".$productImage);
        		if(!isset($image) ){$message.="productImage is invalid||";}
        		$product->setProductImage($image);
        		
        	
        		//returnable
        		$returnableValid=["1","0"];
        		if(!in_array($returnable,$returnableValid) ){$message.="returnable is invalid||";}
        		$product->setReturnable($returnable);
        		
        	
        		//warranty
        		$warranty = new \Pimcore\Model\DataObject\Data\QuantityValue($warrantyValue,$warrantyUnit);
        		if(!isset($warranty) ){$message.="warranty is invalid||";}
        		$product->setWarranty($warranty);
        		
        	
        		//country
        		$countryValid=["India","USA"];
        		if(!in_array($country,$countryValid) ){$message.="country is invalid||";}
        		$product->setCountry($country);
       	 	
        	
        		//ManufacturedAt
        		$date = \Carbon\Carbon::parse($manufacturedAt);
        		if(!isset($date ) ){$message.="manufacturedAt is invalid||";}
        		$product->setManufacturedAt($date);
        		
        	
        	
        	
        		//productype //bricks
        		$validProductType=
        		["tshirt","shirt","bag","bottle","glasses","headwear","jacket","pants","shoes","socks","watches"];
        		
        		if(!in_array($productType,$validProductType)){$message.="productType is invalid||";}
        		 
        		//tshirt
        		if($productType=="tshirt"){
        			$brick = new DataObject\Objectbrick\Data\Tshirt($product);
        			$brick->setNeckType($neckType);
        			$brick->setMaterial($material);
        			$brick->setSize($size);
        			$brick->setSleeveType($sleeveType);
        		
        			$arr=[$neckType,$material,$size,$sleeveType];
        			foreach($arr as $x){
    		 			if(empty($x)){
    		  				$message.="$x is invalid ||";
    		  			}
    				}
        			$product->getProductType()->setTshirt($brick);
        		}
        	
        		//bag
        		if($productType=="bag"){
        			$brick = new DataObject\Objectbrick\Data\Bag($product);
        			
        			$cap = new \Pimcore\Model\DataObject\Data\QuantityValue($capacity,"ltr");
        			$h = new \Pimcore\Model\DataObject\Data\QuantityValue($height,"cm");
        			$w = new \Pimcore\Model\DataObject\Data\QuantityValue($width,"cm");
        			$l = new \Pimcore\Model\DataObject\Data\QuantityValue($length,"cm");
        			
        			$brick->setCapacity($cap);
        			$brick->setSize($size);
        			$brick->setHeight($h);
        			$brick->setWidth($w);
        			$brick->setLength($l);
        			$brick->setBagType($bagType);
        			$brick->setWaterproof($waterproof);
        		
        			$arr=[$capacity,$height,$width,$length,$bagType,$size,$waterproof];
        			foreach($arr as $x){
    			 		if(empty($x) && $x!="0"){
    			  			$message.="$x is invalid ||";
    			  		}
    				}
      					$product->getProductType()->setBag($brick);
      		  	}
        	
        	
      		  	//bottle
      	  		if($productType=="bottle"){
        			$brick = new DataObject\Objectbrick\Data\Bottle($product);
        			$cap = new \Pimcore\Model\DataObject\Data\QuantityValue($capacity,"ltr");
        			
        			$brick->setCapacity($cap);
        			$brick->setBottleType($bottleType);
        			$brick->setMaterial($material);
        			
        			$arr=[$capacity,$bottleType,$material];
        			foreach($arr as $x){
    			 		if(empty($x)){
    			  			$message.="$x is invalid ||";
    			  		}
    				}
        			$product->getProductType()->setBottle($brick);
        		}
        	
        		//Glassess
        		if($productType=="glasses"){
        			$brick = new DataObject\Objectbrick\Data\Glasses($product);
        			$brick->setGlassType($glassType);
        			$brick->setFrameShape($frameShape);
        		
        			$arr=[$frameShape,$glassType];
        			foreach($arr as $x){
    			 		if(empty($x)){
    			  			$message.="$x is invalid ||";
    			  		}
    				}
        			$product->getProductType()->setGlasses($brick);
        		}
        	
        		//Headwear
        		if($productType=="headwear"){
        			$brick = new DataObject\Objectbrick\Data\Headwear($product);
        			$brick->setHeadwearType($headwearType);
        			$brick->setSize($size);
        			
        			$arr=[$size,$headwearType];
        			foreach($arr as $x){
    			 		if(empty($x)){
    			  			$message.="$x is invalid ||";
    			  		}
    				}
        			$product->getProductType()->setHeadwear($brick);
        		}	
        	
        		//Jacket
        		if($productType=="jacket"){
        			$brick = new DataObject\Objectbrick\Data\Jacket($product);
        			$brick->setJacketType($jacketType);
        			$brick->setSize($size);
        			$brick->setMaterial($material);
        			
        		
        			$arr=[$jacketType,$size,$material];
        			foreach($arr as $x){
    		 			if(empty($x)){
    		  				$message.="$x is invalid ||";
    		  			}
    				}
        			$product->getProductType()->setJacket($brick);
        		}
        	
        		//pants
        		if($productType=="pants"){
        			$brick = new DataObject\Objectbrick\Data\Pants($product);
        			$brick->setBottomType($bottomType);
        			$brick->setSize($size);
        			$brick->setMaterial($material);
        			$l = new \Pimcore\Model\DataObject\Data\QuantityValue($length,"cm");
        			$brick->setLength($l);
        		
        			$arr=[$bottomType,$size,$material,$length];
        			foreach($arr as $x){
    		 			if(empty($x)){
    		  				$message.="$x is invalid ||";
    		  			}
    				}
				$product->getProductType()->setPants($brick);
        		}
        	
        	
        		//shoes
        		if($productType=="shoes"){
        			$brick = new DataObject\Objectbrick\Data\Shoes($product);
        			$brick->setShoesType($shoesType);
        			$brick->setLaces($laces);
        			$brick->setSize($size);
        			$brick->setMaterial($material);
        		
        			$arr=[$shoesType,$size,$material,$laces];
        			foreach($arr as $x){
    			 		if(empty($x)){
    			  			$message.="$x is invalid ||";
    			  		}
    				}
        			$product->getProductType()->setShoes($brick);
        		}
        	
        		//socks
        		if($productType=="socks"){
        			$brick = new DataObject\Objectbrick\Data\Socks($product);
        			$brick->setSocksType($socksType);
        			$brick->setSize($size);
        			$brick->setMaterial($material);
        		
        			$arr=[$socksType,$size,$material];
        			foreach($arr as $x){
    		 			if(empty($x)){
    		  				$message.="$x is invalid ||";
    		  			}
    				}
        			$product->getProductType()->setSocks($brick);
        		}
        	
        	
        		//watches
        		if($productType=="watches"){
        			$brick = new DataObject\Objectbrick\Data\Watches($product);
        			$brick->setWatchType($watchType);
        			$brick->setWaterproof($waterproof);
        			
        			$arr=[$watchType,$waterproof];
        			foreach($arr as $x){
    		 			if(empty($x) and $x!="0"){
    		  				$message.="$x is invalid ||";
    		  			}
    				}
				$product->getProductType()->setWatches($brick);
        		}
        	}//if message="" end here
       	
        	
        	
        	
        	if($message==""){
        	   	$product->setPublished(true);
        	 	$product->save();
        	 	
        	 }
        	 else{
        	 	$err.="Row No. $rowCount ERROR ".$message;
        	 	$errCount++;
        	 	
        	 }
        	$rowCount++;	
             }//endfor
        
 	     if($errCount==0){
 	        return $this->createSuccessResponse("inserted successfully", true);
 	     }
 	     else{	      
                return $this->createSuccessResponse( $err , false);
            }
          
      
    }
    
    
    
    ///////////////category get and post
    
    /**
      * @Route("/webservice/categories")
      * @Method({"GET"})
      * @param Request $request
      * @return \Symfony\Component\HttpFoundation\JsonResponse
      * @throws \Pimcore\Http\Exception\ResponseException
      * @throws \Exception
      */
    public function getCategoryList(Request $request, BruteforceProtectionHandler $bruteforceProtectionHandler)
    {   
        $data = [];
        $categories = new \Pimcore\Model\DataObject\Category\Listing();
        
        
        foreach ($categories as $category)
        {   
          
            $data[] = [
                'id' =>  $category->getId(),
                'parentid'=>$category->getParentId(),
                'key' =>  $category->getKey(),
                'categorySKU' =>  $category->getCategorySKU(),
                'categoryName' => $category->getName(),
                'description' => $category->getDescription(),
                'status' => $category->getStatus(), 
                'createdAt' => $category->getCreatedAt(), 
                'modifiedAt' => $category->getModifiedAt(), 
               
            ];
        }
        
       
       
            return $this->createSuccessResponse($data, true);
      
    }
    
   

   
}

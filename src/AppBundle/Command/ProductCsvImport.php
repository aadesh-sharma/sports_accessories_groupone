<?php

namespace AppBundle\Command;
use Pimcore\Mail;
use Pimcore\Console\AbstractCommand;
use Pimcore\Console\Dumper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputOption;
use Pimcore\Model\DataObject\Products;
use Pimcore\Model\DataObject\Category;
use Pimcore\Model\DataObject;
use Pimcore\Model\Document;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject\Data\BlockElement;
use Pimcore\Model\Notification\Service\NotificationService;
use Pimcore\Model\Notification\Service\UserService;

class ProductCsvImport extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('product:import')
            ->setDescription('import product')
            ->addOption('file', 'f', InputOption::VALUE_REQUIRED, 'enter file path');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {  
       ///*
       //log file name
       $name="csvlog.log";
       $logg= \Pimcore\Log\Simple::log($name,"===========================================================");
       // read csv file
      
	$file= $input->getOptions()['file'];
        $file=(PIMCORE_PROJECT_ROOT . '/web/var/assets/Csvfiles/'.$file);
       
        
        $csvFile = file($file);
        $data = [];
    	foreach ($csvFile as $line) {
        	$data[] = str_getcsv($line);
      
    	}
    	
    	$colName =array();
    	$rowcount=0;
    	$errcount=0;
    	foreach ($data as $row) {
            if($rowcount==0){
               
              for($i=0;$i<count($row);$i++){
    		  $colName[$i]=$row[$i];
    		}
    		
            }
            
            else{
                
    		$key = $row[0];
    		$productSKU = $row[1];
    		$category_id = $row[2];
    		$parentId = $row[3];
    		$productType = $row[4];        
    		$productName = $row[5];
    		$priceValue = $row[6];
    		$color = $row[7];
    		$discount = $row[8];
    		$brandName = $row[9];
    		$description = $row[10];
    		$ratings = $row[11];
    		$status = $row[12];
    		$productImage = $row[13];
    		$returnable = $row[14];
    		$warrantyValue = $row[15];
    		$warrantyUnit = $row[16];
    		$country = $row[17];
    		$manufacturedAt = $row[18];
    		//brick elements
    		$neckType = $row[19];
    		$material = $row[20];
    		$sleeveType = $row[21];
    		$size = $row[22];
    		$collar = $row[23];
    		$jacketType = $row[24];
    		$length = $row[25];
    		$height = $row[26];
    		$width = $row[27];
    		$bottomType = $row[28];
    		$capacity = $row[29];
    		$bagType = $row[30];
    		$waterproof = $row[31];
    		$bottleType = $row[32];
    		$glassType = $row[33];
    		$frameShape = $row[34];
    		$headwearType = $row[35];
    		$shoesType = $row[36];
    		$laces = $row[37];
    		$socksType = $row[38];
    		$watchType = $row[39];
	
    		$message="";
    		for($i=0;$i<=18;$i++){
    		 	
    		  	if($row[$i]!="0" && empty($row[$i])){
    		  		$message.="$colName[$i] is empty||";
    		  	}
    		}
    		
    		
    		if($message ==""){
        	 	// create product
        		$product = new \Pimcore\Model\DataObject\Products();
        	
        		//set key and sku
        		$product->setKey($key);
        	 
        		$product->setProductSKU($productSKU);
        		//$this->dump("key:  ".$key);
        	
        	
        	
        		//find category
        		$category =  \Pimcore\Model\DataObject\Category::getById($category_id);
        		if(!isset($category) ){$message.="category_id is invalid||";}
        		$product->setCategory_Id($category); 
        		//$this->dump("category:  ".$category);
        		
        		//parentid
        		$product->setParentId($parentId);
        		//$this->dump("parentId:  ".$parentId);
        	
        		//productname
        		$product->setProductName($productName);
        		//$this->dump("productName:  ".$productName);
        	
        		//price
        		$price = new \Pimcore\Model\DataObject\Data\QuantityValue($priceValue,"Rs");
        		if($priceValue<"0" ){$message.="priceValue is invalid||";}
        		$product->setPrice($price);
        		//$this->dump("price:  ".$price);
        	
        		//color
        		$clr = new \Pimcore\Model\DataObject\Data\RgbaColor();
      			$clr->setRgba($color);
        		$product->setColor($clr);
        		//$this->dump("color:  ".$color);
        	
        		//discount
        		$disc = new \Pimcore\Model\DataObject\Data\QuantityValue($discount,"Percentage");
        		if($discount<"0"){$message.="discount is invalid||";}
        		$product->setDiscount($disc);
        		//$this->dump("disc:  ".$disc);
        	
        		//brandname
        		$product->setBrandName($brandName);
        		//$this->dump("brandName:  ".$brandName);
        	
        		//description
        		$product->setDescription($description);
        		//$this->dump("description:  ".$description);
        	
        		//ratings
        		if($ratings<"0" && $ratings>"5"){$message.="ratings is invalid||";}
        		$product->setRatings($ratings);
        		//$this->dump("ratings:  ".$ratings);
        	
        		//status
        		$statusValid=["active","inactive"];
        		if(!in_array($status,$statusValid) ){$message.="status is invalid||";}
        		$product->setStatus($status);
        		//$this->dump("status:  ".$status);
        	
        		//image
        		$image = Asset\Image::getByPath("/".$productImage);
        		if(!isset($image) ){$message.="productImage is invalid||";}
        		$product->setProductImage($image);
        		//$this->dump("image:  ".$image);
        	
        		//returnable
        		$returnableValid=["1","0"];
        		if(!in_array($returnable,$returnableValid) ){$message.="returnable is invalid||";}
        		$product->setReturnable($returnable);
        		//$this->dump("returnable:  ".$returnable);
        	
        		//warranty
        		$warranty = new \Pimcore\Model\DataObject\Data\QuantityValue($warrantyValue,$warrantyUnit);
        		if(!isset($warranty) ){$message.="warranty is invalid||";}
        		$product->setWarranty($warranty);
        		//$this->dump("warranty:  ".$warranty);
        	
        		//country
        		$countryValid=["India","USA"];
        		if(!in_array($country,$countryValid) ){$message.="country is invalid||";}
        		$product->setCountry($country);
       	 	//$this->dump("country:  ".$country);
        	
        		//ManufacturedAt
        		$date = \Carbon\Carbon::parse($manufacturedAt);
        		if(!isset($date ) ){$message.="manufacturedAt is invalid||";}
        		$product->setManufacturedAt($date);
        		//$this->dump("date:  ".$date);
        	
        	
        	
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
    			 		if(empty($x)){
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
    		 			if(empty($x)){
    		  				$message.="$x is invalid ||";
    		  			}
    				}
				$product->getProductType()->setWatches($brick);
        		}
        	
       	}  //$message=="" if condition ends here
        	
        	
        	 $this->dump("#############");
        	 
        	 
        	 //if no error then save else save log messages 
        	 if($message==""){
        	   	$product->setPublished(true);
        	 	$product->save();
        	 	$message.=" STATUS : ROW NUMBER->$rowcount imported succesfully";
        	 	$logg= \Pimcore\Log\Simple::log($name, $message);
        	 	$this->dump($message);
        	 	
        	 }else{
        	        $err=$message;
        	        $errcount++;
        	 	$message="STATUS : ROW NUMBER->$rowcount ERROR \n";
        	 	$message.=$err;
        	 	$logg= \Pimcore\Log\Simple::log($name, $message);
        	 	$this->dump($message);
        	 }
        	 
        	
           }
           
           $rowcount++;
           
    	}
    	
    	
    	//send notification to business user
    	$user=new \Pimcore\Model\Notification\Service\UserService();
        $notificationService=new \Pimcore\Model\Notification\Service\NotificationService($user);
    	if($errcount>0){
    	 	$notificationService->sendToUser(5,2, 'Import failed','Some error has occured check logs in /var/logs/csvlog.log');
        }else{
        	$notificationService->sendToUser(5,2, 'Import Success','csv file imported successfully');
        }					 
        

        
        $this->dump("saved");
       //*/
    }
    
}

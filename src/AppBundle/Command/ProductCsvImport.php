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
       // read csv file
      
	$file= $input->getOptions()['file'];
        $file=(PIMCORE_PROJECT_ROOT . '/web/var/assets/Csvfiles/'.$file);
       
        
        $csvFile = file($file);
        $data = [];
    	foreach ($csvFile as $line) {
        	$data[] = str_getcsv($line);
      
    	}
    	
    	
    	$count=0;
    	foreach ($data as $row) {
            if($count!=0){
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
	
    		
    		
        	 // create product
        	$product = new \Pimcore\Model\DataObject\Products();
        	
        	//set values
        	$product->setKey($key); 
        	$product->setProductSKU($productSKU);
        	$this->dump("key:  ".$key);
        	$this->dump("sku:  ".$productSKU);
        	
        	
        	//find category
        	$category =  \Pimcore\Model\DataObject\Category::getById($category_id);
        	$product->setCategory_Id($category); 
        	$this->dump("category:  ".$category);
        	
        	//parentid
        	$product->setParentId($parentId);
        	$this->dump("parentId:  ".$parentId);
        	
        	//productname
        	$product->setProductName($productName);
        	$this->dump("productName:  ".$productName);
        	
        	//price
        	$price = new \Pimcore\Model\DataObject\Data\QuantityValue($priceValue,"Rs");
        	$product->setPrice($price);
        	$this->dump("price:  ".$price);
        	
        	//color
        	$color = new \Pimcore\Model\DataObject\Data\RgbaColor();
      		$color->setRgba($color);
        	$product->setColor($color);
        	$this->dump("color:  ".$color);
        	
        	//discount
        	$disc = new \Pimcore\Model\DataObject\Data\QuantityValue($discount,"Percentage");
        	$product->setDiscount($disc);
        	$this->dump("disc:  ".$disc);
        	
        	//brandname
        	$product->setBrandName($brandName);
        	$this->dump("brandName:  ".$brandName);
        	
        	//description
        	$product->setDescription($description);
        	$this->dump("description:  ".$description);
        	
        	//ratings
        	$product->setRatings($ratings);
        	$this->dump("ratings:  ".$ratings);
        	
        	//status
        	$product->setStatus($status);
        	$this->dump("status:  ".$status);
        	
        	//image
        	$image = Asset\Image::getByPath("/".$productImage);
        	$product->setProductImage($image);
        	$this->dump("image:  ".$image);
        	
        	//returnable
        	$product->setReturnable($returnable);
        	$this->dump("returnable:  ".$returnable);
        	
        	//warranty
        	$warranty = new \Pimcore\Model\DataObject\Data\QuantityValue($warrantyValue,$warrantyUnit);
        	$product->setWarranty($warranty);
        	$this->dump("warranty:  ".$warranty);
        	
        	//country
        	$product->setCountry($country);
        	$this->dump("country:  ".$country);
        	
        	//ManufacturedAt
        	$date = \Carbon\Carbon::parse($manufacturedAt);
        	$product->setManufacturedAt($date);
        	$this->dump("date:  ".$date);
        	
        	//productype //bricks
        	
        	//tshirt
        	if($productType=="tshirt"){
        		$brick = new DataObject\Objectbrick\Data\Tshirt($product);
        		$brick->setNeckType($neckType);
        		$brick->setMaterial($material);
        		$brick->setSize($size);
        		$brick->setSleeveType($sleeveType);
        		
        		$this->dump("tshirt: ");
        		//$this->dump($brick);
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
        		
        		$this->dump("bag: ");
        		//$this->dump("bag:  ".$brick);
			$product->getProductType()->setBag($brick);
        	}
        	
        	
        	//bottle
        	if($productType=="bottle"){
        		$brick = new DataObject\Objectbrick\Data\Bottle($product);
        		$cap = new \Pimcore\Model\DataObject\Data\QuantityValue($capacity,"ltr");
        		
        		$brick->setCapacity($cap);
        		$brick->setBottleType($bottleType);
        		$brick->setMaterial($material);
        		
        		$this->dump("bottle: ");
        		//$this->dump("bottle:  ".$brick);
			$product->getProductType()->setBottle($brick);
        	}
        	
        	
        	//Glasses
        	if($productType=="glasses"){
        		$brick = new DataObject\Objectbrick\Data\Glasses($product);
        		$brick->setGlassType($glassType);
        		$brick->setFrameShape($frameShape);
        		
        		$this->dump("glasses: ");
        		//$this->dump("glasses:  ".$brick);
			$product->getProductType()->setGlasses($brick);
        	}
        	
        	
        	//Headwear
        	if($productType=="headwear"){
        		$brick = new DataObject\Objectbrick\Data\Headwear($product);
        		$brick->setHeadwearType($headwearType);
        		$brick->setSize($size);
        		
        		$this->dump("headwear: ");
        		//$this->dump("headwear:  ".$brick);
			$product->getProductType()->setHeadwear($brick);
        	}
        	
        	//Jacket
        	if($productType=="jacket"){
        		$brick = new DataObject\Objectbrick\Data\Jacket($product);
        		$brick->setJacketType($jacketType);
        		$brick->setSize($size);
        		$brick->setMaterial($material);
        		
        		$this->dump("jacket: ");
        		//$this->dump("jacket:  ".$brick);
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
        		
        		$this->dump("pants: ");
        		//$this->dump("pants:  ".$brick);
			$product->getProductType()->setPants($brick);
        	}
        	
        	
        	
        	//shoes
        	if($productType=="shoes"){
        		$brick = new DataObject\Objectbrick\Data\Shoes($product);
        		$brick->setShoesType($shoesType);
        		$brick->setLaces($laces);
        		$brick->setSize($size);
        		$brick->setMaterial($material);
        		
        		$this->dump("shoes: ");
        		//$this->dump("shoes:  ".$brick);
			$product->getProductType()->setShoes($brick);
        	}
        	
        	
        	//socks
        	if($productType=="socks"){
        		$brick = new DataObject\Objectbrick\Data\Socks($product);
        		$brick->setSocksType($socksType);
        		$brick->setSize($size);
        		$brick->setMaterial($material);
        		
        		$this->dump("socks: ");
        		//$this->dump("socks:  ".$brick);
			$product->getProductType()->setSocks($brick);
        	}
        	
        	
        	//watches
        	if($productType=="watches"){
        		$brick = new DataObject\Objectbrick\Data\Watches($product);
        		$brick->setWatchType($watchType);
        		$brick->setWaterproof($waterproof);
        		
        		$this->dump("watches: ");
        		//$this->dump("watches:  ".$brick);
			$product->getProductType()->setWatches($brick);
        	}
        	
        	$product->setPublished(true);
        	$product->save();
        	 $this->dump("");
        	 $this->dump("#############");
           }
           
           if($count==0){
           $count++;
           }
    	}
    	
        
        $this->dump("saved");
      // */
    }
    
}

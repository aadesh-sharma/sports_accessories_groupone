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

class CategoryCsvImport extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('category:import')
            ->setDescription('import category')
            ->addOption('file', 'f', InputOption::VALUE_REQUIRED, 'enter file path');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {  
        //log file name
       $name="categorycsvlog.log";
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
    		$categorySKU = $row[1];
    		$parentId = $row[2];       
    		$productName = $row[3];
    		$description = $row[4];
    		$status = $row[5];
    		$createdAt= $row[6];
    		$modifiedAt= $row[7];
               
               $message="";
    		for($i=0;$i<=7;$i++){
    		 	
    		  	if($row[$i]!="0" && empty($row[$i])){
    		  		$message.="$colName[$i] is empty||";
    		  	}
    		}
    		
    		if($message ==""){
        	 	// create product
        		$category = new \Pimcore\Model\DataObject\Category();
        	
        		$category->setParentId($parentId);
                       $category->setKey($key);
                       $category->setCategorySKU($categorySKU);
                       $category->setName($productName);
                       $category->setDescription($description);
                       $category->setStatus($status);
                       $cd = \Carbon\Carbon::parse($createdAt);
                       $category->setCreatedAt($cd); 
                       $md = \Carbon\Carbon::parse($modifiedAt);
                       $category->setModifiedAt($md); 
        	         
        	         //if no error then save else save log messages 
        	 
        	   	$category->setPublished(true);
        	 	$category->save();
        	 	$message.=" STATUS : ROW NUMBER->$rowcount imported succesfully";
        	 	$logg= \Pimcore\Log\Simple::log($name, $message);
        	 	$this->dump($message);
        	 	
        	    }
        	   else{
        	        $err=$message;
        	        $errcount++;
        	 	$message="STATUS : ROW NUMBER->$rowcount ERROR \n";
        	 	$message.=$err;
        	 	$logg= \Pimcore\Log\Simple::log($name, $message);
        	 	$this->dump($message);
        	 
        	    }
        	
                }
           $rowcount++;
         }//endfor
         
         //send notification to business user
    	$user=new \Pimcore\Model\Notification\Service\UserService();
        $notificationService=new \Pimcore\Model\Notification\Service\NotificationService($user);
    	if($errcount>0){
    	 	$notificationService->sendToUser(5,2, 'Import failed','Some error has occured check logs in /var/logs/csvlog.log');
        }else{
        	$notificationService->sendToUser(5,2, 'Import Success','csv file imported successfully');
        }					 
        

         
     }

}

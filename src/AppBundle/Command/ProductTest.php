<?php

namespace AppBundle\Command;

use Pimcore\Model\Notification\Service\NotificationService;

use Pimcore\Model\Notification\Service\UserService;
use Pimcore\Mail;
use Pimcore\Console\AbstractCommand;
use Pimcore\Console\Dumper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputOption;
use Pimcore\Model\DataObject\Products;
use Pimcore\Model\DataObject;
use Pimcore\Model\Document;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject\Data\BlockElement;

class ProductTest extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('product:test')
            ->setDescription('test product');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {  
        $products = new \Pimcore\Model\DataObject\Products\Listing();
        
        foreach($products as $x){
        
          $this->dump("##########");
             $this->dump($x->getKey());
             $this->dump($x->getProductSKU());
             $this->dump($x->getCategory_Id()->getName());
             $this->dump($x->getParentId());
             $this->dump($x->getProductName());
             $this->dump($x->getPrice()->getValue());
             $this->dump($x->getColor()->getHex(true,true));//
             $this->dump($x->getDiscount()->getValue());
             $this->dump($x->getBrandName());
             $this->dump($x->getDescription());
             $this->dump(($x->getRatings()));
             $this->dump($x->getStatus());
             $this->dump($x->getProductImage()->getPath());
             $this->dump($x->getReturnable());
             $this->dump($x->getWarranty()->getValue());
             $this->dump($x->getCountry());
             $this->dump($x->getManufacturedAt());
             $this->dump($x->getProductType()->getTshirt()->getType());
             
             
          break;
             
        }
        
        $this->dump("hiii");
          
    }
}






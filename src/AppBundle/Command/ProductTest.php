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
        $products = new \Pimcore\Model\DataObject\Category\Listing();
        
        foreach($products as $x){
        
          $this->dump("##########");
             $this->dump($x->getCreatedAt());
             
             
             
          break;
             
        }
        
        $this->dump("hiii");
          
    }
}






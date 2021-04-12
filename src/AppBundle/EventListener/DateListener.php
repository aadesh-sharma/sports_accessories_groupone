<?php
namespace AppBundle\EventListener;

 use Pimcore\Model\DataObject\Products;
use Pimcore\Event\Model\ElementEventInterface;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Event\Model\AssetEvent;
use Pimcore\Event\Model\DocumentEvent;
use Pimcore\Model\Element\ValidationException;


class DateListener {
     
    public function onPreUpdate (ElementEventInterface $e) {
       
        
            if ($e->getObject() instanceof Products) {
                $product = $e->getObject();
                
                //manufactured date should not after today's date
                if ($product->getManufacturedAt() > date("Y-m-d")) {
                
                    $excep = new \Pimcore\Model\Element\ValidationException();
                    $excep->setSubItems("anufactured Date can only be before or same as Today's date");
                        throw new \Pimcore\Model\Element\ValidationException("Manufactured Date can only be before or same as Today's date");
                }
                
                //price can not be negative
                
                if ($product->getPrice()->getValue() < 0) {
                    throw new \Pimcore\Model\Element\ValidationException("Price can not be negative");
                }
                
                // Product sku can not be negative
                if ($product->getProductSKU() < 0) {
                    throw new \Pimcore\Model\Element\ValidationException("Productsku can not be negative");
                }
                
                //Discount can not be negative
                if ($product->getDiscount()->getValue() < 0) {
                    throw new \Pimcore\Model\Element\ValidationException("Discount can not be negative");
                }
                
                //Warranty can not be negative
                if ($product->getWarranty()->getValue() < 0) {
                    throw new \Pimcore\Model\Element\ValidationException("Warranty can not be negative");
                }
               
            }
            
         
    }
}

<?php

namespace AppBundle\OptionProvider;

use Pimcore\Model\DataObject\Product;
use Pimcore\Model\DataObject\Category;
use Pimcore\Model\DataObject\Category\Listing;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;


class CountryOptions implements SelectOptionsProviderInterface
{
    /**
     * @param array $context 
     * @param Data $fieldDefinition 
     * @return array
     */
    public function getOptions($context, $fieldDefinition) {
    
       
        $objects= array("India","USA");
       
        $result = array();
    
        foreach($objects as $object){
            array_push($result, ["key"=>$object, "value"=>$object]);
        }
        return $result;
        
   
      
        /*
        $object = isset($context["object"]) ? $context["object"] : null;
        $fieldname = "id: " . ($object ? $object->getId() : "unknown") . " - " .$context["fieldname"];
        $result = array(

            array("key" => $fieldname .' == A', "value" => 2),
            array("key" => $fieldname .' == C', "value" => 4),
            array("key" => $fieldname .' == B', "value" => 5)

        );
       
        
        
        return $result;
            */
    }

    /**
     * Returns the value which is defined in the 'Default value' field  
     * @param array $context 
     * @param Data $fieldDefinition 
     * @return mixed
     */
    public function getDefaultValue($context, $fieldDefinition) {
        return $fieldDefinition->getDefaultValue();
    }

    /**
     * @param array $context 
     * @param Data $fieldDefinition 
     * @return bool
     */
    public function hasStaticOptions($context, $fieldDefinition) {
        return true;
    }
//9310404238
}

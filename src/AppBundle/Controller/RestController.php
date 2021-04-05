<?php

namespace AppBundle\Controller;

use Pimcore\Bundle\AdminBundle\Controller\Rest\AbstractRestController;
use Pimcore\Bundle\AdminBundle\HttpFoundation\JsonResponse;
use Pimcore\Bundle\AdminBundle\Security\BruteforceProtectionHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Pimcore\Model\DataObject\Product;
use Pimcore\Model\Asset\MetaData\ClassDefinition\Data\Asset;
use Pimcore\Model\DataObject\Category;


/**
 * Class RestController
 * @package AppBundle\Controller
 */

 class RestController extends AbstractRestController
 {
     CONST BASE_API_SERVICE = 'base_api_service';

     /**
      * @Route("/webservice/products")
      * @Method({"POST"})
      * @param Request $request
      * @return \Symfony\Component\HttpFoundation\JsonResponse
      * @throws \Pimcore\Http\Exception\ResponseException
      * @throws \Exception
      */
    public function getProductList(Request $request, BruteforceProtectionHandler $bruteforceProtectionHandler)
    {   
    
    /*
           
       // read json from request
      
       
       $json = file_get_contents($request);
       $data = json_decode($json);
    
       foreach($data as $row){
       
       }
        
           
        
        
        
       
            return $this->createSuccessResponse($data, true);
            
            */
      
    }
    
    
    

   
}

<?php

namespace AppBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Zend\Paginator\Paginator;

class ContentController extends FrontendController
{
    public function defaultAction(Request $request)
    {
    
    	

    }
    
    public function homeAction(Request $request)
    {
    
    	

    }
    
    public function productAction(Request $request)
    {
    	$this->view->ta=5;
    	
    	//$products = new \Pimcore\Model\DataObject\Products\Listing();  
        //$products->setLimit($per_page_record);
        //$this->view->products=$products;
        
        //$paginator = new Paginator($products);
        //$paginator->setItemCountPerPage(self::per_page_record);
        //$paginator->setCurrentPageNumber($page);


        //$this->view->paginator = $paginator;
        
    }
    
    public function detailAction(Request $request)
    {
    
    	//$feedback = new \Pimcore\Model\DataObject\Feedback();
    	//$this->view->feedback=$feedback;
    	

    }
    
    public function formAction(Request $request)
    {
    
    	//$feedback = new \Pimcore\Model\DataObject\Feedback();
    	//$this->view->feedback=$feedback;
    	

    }
}

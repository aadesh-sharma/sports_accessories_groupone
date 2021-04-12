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
        
        foreach($products as $k=>$v){
        
          $this->dump("##########");
          $this->dump($k);
          
             
          
             
        }
        $currentUser = \Pimcore\Tool\Admin::getCurrentUser()->admin();
        $this->dump("$currentUser");
          
    }
    /*
      
<?php     
            	   $products = new \Pimcore\Model\DataObject\Products\Listing();
    		foreach($products as $val=>$product)
    		{
	?>
  	<!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-lg-4 col-md-12 mb-4">
        <!-- Card -->
        <div class="card card-cascade wider card-ecommerce">
          <!-- Card image -->
          <div class="view view-cascade overlay">
        <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img (55).jpg" class="card-img-top"
              alt="sample photo">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!-- Card image -->
          <!-- Card content -->
          <div class="card-body card-body-cascade text-center pb-0">
            <!-- Title -->
            <h5 class="card-title">
              <strong>
             <?php echo'<a href=""> '.$product->getProductName ().' </a>'; ?>
              </strong>
            </h5>
            <!-- Description -->
            <p class="card-text"><?php echo $product->getdescription () ;  ?></p>
            <!-- Card footer -->
            <div class="card-footer mt-4">
              <p class="float-left font-weight-bold mb-1 pb-2"><?php echo $product->getprice () ;  ?></p>
              <a class="float-right material-tooltip-main" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                <i class="fas fa-heart grey-text ml-3"></i>
              </a>
              <a class="float-right material-tooltip-main" data-toggle="tooltip" data-placement="top" title="Quick Look">
                <i class="fas fa-eye grey-text ml-3"></i>
              </a>
            </div>
          </div>
          <!-- Card content -->
        </div>
        <!-- Card -->
      </div>
      <!-- Grid column -->
    </div>
    <!-- Grid row -->

  </section>
  <!--Section: Content-->

<?php
}?>



</div>


   
   function addRow(l) {
       
        var table = document.getElementById("myTable");

// Create an empty <tr> element and add it to the 1st position of the table:
        for (var r=0;r<l.length;r++) {
                 var row = table.insertRow(r);
                 for (var c=0;c<=38; c++) {
                    var cell1 = row.insertCell(c);
                     cell1.innerHTML = l[r]['key'];
		  
               }
            }
      }


*/
}






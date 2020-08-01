<?php
namespace Feigal\ProductFinder\Controller\Index;

/*
 * Sample: https://www.codextblog.com/magento-2/how-to-render-an-html-using-an-ajax-call-in-magento-2-module/
 */

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory; //returns JSON response from controller.

class Data extends Action
{

	/*
	 * I need to get the ajax values
	 * lowprice
	 * highprice
	 * order
	 *
	 * then search for 10 products that meet the above values
	 * send that collection to the block.
	 */
	
    /*
     Calls new template */

	public function execute() { 
  
	    $this->_view->loadLayout(); 
	    $this->_view->renderLayout(); 
	} 

	

}
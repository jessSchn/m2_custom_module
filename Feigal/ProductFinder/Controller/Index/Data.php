<?php
	/*
	 * PartFinder Controller
	 * Created by Jessica Feigal <mrs.feigal@gmail.com>
	 * Date: 7/29/2020
	 * Example: https://www.codextblog.com/magento-2/how-to-render-an-html-using-an-ajax-call-in-magento-2-module/
	 */

	namespace Feigal\ProductFinder\Controller\Index;

	use Magento\Framework\App\Action\Action;
	use Magento\Framework\App\Action\Context;
	use Magento\Framework\Controller\Result\JsonFactory;

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
		
	    /* Calls new template - To be updated with something else */

		public function execute() { 
	  
		    $this->_view->loadLayout(); 
		    $this->_view->renderLayout(); 
		} 
	}

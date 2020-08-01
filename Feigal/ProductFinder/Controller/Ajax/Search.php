<?php
	/*
	 * PartFinder Controller
	 * Created by Jessica Feigal <mrs.feigal@gmail.com>
	 * Date: 7/29/2020
	 * Example: https://www.codextblog.com/magento-2/how-to-render-an-html-using-an-ajax-call-in-magento-2-module/
	 */

	namespace Feigal\ProductFinder\Controller\Ajax;

	use Magento\Framework\App\Action\Action;
	use Magento\Framework\App\Action\Context;
	use Magento\Framework\Controller\Result\JsonFactory;
	use Magento\Framework\View\Result\PageFactory;

	class Search extends Action
	{
	    /**
	     * @var PageFactory
	     */
	    protected $_resultPageFactory;
	 
	    /**
	     * @var JsonFactory
	     */
	    protected $_resultJsonFactory;
	 
	 
	    /**
	     * View constructor.
	     * @param Context $context
	     * @param PageFactory $resultPageFactory
	     * @param JsonFactory $resultJsonFactory
	     */
	    public function __construct(
	    	Context 	$context, 
	    	PageFactory $resultPageFactory, 
	    	JsonFactory $resultJsonFactory
	    	)
		    {
		 
		        $this->_resultPageFactory = $resultPageFactory;
		        $this->_resultJsonFactory = $resultJsonFactory;
		        parent::__construct($context);
		    }

	    /**
	     * @return \Magento\Framework\Controller\Result\Json
	     */
	    
		public function execute() { 

			$result = $this->_resultJsonFactory->create();
	        $resultPage = $this->_resultPageFactory->create();

	        $data = $this->getRequest()->getParams(); //ajax data
	  
		    $block = $resultPage->getLayout()
	            ->createBlock('Feigal\ProductFinder\Block\Index\View')
	            ->setTemplate('Feigal_ProductFinder::results.phtml')
	            ->setData('data',$data)
	            ->toHtml();

	        $result->setData(['output' => $block]);
	        return $result;
		} 
	}
<?php
/*
 * PartFinder Block
 * Created by Jessica Feigal <mrs.feigal@gmail.com>
 * Date: 7/29/2020
 */

namespace Feigal\ProductFinder\Block\Index;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollection;

class View extends Template
{
    protected $product_collection;
    
    public function __construct(
        ProductCollection $product_collection
        Context $context,
        array $data = []
    ) {
        $this->product_collection = $product_collection;
        parent::__construct($context, $data);

        $writer        = new Stream(BP . '/var/log/culligan_dealer.log');
        $this->_logger = new Logger();
        $this->_logger->addWriter($writer);
    }
    
    public function getProducts()
    {
        $data = $this->getRequest()->getParams();
        try {
        $products = $this->product_collection->create()
             ->addAttributeToFilter('price', [
                        ['gteq' => $data['lowprice'], 'lteq' => $data['highprice']]
                    ]
                )
              ->order('price', $data['order');
         }
         catch(\Exception $e) {
             return false;
         }
                                     return $products;
    }

}
    

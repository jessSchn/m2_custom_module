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
use Magento\CatalogInventory\Model\Stock\StockItemRepository;

class View extends Template
{
    protected $stock_item;
    protected $product_collection;

    public function __construct(
        ProductCollection $product_collection,
        StockItemRepository $stock_item,
        Context $context,
        array $data = []
    ) {
        $this->stock_item = $stock_item;
        $this->product_collection = $product_collection;
        parent::__construct($context, $data);
    }

    /**
     * @return $prodcuts
     */
    public function getProducts()
    {
        $data = $this->getRequest()->getParams();
        try {
            $products = $this->product_collection->create()
                             ->addAttributeToFilter('price', ['gteq' => $data['lowprice']])
                             ->addAttributeToFilter('price', ['lteq' => $data['highprice']])
                             ->setOrder('price', $data['order'])
                             ->setPageSize(10);

        } catch (\Exception $e) {
            return false;
        }
        return $products;
    }

    public function getStock($pid)
    {
        try {
            $stock = $this->stock_item->get($pid);
            return $stock->getQty();
        }
        catch(\Exception $e) {
            return 0;
        }

    }

}
    
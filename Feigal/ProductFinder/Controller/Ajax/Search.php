<?php
namespace Feigal\ProductFinder\Controller\Ajax;

class Search extends AbstractController
{
    public function execute()
    {
        $block = $this->_view->getLayout()
                             ->createBlock('\Feigal\ProductFinder\Block\Index\View')
                             ->setTemplate('Feigal_ProductFinder::results.phtml')
                             ->toHtml();
        $this->getResponse()->setBody($block);
    }
}
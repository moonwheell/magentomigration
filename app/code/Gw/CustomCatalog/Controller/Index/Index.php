<?php
namespace Gw\CustomCatalog\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
//        echo '<pre>';
//        var_dump(123);
//        echo '</pre>';
//        die;

        return $this->_pageFactory->create();
    }
}
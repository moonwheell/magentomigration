<?php

namespace Gwd\CustomCatalog\Model;
use Gwd\CustomCatalog\Api\TestapiManagementInterface;

class TestapiManagement implements TestapiManagementInterface
{

    public function name($name)
    {

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');

        $collection = $productCollection->create()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter(
                   "sku", array("eq" => "$name"))
            ->load();

        echo $collection->getSelect();

        die;
    }
}



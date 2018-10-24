<?php

namespace Gwd\CustomCatalog\Model;
use Gwd\CustomCatalog\Api\CustomCatalogApiInterface;

class CustomCatalogApi implements CustomCatalogApiInterface
{

    public function name($name)
    {

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');

        $collection = $productCollection->create();

        $collection->addAttributeToSelect('name');
        $collection->addAttributeToFilter("sku", array("eq" => "$name"));
        $collection->load();

        $result = [];

        foreach($collection as $attributes)
        {
            $result[] = $attributes->getName();
        }

        return json_encode($result);

    }
}



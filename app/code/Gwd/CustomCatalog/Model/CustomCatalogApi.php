<?php

namespace Gwd\CustomCatalog\Model;
use Gwd\CustomCatalog\Api\CustomCatalogApiInterface;


class CustomCatalogApi implements CustomCatalogApiInterface
{

    public function getByVPN($vpn)
    {

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');

        $collection = $productCollection->create()
            ->addAttributeToSelect('*')
//            ->addFieldToFilter("vpn", array("eq" => "$vpn"))
            ->load() ;

        $result = [];
//        echo '<pre>';
//        var_dump($collection);
//        echo '</pre>';
//        die;



        foreach($collection as $attributes)
        {
            $result[] = $attributes->getData('vpn');
            echo '<pre>';
            var_dump($attributes);
            echo '</pre>';
            die;

        }

        return json_encode($result);

    }
}



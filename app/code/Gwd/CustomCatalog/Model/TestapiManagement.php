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
//        foreach ($collection as $product){
//            echo 'Name  =  '.$product->getName().'<br>';
//        }
////
//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//        $collection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection');
//        $productcollection =
//            $collection->getCollection()->addAttributeToSelect('*')
//                ->addAttributeToFilter(
//                    "sku", array("eq" => "$name")
//                )->load();
//
//
//
//        echo $productcollection->getSelect();

    }

}

/*
$model = $this->_objectManager->create(\Magento\Catalog\Model\Product::class);
$model->load($name);
if ($name) {
    foreach ($model as $sku){
        echo 'SKU ='.$sku->getsku().'<br>';
    }

}
return "Hello, " . $name;*/

//    public function name($name)
//    {
//
//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//
//        $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');
//
//        $collection = $productCollection->create()->load($name);
//
//        foreach ($collection as $product) {
//            echo 'SKU  =  ' . $product->getSku() . '<br>';
//        }
//
//    }
//


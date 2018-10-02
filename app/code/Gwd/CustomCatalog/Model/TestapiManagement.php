<?php

namespace Gwd\CustomCatalog\Model;
use Gwd\CustomCatalog\Api\TestapiManagementInterface;

class TestapiManagement implements TestapiManagementInterface
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $name Users name.
     * @return string Greeting message with users name.
     */
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


    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @var \Magento\Framework\Api\FilterBuilder
     */
    protected $filterBuilder;

    /**
     * @var \Magento\Framework\Api\Search\FilterGroup
     */
    protected $filterGroup;

    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Framework\Api\Search\FilterGroup $filterGroup)
    {
        $this->productRepository = $productRepository;
        $this->searchCriteria = $searchCriteria;
        $this->filterBuilder = $filterBuilder;
        $this->filterGroup = $filterGroup;
    }

    /**
     * {@inheritdoc}
     */
    public function name($name)
    {
        $this->filterGroup->setFilters([
            $this->filterBuilder->setField('url_key')->setConditionType('eq')
                ->setValue($name)->create()]);
        $this->searchCriteria->setFilterGroups([$this->filterGroup]);
        $products = $this->productRepository->getList($this->searchCriteria);
        if (count($products) == 0) {
            return null;
        }
        $items = $products->getItems();
        foreach ($items as $item) {
            return $item;
        }
    }

    /**
     * {@inheritdoc}
     */
//    public function getProductById($id)
//    {
//        return $this->productRepository->getById($id);
//    }

}

/**
 *
 *
 *
 *
 *
 *
 */
/*
$model = $this->_objectManager->create(\Magento\Catalog\Model\Product::class);
$model->load($name);
if ($name) {
    foreach ($model as $sku){
        echo 'SKU ='.$sku->getsku().'<br>';
    }

}
return "Hello, " . $name;*/


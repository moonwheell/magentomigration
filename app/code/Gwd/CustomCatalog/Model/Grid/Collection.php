<?php

namespace Gwd\CustomCatalog\Model\Grid;

use Magento\Eav\Api\AttributeRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Product\Collection as GridCollection;
use Magento\Store\Model\StoreManagerInterface;
use Psr\Log\LoggerInterface;

use Magento\Framework\{
    Data\Collection\EntityFactory,
    Data\Collection\Db\FetchStrategyInterface,
    Event\ManagerInterface,
    Model\ResourceModel\Db\AbstractDb,
    Api\Search\AggregationInterface,
    Api\Search\SearchResultInterface
};


/**
 * Class Collection
 * Collection for displaying grid
 */
class Collection extends GridCollection implements SearchResultInterface
{
    protected $aggregations;

    /**
     * @param AttributeRepositoryInterface $attributeRepository
     * @param EntityFactory $entityFactory
     * @param LoggerInterface $logger
     * @param FetchStrategyInterface $fetchStrategy
     * @param ManagerInterface $eventManager
     * @param StoreManagerInterface $storeManager
     * @param mixed|null $mainTable
     * @param $eventPrefix
     * @param $eventObject
     * @param mixed $resourceModel
     * @param string $model
     * @param null $connection
     * @param AbstractDb|null $resource
     */

    public function __construct(

        EntityFactory $entityFactory,
//        AttributeRepositoryInterface $attributeRepository,
        LoggerInterface $logger,
        FetchStrategyInterface $fetchStrategy,
        ManagerInterface $eventManager,
        StoreManagerInterface $storeManager,
        $mainTable,
        $eventPrefix,
        $eventObject,
        $resourceModel,
        $model = \Magento\Framework\View\Element\UiComponent\DataProvider\Document::class,
        $connection = null,
        AbstractDb $resource = null
    )

    {
        parent::__construct(
            $entityFactory,
//            $attributeRepository,
            $logger,
            $fetchStrategy,
            $eventManager,
            $connection,
            $resource
        );

        $this->_eventPrefix = $eventPrefix;
        $this->_eventObject = $eventObject;
        $this->_init($model, $resourceModel);
        $this->setMainTable($mainTable);
    }


    protected function _initSelect()
    {
//        $this->getSelect()
//            ->from(
//                ['product_entity' => $this->getTable('catalog_product_entity')],
//                ['sku', 'type_id', 'product_id' => 'product_entity.entity_id']
//            )
//            ->joinLeft(
//                ['cpw' => $this->getTable('catalog_product_website')],
//                'product_entity.entity_id = cpw.product_id ',
//                ['website_id']
//            )
//            ->joinLeft(
//                ['product_varchar' => $this->getTable('catalog_product_entity_varchar')],
//                'product_entity.entity_id = product_varchar.entity_id AND product_varchar.store_id =0 ',
//                ['product_name' => 'product_varchar.value']
//            )
//            ->joinLeft(
//                ['main_table' => $this->getMainTable()],
//                'main_table.product_id=product_entity.entity_id AND main_table.website_id=cpw.website_id ',
//                ['setting_id', 'is_not_allow_ups_access', 'additional_shipping_cost'])
//            ->where('product_varchar.attribute_id = ? ', $this->_getAttributeId('name'))
//            ->where('product_entity.type_id="simple" OR product_entity.type_id="virtual"');
//
//        $this->addFilterToMap('sku', 'product_entity.sku');
//        $this->addFilterToMap('product_name', 'product_varchar.value');
//        $this->addFilterToMap('website_id', 'cpw.website_id');
//        $this->addFilterToMap('type_id', 'product_entity.type_id');

        return $this;
    }

    /**
     * @return AggregationInterface
     */
    public function getAggregations()
    {
        return $this->aggregations;
    }

    /**
     * @param AggregationInterface $aggregations
     *
     * @return $this
     */
    public function setAggregations($aggregations)
    {
        $this->aggregations = $aggregations;
    }

    /**
     * Get search criteria.
     *
     * @return \Magento\Framework\Api\SearchCriteriaInterface|null
     */
    public function getSearchCriteria()
    {
        return null;
    }

    /**
     * Set search criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     *
     * @return $this
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function setSearchCriteria(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria = null
    )
    {
        return $this;
    }

    /**
     * Get total count.
     *
     * @return int
     */
    public function getTotalCount()
    {
        return $this->getSize();
    }

    /**
     * Set total count.
     *
     * @param int $totalCount
     *
     * @return $this
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function setTotalCount($totalCount)
    {
        return $this;
    }

    /**
     * Set items list.
     *
     * @param \Magento\Framework\Api\ExtensibleDataInterface[] $items
     *
     * @return $this
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function setItems(array $items = null)
    {
        return $this;
    }
}
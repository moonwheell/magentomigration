<?php


namespace Gwd\CustomCatalog\Model;

use Gwd\CustomCatalog\Api\GwcatalogRepositoryInterface;
use Gwd\CustomCatalog\Api\Data\GwcatalogSearchResultsInterfaceFactory;
use Gwd\CustomCatalog\Api\Data\GwcatalogInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Gwd\CustomCatalog\Model\ResourceModel\Gwcatalog as ResourceGwcatalog;
use Gwd\CustomCatalog\Model\ResourceModel\Gwcatalog\CollectionFactory as GwcatalogCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

class GwcatalogRepository implements GwcatalogRepositoryInterface
{

    protected $resource;

    protected $gwcatalogFactory;

    protected $gwcatalogCollectionFactory;

    protected $searchResultsFactory;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $dataGwcatalogFactory;

    private $storeManager;

    /**
     * @param ResourceGwcatalog $resource
     * @param GwcatalogFactory $gwcatalogFactory
     * @param GwcatalogInterfaceFactory $dataGwcatalogFactory
     * @param GwcatalogCollectionFactory $gwcatalogCollectionFactory
     * @param GwcatalogSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourceGwcatalog $resource,
        GwcatalogFactory $gwcatalogFactory,
        GwcatalogInterfaceFactory $dataGwcatalogFactory,
        GwcatalogCollectionFactory $gwcatalogCollectionFactory,
        GwcatalogSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->gwcatalogFactory = $gwcatalogFactory;
        $this->gwcatalogCollectionFactory = $gwcatalogCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataGwcatalogFactory = $dataGwcatalogFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Gwd\CustomCatalog\Api\Data\GwcatalogInterface $gwcatalog
    ) {
        /* if (empty($gwcatalog->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $gwcatalog->setStoreId($storeId);
        } */
        try {
            $this->resource->save($gwcatalog);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the gwcatalog: %1',
                $exception->getMessage()
            ));
        }
        return $gwcatalog;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($gwcatalogId)
    {
        $gwcatalog = $this->gwcatalogFactory->create();
        $this->resource->load($gwcatalog, $gwcatalogId);
        if (!$gwcatalog->getId()) {
            throw new NoSuchEntityException(__('Gwcatalog with id "%1" does not exist.', $gwcatalogId));
        }
        return $gwcatalog;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->gwcatalogCollectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            $fields = [];
            $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                if ($filter->getField() === 'store_id') {
                    $collection->addStoreFilter($filter->getValue(), false);
                    continue;
                }
                $fields[] = $filter->getField();
                $condition = $filter->getConditionType() ?: 'eq';
                $conditions[] = [$condition => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
        
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Gwd\CustomCatalog\Api\Data\GwcatalogInterface $gwcatalog
    ) {
        try {
            $this->resource->delete($gwcatalog);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Gwcatalog: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($gwcatalogId)
    {
        return $this->delete($this->getById($gwcatalogId));
    }
}

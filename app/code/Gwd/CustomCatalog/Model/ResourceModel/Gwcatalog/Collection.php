<?php


namespace Gwd\CustomCatalog\Model\ResourceModel\Gwcatalog;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Gwd\CustomCatalog\Model\Gwcatalog::class,
            \Gwd\CustomCatalog\Model\ResourceModel\Gwcatalog::class
        );
    }
}

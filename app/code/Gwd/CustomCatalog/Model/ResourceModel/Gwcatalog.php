<?php


namespace Gwd\CustomCatalog\Model\ResourceModel;

class Gwcatalog extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('gwd_customcatalog_gwcatalog', 'gwcatalog_id');
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11.10.18
 * Time: 16:10
 */

namespace Gwd\CustomCatalog\Ui\DataProvider\Product;


class AddManageStockFieldToCollection implements \Magento\Ui\DataProvider\AddFieldToCollectionInterface
{
    public function addField(\Magento\Framework\Data\Collection $collection, $field, $alias = null)
    {
        $collection->addAtributeToSelect('vpn');
    }

}
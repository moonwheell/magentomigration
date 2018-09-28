<?php


namespace Gwd\CustomCatalog\Api\Data;

interface GwcatalogSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Gwcatalog list.
     * @return \Gwd\CustomCatalog\Api\Data\GwcatalogInterface[]
     */
    public function getItems();

    /**
     * Set content list.
     * @param \Gwd\CustomCatalog\Api\Data\GwcatalogInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

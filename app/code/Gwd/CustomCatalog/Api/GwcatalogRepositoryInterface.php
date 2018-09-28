<?php


namespace Gwd\CustomCatalog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface GwcatalogRepositoryInterface
{

    /**
     * Save Gwcatalog
     * @param \Gwd\CustomCatalog\Api\Data\GwcatalogInterface $gwcatalog
     * @return \Gwd\CustomCatalog\Api\Data\GwcatalogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Gwd\CustomCatalog\Api\Data\GwcatalogInterface $gwcatalog
    );

    /**
     * Retrieve Gwcatalog
     * @param string $gwcatalogId
     * @return \Gwd\CustomCatalog\Api\Data\GwcatalogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($gwcatalogId);

    /**
     * Retrieve Gwcatalog matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Gwd\CustomCatalog\Api\Data\GwcatalogSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Gwcatalog
     * @param \Gwd\CustomCatalog\Api\Data\GwcatalogInterface $gwcatalog
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Gwd\CustomCatalog\Api\Data\GwcatalogInterface $gwcatalog
    );

    /**
     * Delete Gwcatalog by ID
     * @param string $gwcatalogId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($gwcatalogId);
}

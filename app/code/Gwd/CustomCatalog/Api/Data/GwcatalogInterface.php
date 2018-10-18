<?php


namespace Gwd\CustomCatalog\Api\Data;

interface GwcatalogInterface
{

    const GWCATALOG_ID = 'gwcatalog_id';
    const CONTENT = 'content';

    /**
     * Get gwcatalog_id
     * @return string|null
     */
    public function getGwcatalogId();

    /**
     * Set gwcatalog_id
     * @param string $gwcatalogId
     * @return \Gwd\CustomCatalog\Api\Data\GwcatalogInterface
     */
    public function setGwcatalogId($gwcatalogId);

    /**
     * Get content
     * @return string|null
     */
    public function getContent();

    /**
     * Set content
     * @param string $content
     * @return \Gwd\CustomCatalog\Api\Data\GwcatalogInterface
     */
    public function setContent($content);

    /**
     * Get content
     * @return string|null
     */
    public function getTextMyCustomAttribute1();

    /**
     * Set content
     * @param string $content
     * @return \Gwd\CustomCatalog\Api\Data\GwcatalogInterface
     */
    public function setTextMyCustomAttribute1($content);
}

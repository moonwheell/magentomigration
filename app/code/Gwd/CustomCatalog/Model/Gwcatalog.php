?php


namespace Gwd\CustomCatalog\Model;

use Gwd\CustomCatalog\Api\Data\GwcatalogInterface;

class Gwcatalog extends \Magento\Framework\Model\AbstractModel implements GwcatalogInterface
{

    protected $_eventPrefix = 'gwd_customcatalog_gwcatalog';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Gwd\CustomCatalog\Model\ResourceModel\Gwcatalog::class);
    }

    /**
     * Get gwcatalog_id
     * @return string
     */
    public function getGwcatalogId()
    {
        return $this->getData(self::GWCATALOG_ID);
    }

    /**
     * Set gwcatalog_id
     * @param string $gwcatalogId
     * @return \Gwd\CustomCatalog\Api\Data\GwcatalogInterface
     */
    public function setGwcatalogId($gwcatalogId)
    {
        return $this->setData(self::GWCATALOG_ID, $gwcatalogId);
    }

    /**
     * Get content
     * @return string
     */
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * Set content
     * @param string $content
     * @return \Gwd\CustomCatalog\Api\Data\GwcatalogInterface
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }
}

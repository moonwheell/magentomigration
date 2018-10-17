<?php

namespace Gwd\CustomCatalog\Model;


class CustomCatalogAttribute implements \Gwd\CustomCatalog\Api\Data\GwcatalogAttributeInterface
{
    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->getData(self::VALUE);
    }

    /**
     * {@inheritdoc}
     */
    public function setValue($value)
    {
        return $this->setData(self::VALUE, $value);
    }
}
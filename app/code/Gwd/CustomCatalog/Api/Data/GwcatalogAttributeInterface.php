<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.10.18
 * Time: 18:29
 */

namespace Gwd\CustomCatalog\Api\Data;


interface GwcatalogAttributeInterface
{
    const VALUE = 'value';

    /**
     * Return value.
     *
     * @return string|null
     */
    public function getValue();

    /**
     * Set value.
     *
     * @param string|null $value
     * @return $this
     */
    public function setValue($value);
}
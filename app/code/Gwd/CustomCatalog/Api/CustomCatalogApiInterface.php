<?php

namespace Gwd\CustomCatalog\Api;

interface CustomCatalogApiInterface
{
    /**
     * Get products by VPN
     *
     * @param string $vpn
     */
    public function getByVPN($vpn);

}
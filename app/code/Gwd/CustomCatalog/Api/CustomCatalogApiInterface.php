<?php
namespace Gwd\CustomCatalog\Api;

interface CustomCatalogApiInterface
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $vpn.
     * @return string Greeting message with users name.
     */
    public function getByVPN($vpn);

}
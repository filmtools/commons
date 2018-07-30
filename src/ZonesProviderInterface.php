<?php
namespace FilmTools\Commons;

interface ZonesProviderInterface
{
    /**
     * @return ZonesInterface
     */
    public function getZones() : ZonesInterface;
}

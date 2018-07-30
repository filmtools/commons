<?php
namespace FilmTools\Commons;


class Zones extends MinMaxArrayIterator implements ZonesInterface, ZonesProviderInterface
{
    /**
     * @inheritDoc
     * @return $this
     */
    public function getZones() : ZonesInterface
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function search( float $zone )
    {
        return array_search($zone, $this->getArrayCopy());
    }


    /**
     * @inheritDoc
     * @return Exposures
     */
    public function getExposures() : ExposuresInterface
    {
        return new Exposures( array_map( function( $zone ) {
            return $zone * log10(2);
        }, $this->getArrayCopy()));
    }
}

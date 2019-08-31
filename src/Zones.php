<?php
namespace FilmTools\Commons;


class Zones extends ValuesIterator implements ZonesInterface, ZonesProviderInterface
{
    use SearchableTrait;

    public $unit = 'zone';

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
     * @return Exposures
     */
    public function getExposures() : ExposuresInterface
    {
        return new Exposures( array_map( function( $zone ) {
            return $zone * log10(2);
        }, $this->getArrayCopy()));
    }
}

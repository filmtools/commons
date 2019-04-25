<?php
namespace FilmTools\Commons;


class FStops extends MinMaxArrayIterator implements FStopsInterface, FStopsProviderInterface
{
    /**
     * @inheritDoc
     * @return $this
     */
    public function getFStops() : FStopsInterface
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function search( float $fstop )
    {
        return array_search($fstop, $this->getArrayCopy());
    }


    /**
     * @inheritDoc
     */
    public function getZones() : ZonesInterface
    {
        $min = $this->min();
        return new Zones( array_map( function( $fstop ) use ($min) {
            return $fstop + ($min * -1);
        }, $this->getArrayCopy()));
    }


    /**
     * @inheritDoc
     * @return ExposuresInterface
     */
    public function getExposures() : ExposuresInterface
    {
        return $this->getZones()->getExposures();
    }
}

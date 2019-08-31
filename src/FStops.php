<?php
namespace FilmTools\Commons;


class FStops extends ValuesIterator implements FStopsInterface, FStopsProviderInterface
{
    use SearchableTrait;

    public $unit = 'fstop';

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

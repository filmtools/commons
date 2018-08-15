<?php
namespace FilmTools\Commons;


class Densities extends MinMaxArrayIterator implements DensitiesInterface, DensitiesProviderInterface
{
    /**
     * @inheritDoc
     * @return $this
     */
    public function getDensities() : DensitiesInterface
    {
        return $this;
    }


    /**
     * @inheritDoc
     */
    public function search( float $logD )
    {
        return array_search($logD, $this->getArrayCopy());
    }
}

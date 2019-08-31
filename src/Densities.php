<?php
namespace FilmTools\Commons;


class Densities extends ValuesIterator implements DensitiesInterface, DensitiesProviderInterface
{
    use SearchableTrait;

    public $unit = 'logD';

    /**
     * @inheritDoc
     * @return $this
     */
    public function getDensities() : DensitiesInterface
    {
        return $this;
    }

}

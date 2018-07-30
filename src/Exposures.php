<?php
namespace FilmTools\Commons;


class Exposures extends MinMaxArrayIterator implements ExposuresInterface, ExposuresProviderInterface
{
    /**
     * @inheritDoc
     * @return $this
     */
    public function getExposures() : ExposuresInterface
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function search( float $logH )
    {
        return array_search($logH, $this->getArrayCopy());
    }

}

<?php
namespace FilmTools\Commons;


class Exposures extends MinMaxArrayIterator implements ExposuresInterface, ExposuresProviderInterface
{

    use SearchableTrait;

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
     *
     * The range step width used here is a third of `log10(2) = 0.301...`.
     * The numbers will most likely cleanly round to multiples of 0.1 though.
     */
    public function getRange( float $step = null) : \SplFixedArray
    {
        $step = is_null($step) ? (log10(2) / 3) : $step;
        return parent::getRange( $step );
    }

}

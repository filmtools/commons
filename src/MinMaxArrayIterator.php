<?php
namespace FilmTools\Commons;

use function FilmTools\MRounder\mfloor;
use function FilmTools\MRounder\mceil;

class MinMaxArrayIterator extends \ArrayIterator implements MinMaxInterface
{
    protected $range_steps = 0.1;

    public function max()
    {
        return max( $this->getArrayCopy());
    }

    public function min()
    {
        return min( $this->getArrayCopy());
    }

    /**
     * Returns an range array from smallest to greatest exposure value.
     * The default step width is 0.1 and can be customized
     * with an optional method parameter.
     *
     * The minimum value is ceiled, and the maximum is floored,
     * to the next multiple of the used step width.
     *
     * @param  float $step Optional: custom range step width
     * @return \SplFixedArray
     */
    public function getRange( float $step = null) : \SplFixedArray
    {
        $step = is_null($step) ? $this->range_steps : $step;
        $min = mceil($this->min(), $step);
        $max = mfloor($this->max(), $step);

        return \SplFixedArray::fromArray( range($min, $max, $step));
    }

}

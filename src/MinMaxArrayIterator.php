<?php
namespace FilmTools\Commons;

class MinMaxArrayIterator extends \ArrayIterator implements MinMaxInterface
{

    public function max()
    {
        return max( $this->getArrayCopy());
    }

    public function min()
    {
        return min( $this->getArrayCopy());
    }
}

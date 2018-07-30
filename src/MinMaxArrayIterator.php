<?php
namespace FilmTools\Commons;

class MinMaxArrayIterator extends \ArrayIterator implements MinMaxInterface
{

    public function max()
    {
        $max = $this->current();

        foreach($this as $m)
            $max = max($m, $max);
        return $max;
    }

    public function min()
    {
        $min = $this->current();
        foreach($this as $m)
            $min = min($m, $min);
        return $min;
    }
}

<?php
namespace FilmTools\Commons;

interface MinMaxInterface
{
    public function max();
    public function min();

    /**
     * Returns an range array from smallest to greatest value.
     * @return \SplFixedArray
     */
    public function getRange() : \SplFixedArray;
}

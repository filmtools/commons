<?php
namespace FilmTools\Commons;

abstract class ValuesIterator extends MinMaxArrayIterator implements UnitsInterface
{
    public $unit = '';

    public function getUnit()
    {
        return $this->unit;
    }
}

<?php
namespace FilmTools\Commons;

interface SearchableInterface
{
    /**
     * @param  float $value
     * @return int|false
     */
    public function search( float $value );
}

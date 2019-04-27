<?php
namespace FilmTools\Commons;

interface SearchableInterface
{
    /**
     * Searches the internal array for the given value
     * and returns the first corresponding key if successful.
     *
     * If the value can not be found, NULL must be returned.
     *
     * @param  float $value
     * @return int|null
     */
    public function search( float $value ) : ?int;
}

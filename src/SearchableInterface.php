<?php
namespace FilmTools\Commons;

interface SearchableInterface
{
    /**
     * Searches the internal array for the given value
     * and returns the first corresponding key if successful.
     *
     * This method uses PHP's array_search:
     * @see http://php.net/manual/en/function.array-search.php
     *
     * @param  float $value
     * @return int|false
     */
    public function search( float $value );
}

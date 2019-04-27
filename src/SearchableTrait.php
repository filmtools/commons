<?php
namespace FilmTools\Commons;

trait SearchableTrait
{

    /**
     * Searches the internal array for the given value
     * and returns the first corresponding key if successful.
     *
     * If the value can not be found, NULL is returned.
     *
     * This method uses PHP's array_search:
     * @see http://php.net/manual/en/function.array-search.php
     *
     * @param  float $value
     * @return int|null
     */
    public function search( float $value ) : ?int
    {
        $key = array_search($value, $this->getArrayCopy());
        return ($key !== false) ? $key : null;
    }

}

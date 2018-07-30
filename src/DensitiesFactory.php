<?php
namespace FilmTools\Commons;


class DensitiesFactory
{

    /**
     * @var string
     */
    public $php_densities_class;


    /**
     * @param string|null $php_densities_class
     */
    public function __construct( string $php_densities_class = null )
    {
        $this->php_densities_class = $php_densities_class ?: Densities::class;

        if (!is_subclass_of($this->php_densities_class, DensitiesInterface::class ))
            throw new FilmToolsInvalidArgumentException("Class name must implement DensitiesInterface.");

    }


    /**
     * @param  array  $data
     * @return DensitiesInterface
     */
    public function fromValues( $data ) : DensitiesInterface
    {
        if ($data instanceOf \Traversable )
            $data = iterator_to_array( $data );
        else if (!is_array($data))
            throw new FilmToolsInvalidArgumentException("Array or Traversable expected");


        $php_class = $this->php_densities_class;
        return new $php_class( array_values( $data ));
    }

}

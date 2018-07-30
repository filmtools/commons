<?php
namespace FilmTools\Commons;


class ExposuresFactory
{

    /**
     * @var string
     */
    public $php_exposures_class;


    /**
     * @param string|null $php_exposures_class
     */
    public function __construct( string $php_exposures_class = null )
    {
        $this->php_exposures_class = $php_exposures_class ?: Exposures::class;

        if (!is_subclass_of($this->php_exposures_class, ExposuresInterface::class ))
            throw new FilmToolsInvalidArgumentException("Class name must implement ExposuresInterface.");

    }


    /**
     * @param  array  $data
     * @return ExposuresInterface
     */
    public function fromValues( $data ) : ExposuresInterface
    {
        if ($data instanceOf \Traversable )
            $data = iterator_to_array( $data );
        else if (!is_array($data))
            throw new FilmToolsInvalidArgumentException("Array or Traversable expected");

        $php_class = $this->php_exposures_class;
        return new $php_class( array_values( $data ));
    }


    /**
     * @param  array  $data
     * @return ExposuresInterface
     */
    public function fromKeys( $data ) : ExposuresInterface
    {
        if ($data instanceOf \Traversable )
            $data = iterator_to_array( $data );
        else if (!is_array($data))
            throw new FilmToolsInvalidArgumentException("Array or Traversable expected");

        $php_class = $this->php_exposures_class;
        return new $php_class( array_keys( $data ));
    }
}

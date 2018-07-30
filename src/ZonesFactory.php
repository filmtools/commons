<?php
namespace FilmTools\Commons;


class ZonesFactory
{

    /**
     * @var string
     */
    public $php_zones_class;


    /**
     * @param string|null $php_zones_class
     */
    public function __construct( string $php_zones_class = null )
    {
        $this->php_zones_class = $php_zones_class ?: Zones::class;

        if (!is_subclass_of($this->php_zones_class, ZonesInterface::class ))
            throw new FilmToolsInvalidArgumentException("Class name must implement ZonesInterface.");

    }


    /**
     * @param  array  $data
     * @return ZonesInterface
     */
    public function fromValues( $data ) : ZonesInterface
    {
        if ($data instanceOf \Traversable )
            $data = iterator_to_array( $data );
        else if (!is_array($data))
            throw new FilmToolsInvalidArgumentException("Array or Traversable expected");

        $php_class = $this->php_zones_class;
        return new $php_class( array_values( $data ));
    }


    /**
     * @param  array  $data
     * @return ZonesInterface
     */
    public function fromKeys( $data ) : ZonesInterface
    {
        if ($data instanceOf \Traversable )
            $data = iterator_to_array( $data );
        else if (!is_array($data))
            throw new FilmToolsInvalidArgumentException("Array or Traversable expected");

        $php_class = $this->php_zones_class;
        return new $php_class( array_keys( $data ));
    }
}

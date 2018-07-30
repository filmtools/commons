<?php
namespace tests;

use FilmTools\Commons\DensitiesFactory;
use FilmTools\Commons\DensitiesInterface;
use FilmTools\Commons\FilmToolsInvalidArgumentException;
use FilmTools\Commons\FilmToolsExceptionInterface;

class DensitiesFactoryTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider provideValidFactoryArguments
     */
    public function testValidFactoryArguments( $data )
    {
        $sut = new DensitiesFactory;
        $densities = $sut->fromValues( $data );

        $this->assertInstanceOf( DensitiesInterface::class, $densities );

        if ($data instanceOf \Traversable )
            $data = iterator_to_array( $data );

        $density_values = iterator_to_array( $densities );
        $data_values     = array_values($data);

        foreach ( $data_values as $val)
            $this->assertContains( $val, $density_values);
    }


    /**
     * @dataProvider provideInValidFactoryArguments
     */
    public function testInValidFactoryArguments( $data )
    {
        $this->expectException( \InvalidArgumentException::class );
        $this->expectException( FilmToolsInvalidArgumentException::class );
        $this->expectException( FilmToolsExceptionInterface::class );

        $sut = new DensitiesFactory;
        $sut->fromValues( $data );
    }


    public function testInvalidCtorArguments( )
    {
        $this->expectException( \InvalidArgumentException::class );
        $this->expectException( FilmToolsInvalidArgumentException::class );
        $this->expectException( FilmToolsExceptionInterface::class );

        new DensitiesFactory( "foobar");
    }


    public function provideInValidFactoryArguments()
    {
        return array(
            [ null ],
            [ false ],
            [ "foobar" ]
        );
    }

    public function provideValidFactoryArguments()
    {
        $raw = array( 0.01 => 0.1, 0.02 => 0.2, 0.03 => 0.3);

        return array(
            [ $raw ],
            [ new \ArrayObject( $raw ) ],
            [ new \ArrayIterator( $raw ) ]
        );
    }


}

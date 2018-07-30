<?php
namespace tests;

use FilmTools\Commons\ZonesFactory;
use FilmTools\Commons\ZonesInterface;
use FilmTools\Commons\FilmToolsInvalidArgumentException;
use FilmTools\Commons\FilmToolsExceptionInterface;

class ZonesFactoryTest extends \PHPUnit\Framework\TestCase
{


    public function testInvalidCtorArguments( )
    {
        $this->expectException( \InvalidArgumentException::class );
        $this->expectException( FilmToolsInvalidArgumentException::class );
        $this->expectException( FilmToolsExceptionInterface::class );

        new ZonesFactory( "foobar");
    }


    /**
     * @dataProvider provideValidFactoryArguments
     */
    public function testValidFactoryArgumentsWithValues( $data )
    {
        $sut = new ZonesFactory;
        $zones = $sut->fromValues( $data );
        $this->assertInstanceOf( ZonesInterface::class, $zones );


        if ($data instanceOf \Traversable )
            $data = iterator_to_array( $data );

        $exposure_values = iterator_to_array( $zones );
        $data_values     = array_values($data);

        foreach ( $data_values as $val)
            $this->assertContains( $val, $exposure_values);

    }

    /**
     * @dataProvider provideValidFactoryArguments
     */
    public function testValidFactoryArgumentsWithKeys( $data )
    {
        $sut = new ZonesFactory;
        $zones = $sut->fromKeys( $data );

        $this->assertInstanceOf( ZonesInterface::class, $zones );

        if ($data instanceOf \Traversable )
            $data = iterator_to_array( $data );

        $exposure_values = iterator_to_array( $zones );
        $data_keys = array_keys($data);

        foreach ( $data_keys as $key)
            $this->assertContains( $key, $exposure_values);

    }


    /**
     * @dataProvider provideInValidFactoryArguments
     */
    public function testInValidFactoryArguments( $densities )
    {
        $this->expectException( \InvalidArgumentException::class );
        $this->expectException( FilmToolsInvalidArgumentException::class );
        $this->expectException( FilmToolsExceptionInterface::class );

        $sut = new ZonesFactory;
        $sut->fromValues( $densities );
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
        $raw = array( 0.01 => 1, 0.02 =>  2, 0.03 => 3);

        return array(
            [ $raw ],
            [ new \ArrayObject( $raw ) ],
            [ new \ArrayIterator( $raw ) ]
        );
    }


}

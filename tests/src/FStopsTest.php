<?php
namespace tests;

use FilmTools\Commons\FStops;
use FilmTools\Commons\FStopsInterface;
use FilmTools\Commons\FStopsProviderInterface;
use FilmTools\Commons\ExposuresProviderInterface;
use FilmTools\Commons\ExposuresInterface;
use FilmTools\Commons\ZonesProviderInterface;
use FilmTools\Commons\ZonesInterface;

class FStopsTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testValidCtorArguments( $data, $min, $max )
    {
        $sut = new FStops( $data );
        $this->assertInstanceOf( FStopsInterface::class, $sut );
        $this->assertInstanceOf( FStopsProviderInterface::class, $sut );
    }


    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testSearchableInterface( $data, $min, $max )
    {
        $sut = new FStops( $data );
        $this->assertTrue( $sut->search($min) !== false);
        $this->assertTrue( $sut->search($max) !== false);
        $this->assertFalse( $sut->search( 999 ));
    }

    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testZonesProviderInterface( $data, $min, $max )
    {
        $sut = new FStops( $data );
        $this->assertInstanceOf( ZonesProviderInterface::class, $sut );

        $zones = $sut->getZones();
        $this->assertInstanceOf( ZonesInterface::class, $zones );
    }

    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testExposuresProviderInterface( $data, $min, $max )
    {
        $sut = new FStops( $data );
        $this->assertInstanceOf( ExposuresProviderInterface::class, $sut );

        $exposures = $sut->getExposures();
        $this->assertInstanceOf( ExposuresInterface::class, $exposures );
    }



    public function provideValidCtorArguments()
    {
        $raw = array(
            0.01 => 0.1,
            0.02 => 0.2,
            0.03 => 0.3
        );

        $min = min( $raw );
        $max = max( $raw );

        return array(
            [ $raw, $min, $max],
            [ new \ArrayObject( $raw ), $min, $max ],
            [ new \ArrayIterator( $raw ), $min, $max ]
        );
    }


}

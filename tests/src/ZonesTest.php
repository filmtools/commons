<?php
namespace tests;

use FilmTools\Commons\Zones;
use FilmTools\Commons\ZonesInterface;
use FilmTools\Commons\ZonesProviderInterface;
use FilmTools\Commons\ExposuresProviderInterface;
use FilmTools\Commons\ExposuresInterface;

class ZonesTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testValidCtorArguments( $data, $min, $max )
    {
        $sut = new Zones( $data );
        $this->assertInstanceOf( ZonesInterface::class, $sut );
        $this->assertInstanceOf( ZonesProviderInterface::class, $sut );
    }


    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testSearchableInterface( $data, $min, $max )
    {
        $sut = new Zones( $data );
        $this->assertTrue( $sut->search($min) !== null);
        $this->assertTrue( $sut->search($max) !== null);
        $this->assertNull( $sut->search( 999 ));
    }

    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testZonesProviderInterface( $data, $min, $max )
    {
        $sut = new Zones( $data );
        $this->assertInstanceOf( ZonesProviderInterface::class, $sut );

        $zones = $sut->getZones();
        $this->assertInstanceOf( ZonesInterface::class, $zones );
    }

    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testExposuresProviderInterface( $data, $min, $max )
    {
        $sut = new Zones( $data );
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

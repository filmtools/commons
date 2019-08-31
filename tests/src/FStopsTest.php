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
        $this->assertInternalType("string", $sut->getUnit());
        $this->assertInstanceOf( FStopsInterface::class, $sut );
        $this->assertInstanceOf( FStopsProviderInterface::class, $sut );
    }


    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testSearchableInterface( $data, $min, $max )
    {
        $sut = new FStops( $data );
        $this->assertTrue( $sut->search($min) !== null);
        $this->assertTrue( $sut->search($max) !== null);
        $this->assertNull( $sut->search( 999 ));
    }

    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testFStopsProviderInterface( $data, $min, $max )
    {
        $sut = new FStops( $data );
        $this->assertInstanceOf( FStopsProviderInterface::class, $sut );
        $this->assertEquals( $min, $sut->min() );

        $zones = $sut->getFStops();
        $this->assertInstanceOf( FStopsInterface::class, $zones );
    }

    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testZonesProviderInterface( $data, $min, $max )
    {
        $sut = new FStops( $data );
        $this->assertInstanceOf( ZonesProviderInterface::class, $sut );
        $this->assertEquals( $min, $sut->min() );

        $zones = $sut->getZones();
        $this->assertInstanceOf( ZonesInterface::class, $zones );
        $this->assertEquals( 0, $zones->min() );
    }

    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testExposuresProviderInterface( $data, $min, $max )
    {
        $sut = new FStops( $data );
        $this->assertInstanceOf( ExposuresProviderInterface::class, $sut );
        $this->assertEquals( $min, $sut->min() );

        $exposures = $sut->getExposures();
        $this->assertInstanceOf( ExposuresInterface::class, $exposures );
        $this->assertEquals( 0, $exposures->min() );
    }



    public function provideValidCtorArguments()
    {
        $raw = array(
            -5,
            -2,
            0,
            1,
            6
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

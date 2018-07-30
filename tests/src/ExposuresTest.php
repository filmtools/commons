<?php
namespace tests;

use FilmTools\Commons\Exposures;
use FilmTools\Commons\ExposuresInterface;
use FilmTools\Commons\ExposuresProviderInterface;

class ExposuresTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testValidCtorArguments( $data, $min, $max )
    {
        $sut = new Exposures( $data );
        $this->assertInstanceOf( ExposuresInterface::class, $sut );
        $this->assertInstanceOf( ExposuresProviderInterface::class, $sut );
    }


    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testExposuresProviderInterface( $data, $min, $max )
    {
        $sut = new Exposures( $data );
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

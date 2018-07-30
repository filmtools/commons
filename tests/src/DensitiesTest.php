<?php
namespace tests;

use FilmTools\Commons\Densities;
use FilmTools\Commons\DensitiesInterface;
use FilmTools\Commons\DensitiesProviderInterface;

class DensitiesTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testValidCtorArguments( $data, $min, $max )
    {
        $sut = new Densities( $data );
        $this->assertInstanceOf( DensitiesInterface::class, $sut );
        $this->assertInstanceOf( DensitiesProviderInterface::class, $sut );
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

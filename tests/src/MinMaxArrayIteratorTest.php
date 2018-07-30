<?php
namespace tests;

use FilmTools\Commons\MinMaxArrayIterator;

class MinMaxArrayIteratorTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testValidCtorArguments( $data, $min, $max )
    {
        $sut = new MinMaxArrayIterator( $data );

        $this->assertInstanceOf( \ArrayIterator::class, $sut );
        $this->assertInstanceOf( \Traversable::class, $sut );

    }

    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testMinMaxInterface( $data, $min, $max )
    {
        $sut = new MinMaxArrayIterator( $data );

        if ($data instanceOf \Traversable )
            $data = iterator_to_array( $data );

        $this->assertEquals( $min, $sut->min());
        $this->assertEquals( $max, $sut->max());
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

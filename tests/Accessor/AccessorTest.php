<?php

namespace ConnectHolland\WindmillTestUtilities\Utils\Test;

use ConnectHolland\WindmillTestUtilities\Fixtures\PublicProtectedPrivateFixture;
use ConnectHolland\WindmillTestUtilities\Utils\Accessor;
use PHPUnit_Framework_TestCase;

/**
 * Unit test for the accessor
 *
 * @author Ron Rademaker
 */
class AccessorTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test getting a property
     *
     * @dataProvider provideTestData
     *
     * @param string $property
     * @param string $value
     */
    public function testGetProperty($property, $value)
    {
        $accessor = new Accessor(new PublicProtectedPrivateFixture());

        $this->assertEquals($value, $accessor->$property);
    }

    /**
     * Test setting a property
     *
     * @dataProvider provideTestData
     *
     * @param string $property
     * @param string $defaultValue
     * @param string $setValue
     */
    public function testSetProperty($property, $defaultValue, $setValue)
    {
        $fixture = new PublicProtectedPrivateFixture();
        $accessor = new Accessor($fixture);

        $this->assertAttributeEquals($defaultValue, $property, $fixture);

        $accessor->$property = $setValue;

        $this->assertAttributeEquals($setValue, $property, $fixture);
    }

    /**
     * Test calling a getter method
     *
     * @dataProvider provideTestData
     *
     * @param string $property
     * @param string $defaultValue
     * @param string $setValue
     * @param string $method
     */
    public function testGetterMethod($property, $defaultValue, $setValue, $method)
    {
        $accessor = new Accessor(new PublicProtectedPrivateFixture());

        $this->assertEquals($defaultValue, $accessor->$method());
    }

    /**
     * Test calling a setter method
     *
     * @dataProvider provideTestData
     *
     * @param string $property
     * @param string $defaultValue
     * @param string $setValue
     * @param string $getter
     * @param string $setter
     */
    public function testSetterMethod($property, $defaultValue, $setValue, $getter, $setter)
    {
        $fixture = new PublicProtectedPrivateFixture();
        $accessor = new Accessor($fixture);

        $this->assertAttributeEquals($defaultValue, $property, $fixture);

        $accessor->$setter($setValue);

        $this->assertAttributeEquals($setValue, $property, $fixture);
    }

    /**
     * Test calling a static getter method
     *
     * @dataProvider provideTestData
     *
     * @param string $property
     * @param string $defaultValue
     * @param string $setValue
     * @param string $method
     */
    public function testStaticGetterMethod($property, $defaultValue, $setValue, $method)
    {
        $accessor = new Accessor(new PublicProtectedPrivateFixture());
        $staticMethod = $method . 'Static';

        $this->assertEquals($defaultValue, $accessor::$staticMethod());
    }

    /**
     * Test calling a static setter method
     *
     * @dataProvider provideTestData
     *
     * @param string $property
     * @param string $defaultValue
     * @param string $setValue
     * @param string $getter
     * @param string $setter
     */
    public function testStaticSetterMethod($property, $defaultValue, $setValue, $getter, $setter)
    {
        $fixture = new PublicProtectedPrivateFixture();
        $accessor = new Accessor($fixture);

        $this->assertAttributeEquals($defaultValue, $property, $fixture);

        $staticSetter = $setter. 'Static';
        $accessor::$staticSetter($setValue);

        $staticGetter = $getter. 'Static';

        $this->assertEquals($setValue, $accessor::$staticGetter());
    }


    /**
     * Gets test data
     *
     * @return array
     */
    public function provideTestData()
    {
        return [
            ['foo', 'foo', 'bar', 'getFoo', 'setFoo'],
            ['bar', 'bar', 'baz', 'getBar', 'setBar'],
            ['baz', 'baz', 'foo', 'getBaz', 'setBaz']
        ];
    }
}

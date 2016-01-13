<?php

namespace ConnectHolland\WindmillTestUtilities\Fixtures;

/**
 * Fixture containing several levels of visibility
 *
 * @author Ron Rademaker
 */
class PublicProtectedPrivateFixture
{
    public $baz = 'baz';
    protected $bar = 'bar';
    private $foo = 'foo';

    public static $bazStatic = 'baz';
    protected static $barStatic = 'bar';
    private static $fooStatic = 'foo';

    public function setBaz($baz)
    {
        $this->baz = $baz;
    }

    public function getBaz()
    {
        return $this->baz;
    }

    protected function setBar($bar)
    {
        $this->bar = $bar;
    }

    protected function getBar()
    {
        return $this->bar;
    }

    private function setFoo($foo)
    {
        $this->foo = $foo;
    }

    private function getFoo()
    {
        return $this->foo;
    }

    public static function setBazStatic($baz)
    {
        self::$bazStatic = $baz;
    }

    public static function getBazStatic()
    {
        return self::$bazStatic;
    }

    protected static function setBarStatic($bar)
    {
        self::$barStatic = $bar;
    }

    protected static function getBarStatic()
    {
        return self::$barStatic;
    }

    private static function setFooStatic($foo)
    {
        self::$fooStatic = $foo;
    }

    private static function getFooStatic()
    {
        return self::$fooStatic;
    }

}

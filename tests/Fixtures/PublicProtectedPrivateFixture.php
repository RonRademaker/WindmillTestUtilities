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

}

<?php

use Umpirsky\Twig\Extension\PhpFunctionExtension;

class PhpFunctionExtensionTest extends \PHPUnit\Framework\TestCase
{
    private $twig;

    private $phpFunctionExt;

    protected function setUp()
    {
        $this->phpFunctionExt = new PhpFunctionExtension();
        $loader = new Twig_Loader_Array([
            'md5'   => '{{ md5("umpirsky") }} is md5 of umpirsky.',
            'floor' => '{{ floor(7.7) }} is floor of 7.7.',
            'ceil'  => '{{ ceil(6.7) }} is ceil of 6.7.',
        ]);

        $this->twig = new Twig_Environment($loader);
        $this->twig->addExtension($this->phpFunctionExt);
    }

    /**
     * @dataProvider renderProvider
     */
    public function testRenderedOutput($key, $expected)
    {
        $this->assertEquals(
            $this->twig->render($key),
            $expected
        );
    }

    public function testAllowFunction()
    {
        $this->assertNull($this->phpFunctionExt->allowFunction('allowed_function'));
    }

    public function testConstructorWithAllowedFunction()
    {
        $phpFunctionExt = new PhpFunctionExtension(['sha1', 'md5']);

        $this->assertInstanceOf(PhpFunctionExtension::class, $phpFunctionExt);
    }

    public function testGetName()
    {
        $this->assertSame('php_function', $this->phpFunctionExt->getName());
    }

    public function renderProvider()
    {
        return [
            ['md5', 'f0d0a45e43690965bd6689a2ae3c8943 is md5 of umpirsky.'],
            ['floor', '7 is floor of 7.7.'],
            ['ceil', '7 is ceil of 6.7.'],
        ];
    }
}

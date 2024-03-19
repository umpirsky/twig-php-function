<?php

namespace Umpirsky\Twig\Extension;

use Twig\TwigFunction;

class PhpFunctionExtension extends \Twig\Extension\AbstractExtension
{
    private array $functions = [
        'uniqid',
        'floor',
        'ceil',
        'addslashes',
        'chr',
        'chunk_split',
        'convert_uudecode',
        'crc32',
        'crypt',
        'hex2bin',
        'md5',
        'sha1',
        'strpos',
        'strrpos',
        'ucwords',
        'wordwrap',
        'gettype',
    ];

    public function __construct(array $functions = [])
    {
        if ($functions) {
            $this->allowFunctions($functions);
        }
    }

    public function getFunctions(): array
    {
        $twigFunctions = [];

        foreach ($this->functions as $function) {
            $twigFunctions[] = new TwigFunction($function, $function);
        }

        return $twigFunctions;
    }

    public function allowFunction($function): void
    {
        $this->functions[] = $function;
    }

    public function allowFunctions(array $functions): void
    {
        $this->functions = $functions;
    }

    public function getName(): string
    {
        return 'php_function';
    }
}

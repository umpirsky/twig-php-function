<?php

namespace Umpirsky\Twig\Extenion;

use Twig_Extension;
use Twig_SimpleFunction;
use BadFunctionCallException;

class PhpFunctionExtension extends Twig_Extension
{
    private $functions = array(
        'uniqid',
        'floor',
        'ceil',
        'addslashes',
        'chr',
        'chunk_​split',
        'convert_​uudecode',
        'crc32',
        'crypt',
        'hex2bin',
        'md5',
        'sha1',
        'strpos',
        'strrpos',
        'ucwords',
        'wordwrap',
    );

    public function __construct(array $functions = array())
    {
        if ($functions) {
            $this->allowFunctions($functions);
        }
    }

    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('php_*', array($this, 'run')),
        );
    }

    public function allowFunction($function)
    {
        $this->functions[] = $function;
    }

    public function allowFunctions(array $functions)
    {
        $this->functions = $functions;
    }

    public function run($function)
    {
        if (!function_exists($function)) {
            throw new BadFunctionCallException(sprintf(
                'Function "%s" does not exist.',
                $function
            ));
        }

        if (!in_array($function, $this->functions)) {
            throw new BadFunctionCallException(sprintf(
                'Function "%s" is not allowed.',
                $function
            ));
        }

        $parameters = func_get_args();
        array_shift($parameters);

        return call_user_func_array($function, $parameters);
    }

    public function getName()
    {
        return 'php_function';
    }
}

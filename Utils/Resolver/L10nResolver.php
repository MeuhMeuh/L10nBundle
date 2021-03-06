<?php

namespace L10nBundle\Utils\Resolver;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Resolves the parameters that are used in a value
 */
class L10nResolver
{
    /**
     * @var ParameterBagInterface
     */
    protected $parameterBag;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $parameterBag = $container->getParameterBag();
        $parameterBag->resolve();

        $this->parameterBag = $parameterBag;
    }

    /**
     * Resolves a value containing parameters to a plain value.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function resolve($value)
    {
        if (!is_array($value)) {
            return $this->parameterBag->resolveValue($value);
        }

        return null;
    }
}

<?php

namespace Site\UserBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('site_user');

        $rootNode
            ->children()
                ->arrayNode('login_routes')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('login_check_route')->end()
                            ->scalarNode('template')->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}

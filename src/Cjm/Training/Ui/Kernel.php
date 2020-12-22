<?php

namespace Cjm\Training\Ui;

use Cjm\Training\Ui\Controller\Trainers;
use FriendsOfBehat\SymfonyExtension\Bundle\FriendsOfBehatSymfonyExtensionBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Bundle\WebProfilerBundle\WebProfilerBundle;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function registerBundles(): iterable
    {
        yield new FrameworkBundle();
        yield new FriendsOfBehatSymfonyExtensionBundle();
        yield new TwigBundle();
    }

    protected function configureContainer(ContainerConfigurator $c): void
    {
        $c->extension('framework', [
            'secret' => 'S0ME_SECRET',
            'test' => true
        ]);

        $c->extension('twig', [
            'default_path' =>  __DIR__ . '/templates'
        ]);

        $c->services()
            ->load('Cjm\\', __DIR__.'/../../*')
            ->autowire()
            ->autoconfigure()
        ;

        if ($this->environment == 'test') {
            $c->services()
                ->load('Cjm\\Behat\\', __DIR__ . '/../../../../features/contexts')
                ->autowire()
                ->autoconfigure()
            ;
        }
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import(__DIR__.'/Controller/', 'annotation');
    }
}
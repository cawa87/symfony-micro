<?php

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

class MicroKernel extends Kernel
{
    use MicroKernelTrait;

    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
        }

        return $bundles;
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        $routes->mount('/_wdt', $routes->import('@WebProfilerBundle/Resources/config/routing/wdt.xml'));
        $routes->mount('/_profiler', $routes->import('@WebProfilerBundle/Resources/config/routing/profiler.xml'));

        $routes->add('/', 'kernel:indexAction', 'index');
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        // load bundles' configuration
        $c->loadFromExtension('framework', [
            'secret' => '12345',
            'profiler' => [
                'enabled' => true
            ],
            'templating' => ['engines' => ['twig']],
        ]);

        $c->loadFromExtension('web_profiler', ['toolbar' => true]);

        // add configuration parameters
        $c->setParameter('mail_sender', 'user@example.com');

        // register services
        $c->register('app.markdown', 'AppBundle\\Service\\Parser\\Markdown');
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->environment;
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    public function indexAction()
    {
        return $this->container->get('templating')->renderResponse('index.html.twig');
    }
}
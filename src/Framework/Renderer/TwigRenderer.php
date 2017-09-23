<?php

namespace Framework\Renderer;

class TwigRenderer implements RendererInterface
{
    private $twig;
    private $loader;

    public function __construct(\Twig_Loader_Filesystem $loader, \Twig_Environment $twig)
    {
        $this->loader = $loader;
        $this->twig = $twig;
    }

    /**
     * Permet de rajouter un chemin pour charger les vues
     * @param string      $namespace
     * @param string|null $path
     */
    public function addPath(string $namespace, ?string $path = null): void
    {
        $this->loader->addPath($path, $namespace);
    }

    /**
     * Permet de rendre une vue
     * Le chemin peut être précisé avec des namespace rajoutés via addPath()
     * $this->render('@blog/view');
     * $this->render('view');
     * @param  string $view
     * @param  array  $params
     * @return [type]
     */
    public function render(string $view, array $params = []): string
    {
        return $this->twig->render($view . '.twig', $params);
    }

    /**
     * Permet de rajouter des variables globales à toutes les vues
     * @param string $key
     * @param mixed $value
     */
    public function addGlobal(string $key, $value): void
    {
        $this->twig->addGlobal($key, $value);
    }
}

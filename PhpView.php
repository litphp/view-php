<?php

declare(strict_types=1);

namespace Lit\View\Php;

use Lit\Voltage\AbstractView;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;
use Lit\Air\Configurator as C;

class PhpView extends AbstractView
{
    /**
     * @var PhpRenderer
     */
    protected $renderer;
    /**
     * @var string
     */
    protected $template;

    /**
     * PhpView constructor.
     * @param PhpRenderer $renderer
     * @param string $template
     */
    public function __construct(PhpRenderer $renderer, string $template)
    {
        $this->renderer = $renderer;
        $this->template = $template;
    }

    public function render(array $data = []): ResponseInterface
    {
        return $this->renderer->render($this->response, $this->template, $data);
    }

    public static function configuration(array $rendererParams)
    {
        return [
            PhpViewFactory::class => C::provideParameter([
                C::alias(PhpViewFactory::class, PhpRenderer::class),
            ]),
            C::join(PhpViewFactory::class, PhpRenderer::class) => C::instance(PhpRenderer::class, $rendererParams),
        ];
    }
}

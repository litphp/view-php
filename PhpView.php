<?php

declare(strict_types=1);

namespace Lit\View\Php;

use Lit\Voltage\AbstractView;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

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
}

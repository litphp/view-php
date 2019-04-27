<?php

declare(strict_types=1);

namespace Lit\View\Php;

use Slim\Views\PhpRenderer;

class PhpViewFactory
{
    /**
     * @var PhpRenderer
     */
    protected $phpRenderer;

    /**
     * PhpViewFactory constructor.
     */
    public function __construct(PhpRenderer $phpRenderer)
    {
        $this->phpRenderer = $phpRenderer;
    }

    public function produce(string $template): PhpView
    {
        return new PhpView($this->phpRenderer, $template);
    }
}

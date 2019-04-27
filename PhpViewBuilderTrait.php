<?php

declare(strict_types=1);

namespace Lit\View\Php;

use Lit\Voltage\Interfaces\ViewInterface;

trait PhpViewBuilderTrait
{
    abstract protected function attachView(ViewInterface $view);

    /**
     * @var PhpViewFactory
     */
    protected $phpViewFactory;
    public function injectPhpViewFactory(PhpViewFactory $phpViewFactory)
    {
        $this->phpViewFactory = $phpViewFactory;
    }

    protected function template(string $template): PhpView
    {
        return $this->attachView($this->phpViewFactory->produce($template));
    }
}

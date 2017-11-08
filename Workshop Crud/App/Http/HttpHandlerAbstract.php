<?php

namespace App\Http;

use Core\TemplateInterface;
use Core\DataBinderInterface;

abstract class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    protected $template;

    /**
     * @var DataBinderInterface
     */
    protected $dataBinder;

    /**
     * HttpHandlerAbstract constructor.
     * @param TemplateInterface $template
     */
    public function __construct(TemplateInterface $template, DataBinderInterface $binder)
    {
        $this->template = $template;
        $this->dataBinder = $binder;
    }


    protected function render(string $templateName, $data = null, $count = null)
    {
        $this->template->render($templateName, $data, $count);
    }

    protected function redirect(string $url)
    {
        header('Location:'.$url);
        exit;
    }

}
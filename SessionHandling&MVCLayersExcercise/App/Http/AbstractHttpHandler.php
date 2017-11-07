<?php

namespace App\Http;


use Core\DataBinderInterface;
use Core\TemplateInterface;

abstract class AbstractHttpHandler
{
    /**
     * @var TemplateInterface
     */
    private $template;

    /**
     * @var DataBinderInterface
     */
    protected $dataBinder;

    /**
     * AbstractHttpHandler constructor.
     * @param TemplateInterface $template
     */
    public function __construct(TemplateInterface $template, DataBinderInterface $dataBinder)
    {
        $this->template = $template;
        $this->dataBinder = $dataBinder;
    }

    public function render(string $templateName, $data = null)
    {
        return $this->template->render($templateName, $data);
    }

    public function redirect($url)
    {
        header("Location: $url");
    }
}
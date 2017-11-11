<?php

namespace TaskManagement\Http;

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

    public function render(string $templateName, $data = null, $count = null)
    {
        return $this->template->render($templateName, $data, $count);
    }

    public function redirect($url)
    {
        header("Location: $url");
    }
}
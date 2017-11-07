<?php

namespace App\Http;

use Core\TemplateInterface;

abstract class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    protected $template;

    /**
     * HttpHandlerAbstract constructor.
     * @param TemplateInterface $template
     */
    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;
    }


    protected function render(string $templateName, $data = null)
    {
        $this->template->render($templateName, $data);
    }

    protected function redirect(string $url)
    {
        header('Location:'.$url);
        exit;
    }

}
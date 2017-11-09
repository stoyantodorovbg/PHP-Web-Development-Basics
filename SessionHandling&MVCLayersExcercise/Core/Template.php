<?php


namespace Core;


class Template implements TemplateInterface
{

    const TEMPLATES_FOLDER = 'App/Templates/';
    const TEMPLATES_EXTENSION = '.php';

    public function render(string $templateName, $data, $count)
    {
        require_once self::TEMPLATES_FOLDER.$templateName.self::TEMPLATES_EXTENSION;
    }
}
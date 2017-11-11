<?php


namespace TaskManagement\Http;


use TaskManagement\Service\CategoryService;

class CategoryHttpHandler extends AbstractHttpHandler
{
    public function getCount(CategoryService $categoryService)
    {
        $categories = $categoryService->getCount();
        $this->render('reportPage', $categories);
    }

}
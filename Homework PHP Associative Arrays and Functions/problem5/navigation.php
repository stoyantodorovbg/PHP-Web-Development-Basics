<?php
if (isset($_GET['generate'])) {
    if (isset($_GET['categories']) &&
        isset($_GET['tags']) &&
        isset($_GET['months'])) {

        $categoriesArr = explode(', ', $_GET['categories']);
        $tagsArr = explode(', ', $_GET['tags']);
        $monthsArr = explode(', ', $_GET['months']);

        $html = '';
        $html .= "<h2>Categories</h2><ul>";
        foreach ($categoriesArr as $category) {
            $html .= "<li>$category</li>";
        }
        $html .= '</ul>';

        $html .= "<h2>Tags</h2><ul>";
        foreach ($tagsArr as $tags) {
            $html .= "<li>$tags</li>";
        }
        $html .= '</ul>';

        $html .= "<h2>Months</h2><ul>";
        foreach ($monthsArr as $month) {
            $html .= "<li>$month</li>";
        }
        $html .= '</ul>';
    }
}

include("form.php");
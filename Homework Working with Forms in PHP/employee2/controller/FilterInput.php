<?php


class FilterInput
{
    public function saveFromTagsPost() {
        foreach ($_POST as $i) {
            $i = filter_var ( $i, FILTER_SANITIZE_STRING);
        }
    }

    public function saveFromTagsGet() {
        foreach ($_GET as $i) {
            $i = filter_var ( $i, FILTER_SANITIZE_STRING);
        }
    }

    public function saveFromTagsRequest() {
        foreach ($_REQUEST as $i) {
            $i = filter_var ( $i, FILTER_SANITIZE_STRING);
        }
    }
}
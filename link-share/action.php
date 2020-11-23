<?php

class Link {

    public $id;
    public $url;
    public $comment;

    public function __construct($id, $url, $comment)
    {
        $this->id = $id;
        $this->url = $url;
        $this->comment = $comment;
    }
}

if (isset($_GET['d'])) {

    $data = [];
    foreach (json_decode(file_get_contents("links.json", true)) as $l) {
        if ($l->id !== $_GET['d']) {
            $data[] = $l;
        }
    }
    $data_json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents("links.json", $data_json);
    header("Location: ./");

}

if (isset($_GET['link'])) {

    $id = date("YmdHis");
    $link = preg_replace("(^https?://)", "", $_GET['link']);
    $comment = $_GET['comment'];

    if (strlen($link) > 2) {

        $comment = $_GET['comment'];
        $data = [new Link($id, $link, $comment)];

        foreach (json_decode(file_get_contents("links.json", true)) as $l) {
            $data[] = $l;
        }

        $data_json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents("links.json", $data_json);
    }
    header("Location: ./");
}

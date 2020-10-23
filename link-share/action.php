<?php

class Link {

    public $url;
    public $comment;

    /**
     * Link constructor.
     * @param $url
     * @param $comment
     */
    public function __construct($url, $comment)
    {
        $this->url = $url;
        $this->comment = $comment;
    }

}

if (isset($_GET['link'])) {

    $link = preg_replace("(^https?://)", "", $_GET['link']);
    $comment = $_GET['comment'];
    if (strlen($link) > 2) {

        $comment = $_GET['comment'];
        $data = [new Link($link, $comment)];

        foreach (json_decode(file_get_contents("links.json", true)) as $l) {
            $data[] = $l;
        };

        $data_json = json_encode($data, JSON_PRETTY_PRINT);

        file_put_contents("links.json", $data_json);
    }

    header("Location: ./");
}

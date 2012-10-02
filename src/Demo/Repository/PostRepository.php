<?php

namespace Demo\Repository;

class PostRepository
{
    public function findAll()
    {
        return array(
            array(
                "title" => "Hello World",
                "author" => "Dave Marshall",
                "body" => "Hello World",
            ),
        );
    }
}

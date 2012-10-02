<?php

namespace Demo\Controller;

use Demo\Repository\PostRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class PostController
{
    protected $repo;

    public function __construct(PostRepository $repo)
    {
        $this->repo = $repo;
    }

    public function indexJson()
    {
        return new JsonResponse($this->repo->findAll());
    }
}

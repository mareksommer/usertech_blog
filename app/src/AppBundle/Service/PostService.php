<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Utils\Slugger;
use AppBundle\Entity\Post;

class PostService
{ 
    protected $manager;
    protected $repository;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
        $this->repository = $manager->getRepository('AppBundle:Post');
    }

    public function getPostSlug(Post $post): string {
        $rawSlug = $post->getSlug();
        $postId = $post->getId();

        $slug = Slugger::slugify($rawSlug);
        $uniqueSlug = $this->getUniqueSlug($slug, $postId);
        
        return $uniqueSlug;
    }

    private function getUniqueSlug(string $slug, ?string $postId = null): string {

        if ($postId) {
            $slugExists = $this->repository->findExistingSlug($slug, $postId);
        }
        else {
            $slugExists = $this->repository->findBySlug($slug);
        }
        
        if ($slugExists) {
            $slug .= '_' . rand(0, 100);
            $this->getUniqueSlug($slug);
        }

        return $slug;
    }

}
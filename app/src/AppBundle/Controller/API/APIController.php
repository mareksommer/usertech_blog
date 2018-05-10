<?php

namespace AppBundle\Controller\API;

use AppBundle\Entity\Post;
use AppBundle\Repository\PostRepository;
use AppBundle\Events;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class APIController extends Controller
{
    /**
     * @Route("/api/posts-list", name="api_list")
     */
    public function list(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAllforAPI();

        return $this->json($posts);
    }

    /**
     * @Route("/api/post/{id}", 
     *  defaults={"id": ""}, 
     *  name="api_post_detail")
     */
    public function postDetail(?Post $post, EventDispatcherInterface $eventDispatcher): Response
    {
        if ($post) {
            $event = new GenericEvent($post);
            $eventDispatcher->dispatch(Events::POST_SHOW, $event);

            $result = [
                'id' => $post->getId(),
                'title' => $post->getTitle(),
                'text' => $post->getText(),
                'date' => $post->getDate(),
                'tags' => $post->getTagsArray(),
                'slug' => $post->getSlug(),
                'viewsCount' => $post->getViewsCount()
            ];
        }
        else {
            $result = [
                'error' => 'Post not found'
            ];
        }


        return $this->json($result);
    }
}

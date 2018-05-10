<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Repository\PostRepository;
use AppBundle\Events;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class BlogController extends Controller
{
    /**
     * @Route("/{cursor}", defaults={"cursor"=null}, name="frontend_homepage")
     */
    public function index(PostRepository $postRepository, ?string $cursor): Response
    {
        $posts = $postRepository->cursorPagination($cursor, $limit = 2);
        
        $postsLeft = 0;
        if ($posts) {
            $postsLeft = (int) $postRepository->getPostsLeftByDate(end($posts)->getDate());
        }

        return $this->render('frontend/blog/index.html.twig', [
                'posts' => $posts,
                'postsLeft' => $postsLeft
            ]
        );
    }

    /**
     * @Route("/post/{slug}", 
     *  defaults={"slug": 0}, 
     *  name="frontend_post_detail")
     */
    public function postDetail(?Post $post, EventDispatcherInterface $eventDispatcher): Response
    {
        if ($post) {
            $event = new GenericEvent($post);
            $eventDispatcher->dispatch(Events::POST_SHOW, $event);
        }

        return $this->render('frontend/blog/detail.html.twig', ['post' => $post]);
    }
}

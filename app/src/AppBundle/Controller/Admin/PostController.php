<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Post;
use AppBundle\Repository\PostRepository;
use AppBundle\Form\PostType;
use AppBundle\Utils\Slugger;
use AppBundle\Service\PostService;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    /**
     * @Route("/admin", name="admin_homepage")
     */
    public function list(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll(['publishedAt' => 'DESC']);

        return $this->render('admin/post/list.html.twig', ['posts' => $posts]);
    }

    /**
     * @Route("/admin/edit-post/{id}", 
     *  defaults={"id": 0}, 
     *  name="admin_edit_post")
     */
    public function edit(Request $request, ?Post $post, PostService $postService): Response
    {
        if (!$post) {
            $post = new Post();
        }
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post->setSlug($postService->getPostSlug($post));

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            $this->addFlash('success', 'Post updated successfully');

            return $this->redirectToRoute('admin_edit_post', ['id' => $post->getId()]);
        }

        return $this->render('admin/post/edit.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }

}

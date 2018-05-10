<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\EventSubscriber;

use AppBundle\Entity\Post;
use AppBundle\Events;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class PostShowSubscriber implements EventSubscriberInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::POST_SHOW => 'onPostShow',
        ];
    }

    public function onPostShow(GenericEvent $event): void
    {
        /** @var Post $post */
        $post = $event->getSubject();
        $newPostViewsCount = ((int) $post->getViewsCount()) + 1;
        $post->setViewsCount($newPostViewsCount);

        $this->entityManager->persist($post);
        $this->entityManager->flush();
    }
}

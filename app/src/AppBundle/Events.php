<?php

namespace AppBundle;

final class Events
{
    /**
     *
     * @Event("Symfony\Component\EventDispatcher\GenericEvent")
     *
     * @var string
     */
    public const POST_SHOW = 'post.show';
}

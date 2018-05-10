<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 * @ORM\Table(indexes={@ORM\Index(name="date_index", columns={"date"})})
 * @UniqueEntity(fields={"slug"}, message="Url Slug {{ value }} already exists")
 */
class Post
{
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="guid")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=150)
     * @Assert\Length(max=150, maxMessage="post.too_long_title")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var Tag[]|ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", cascade={"persist"})
     * @ORM\JoinTable(name="post_tags")
     * @ORM\OrderBy({"name": "ASC"})
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     * @Assert\Length(max=255, maxMessage="post.too_long_slug")
     */
    private $slug;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var boolean
     *
     * @ORM\Column(name="views_count", type="integer")
     */
    private $viewsCount;


    public function __construct() {
        $this->date = new \DateTime();
        $this->tags = new ArrayCollection();
        $this->isActive = true;
        $this->viewsCount = 0;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setDate(?\DateTime $date): void
    {
        $this->date = $date;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function getTags(): ?Collection
    {
        return $this->tags;
    }

    public function getTagsArray(): ?array {
        $array = []; 
        foreach ($this->tags as $tag) {
            $array['name'] = $tag->getName();
        }

        return $array;
    }

    public function addTag(?Tag ...$tags): void
    {
        foreach ($tags as $tag) {
            if (!$this->tags->contains($tag)) {
                $this->tags->add($tag);
            }
        }
    }

    public function removeTag(Tag $tag): void
    {
        $this->tags->removeElement($tag);
    }

    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setViewsCount(int $viewsCount): void
    {
        $this->viewsCount = $viewsCount;
    }

    public function getViewsCount(): ?int
    {
        return $this->viewsCount;
    }
}


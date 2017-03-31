<?php

namespace App\Model;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class SourceEntity
{
    protected $id;
    protected $name;
    protected $source_link;
    protected $rss_feed_link;
    protected $is_active;

    static public function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraint('name', new Assert\Length(array('min' => 5, 'max' => 30)));
        $metadata->addPropertyConstraint('source_link', new Assert\NotBlank());
        $metadata->addPropertyConstraint('source_link', new Assert\Url());
        $metadata->addPropertyConstraint('source_link', new Assert\Length(array('min' => 5, 'max' => 20)));
        $metadata->addPropertyConstraint('rss_feed_link', new Assert\NotBlank());
        $metadata->addPropertyConstraint('rss_feed_link', new Assert\Url());
        $metadata->addPropertyConstraint('rss_feed_link', new Assert\Length(array('min' => 5, 'max' => 20)));
    }

    public function __construct(array $data)
    {
        // no id if we're creating
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }

        $this->name = $data['name'];
        $this->source_link = $data['source_link'];
        $this->rss_feed_link = $data['rss_feed_link'];
        if (isset($data['is_active'])){
          $this->is_active = $data['is_active'];
        }else{
          $this->is_active = false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSourceLink()
    {
        return $this->source_link;
    }

    public function getRssFeedLink()
    {
        return $this->rss_feed_link;
    }

    public function isActive()
    {
        return $this->is_active;
    }

}

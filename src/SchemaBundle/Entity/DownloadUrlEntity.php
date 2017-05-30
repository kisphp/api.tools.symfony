<?php

namespace SchemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kisphp\Utils\Status;

/**
 * @ORM\Entity
 * @ORM\Table(name="download_urls", options={"collate": "utf8_general_ci", "charset": "utf8"})
 */
class DownloadUrlEntity
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"unsigned": true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"default": 2})
     */
    protected $status = Status::ACTIVE;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $registered;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $url;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return \DateTime
     */
    public function getRegistered()
    {
        return $this->registered;
    }

    /**
     * @param \DateTime $registered
     */
    public function setRegistered($registered)
    {
        $this->registered = $registered;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}

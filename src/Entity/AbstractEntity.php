<?php
/**
 * @link      http://github.com/zetta-repo/tss-doctrineutil for the canonical source repository
 * @copyright Copyright (c) 2016 Zetta Code
 */

namespace TSS\DoctrineUtil\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractEntity
 *
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
abstract class AbstractEntity
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updatedAt;

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function createdAt()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = $this->createdAt;
    }

    /**
     * @ORM\PreUpdate
     */
    public function updateAt()
    {
        $this->updatedAt = new \DateTime();
    }
}
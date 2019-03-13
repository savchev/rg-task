<?php
/**
 * Created by PhpStorm.
 * User: kiril_savchev
 * Date: 12.3.2019 г.
 * Time: 22:18
 */

namespace Application\Entity;

/**
 * Class User
 * @package Application\Entity
 */
class User
{

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $company;

    /**
     * @var string
     */
    protected $bio;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $avatar;

    /**
     * @return string
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     * @return User
     */
    public function setUuid(string $uuid): User
    {
        $this->uuid = $uuid;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param string $company
     * @return User
     */
    public function setCompany(string $company): User
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return string
     */
    public function getBio(): ?string
    {
        return $this->bio;
    }

    /**
     * @param string $bio
     * @return User
     */
    public function setBio(string $bio): User
    {
        $this->bio = $bio;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return User
     */
    public function setTitle(string $title): User
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     * @return User
     */
    public function setAvatar(string $avatar): User
    {
        $this->avatar = $avatar;
        return $this;
    }
}

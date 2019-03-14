<?php

namespace Application\Entity;

/**
 * Class User
 *
 * The user object
 *
 * @package Application\Entity
 */
class User
{

    /**
     * The user unique identity
     *
     * @var string
     */
    protected $uuid;

    /**
     * The user's company
     *
     * @var string
     */
    protected $company;

    /**
     * The user's biography
     *
     * @var string
     */
    protected $bio;

    /**
     * The user' names
     *
     * @var string
     */
    protected $name;

    /**
     * The user's job title
     *
     * @var string
     */
    protected $title;

    /**
     * The user's avatar
     *
     * @var string
     */
    protected $avatar;

    /**
     * Return the UUID
     *
     * @return string|null The user's unique identity
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * Set the user's UUID
     *
     * @param string $uuid The UUID
     *
     * @return User Self-reference
     */
    public function setUuid(string $uuid): User
    {
        $this->uuid = $uuid;
        return $this;
    }

    /**
     * Return the user's company
     *
     * @return string|null The user's company
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * Sets the user's company
     *
     * @param string $company The company name
     *
     * @return User Self-reference
     */
    public function setCompany(string $company): User
    {
        $this->company = $company;
        return $this;
    }

    /**
     * Sets the user's biography
     *
     * @return string|null The user's biography
     */
    public function getBio(): ?string
    {
        return $this->bio;
    }

    /**
     * Sets the user's biography
     *
     * @param string $bio The user's biography
     *
     * @return User Self-reference
     */
    public function setBio(string $bio): User
    {
        $this->bio = $bio;
        return $this;
    }

    /**
     * Returns the user's full name
     *
     * @return string|null The user full name
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets the user full name
     *
     * @param string $name The user full name
     *
     * @return User Self-reference
     */
    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Returns the user's job title
     *
     * @return string|null The job title
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Sets the job title
     *
     * @param string $title The job title
     *
     * @return User Self-reference
     */
    public function setTitle(string $title): User
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Returns the user's avatar
     *
     * @return string|null The user's avatar URL
     */
    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    /**
     * Sets the user's avatar
     *
     * @param string $avatar The avatar URL
     *
     * @return User Self-reference
     */
    public function setAvatar(string $avatar): User
    {
        $this->avatar = $avatar;
        return $this;
    }
}

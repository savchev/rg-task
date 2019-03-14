<?php

namespace Application\Service\Repository;

use Application\Entity\User;

/**
 * Class UserRepository
 *
 * Repository object for fetching users
 *
 * @package Application\Service\Repository
 */
class UserRepository extends AbstractApiRepository
{
    /**
     * Create new user object and populate it with data
     *
     * @param mixed $row Data for the object
     *
     * @return User Object, filled with the data
     */
    public function hydrate($row)
    {
        $user = new User();
        if (array_key_exists('uuid', $row)) {
            $user->setUuid(strip_tags($row['uuid']));
        }
        if (array_key_exists('name', $row)) {
            $user->setName(strip_tags($row['name']));
        }
        if (array_key_exists('title', $row) && $row['title']) {
            $user->setTitle(strip_tags($row['title']));
        }
        if (array_key_exists('company', $row) && $row['company']) {
            $user->setCompany(strip_tags($row['company']));
        }
        if (array_key_exists('bio', $row) && $row['bio']) {
            $user->setBio(strip_tags($row['bio']));
        }
        if (array_key_exists('avatar', $row) && $row['avatar']) {
            $user->setAvatar(strip_tags(stripslashes($row['avatar'])));
        }
        return $user;
    }
}

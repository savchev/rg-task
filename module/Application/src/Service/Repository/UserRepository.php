<?php
/**
 * Created by PhpStorm.
 * User: kiril_savchev
 * Date: 12.3.2019 г.
 * Time: 23:16
 */

namespace Application\Service\Repository;

use Application\Entity\User;

class UserRepository extends AbstractApiRepository
{
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

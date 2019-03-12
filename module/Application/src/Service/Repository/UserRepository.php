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
            $user->setUuid($row['uuid']);
        }
        if (array_key_exists('name', $row)) {
            $user->setName($row['name']);
        }
        if (array_key_exists('title', $row)) {
            $user->setTitle($row['title']);
        }
        if (array_key_exists('company', $row)) {
            $user->setCompany($row['company']);
        }
        if (array_key_exists('bio', $row)) {
            $user->setBio($row['bio']);
        }
        if (array_key_exists('avatar', $row)) {
            $user->setAvatar(stripslashes($row['avatar']));
        }
        return $user;
    }


}
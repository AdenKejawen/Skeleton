<?php
/**
 * @author Aden Kejawen <surya.kejawen@gmail.com>
 *
 * This file is part of Aden Kejawen Bundle
 **/
namespace Aden\Kejawen\Bundle\Entity;

interface UserInterface
{
    public function setProfile(ProfileInterface $profile);

    public function getProfile();
}

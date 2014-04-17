<?php
/**
 * @author Aden Kejawen <surya.kejawen@gmail.com>
 *
 * This file is part of Aden Kejawen Bundle
 **/
namespace Aden\Kejawen\Bundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity(repositoryClass = "Aden\Kejawen\Bundle\Repository\UserRepository")
 * @ORM\Table(name = "core_user")
 **/
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type = "integer")
     * @ORM\GeneratedValue(strategy = "AUTO")
     **/
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity = "Aden\Kejawen\Bundle\Entity\Group")
     * @ORM\JoinTable(name = "core_user_group",
     *      joinColumns = {@ORM\JoinColumn(name = "user_id", referencedColumnName = "id")},
     *      inverseJoinColumns = {@ORM\JoinColumn(name = "group_id", referencedColumnName = "id")}
     * )
     **/
    protected $groups;

    public function __construct()
    {
        parent::__construct();
    }
}

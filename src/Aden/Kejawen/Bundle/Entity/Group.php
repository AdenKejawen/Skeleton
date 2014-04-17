<?php
/**
 * @author Aden Kejawen <surya.kejawen@gmail.com>
 *
 * This file is part of Aden Kejawen Bundle
 **/
namespace Aden\Kejawen\Bundle\Entity;

use FOS\UserBundle\Model\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass = "Aden\Kejawen\Bundle\Repository\GroupRepository")
 * @ORM\Table(name = "core_group")
 **/
class Group extends BaseGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(type = "integer")
     * @ORM\GeneratedValue(strategy = "AUTO")
     **/
    protected $id;
}

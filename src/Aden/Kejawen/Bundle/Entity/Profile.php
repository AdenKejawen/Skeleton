<?php
/**
 * @author Aden Kejawen <surya.kejawen@gmail.com>
 *
 * This file is part of Aden Kejawen Bundle
 **/
namespace Aden\Kejawen\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass = "Aden\Kejawen\Bundle\Repository\ProfileRepository")
 * @ORM\Table(name="core_profile")
 */
class Profile implements ProfileInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type = "integer")
     * @ORM\GeneratedValue(strategy = "AUTO")
     **/
    protected $id;
    
    /**
     * @ORM\OneToOne(targetEntity = "Aden\Kejawen\Bundle\Entity\User")
     * @ORM\JoinColumn(name = "user_id", referencedColumnName = "id")
     **/
    protected $user;

    /**
     * @ORM\Column(name = "gender", type = "smallint")
     **/
    protected $gender;
    
    /**
     * @ORM\Column(name = "fullname", type = "string", length = 27)
     **/
    protected $fullName;
    
    /**
     * @ORM\Column(name = "birtday", type = "datetime")
     **/
    protected $birtday;

    /**
     * @ORM\Column(name = "address", type = "string", length = 255)
     **/
    protected $address;

    /**
     * @ORM\Column(name = "photo", type = "string", length = 255)
     **/
    protected $photo;
    
    const GENDER_UNDEFINED  = 0;
    const GENDER_MALE       = 1;
    const GENDER_FEMALE     = 2;
    
    private static $GENDER  = array(self::GENDER_UNDEFINED, self::GENDER_MALE, self::GENDER_FEMALE);
    
    public function __construct()
    {
        $this->gender   = self::GENDER_UNDEFINED;
    }
    
    public function getFullName()
    {
        return $this->fullName;
    }
    
    public function getGender()
    {
        return $this->gender;
    }

    public function getBirtday()
    {
        return $this->birtday;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPhoto()
    {
        return $this->photo;
    }
    
    public function getUser()
    {
        return $this->user;
    }

    public function setGender($gender)
    {
        if (! in_array($gender, self::$GENDER)) {
            throw \Exception(sprintf("unsupported gender %s", $gender));
        }
        $this->gender = $gender;
        
        return $this;
    }

    public function setFullName($fullName)
    {
        $this->fullName = strtoupper($fullName);
        
        return $this;
    }
    
    public function setBirtday(\DateTime $birtday)
    {
        $this->birtday = $birtday;
        
        return $this;
    }

    public function setAddress($address)
    {
        $this->address =strtoupper($address);
        
        return $this;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
        
        return $this;
    }
    
    public function setUser(User $user)
    {
        $this->user = $user;
    }
}

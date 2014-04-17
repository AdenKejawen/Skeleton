<?php
/**
 * @author Aden Kejawen <surya.kejawen@gmail.com>
 *
 * This file is part of Aden Kejawen Bundle
 **/
namespace Aden\Kejawen\Bundle\Entity;

interface ProfileInterface
{
    public function getUser();
    
    public function getFullName();

    public function getGender();
    
    public function getBirtday();
    
    public function getAddress();
    
    public function getPhoto();
}

<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;



class Device
{
	
	public function __construct()
	{
		
	}
	
	public function __toString()
	{
		
	}
	
	
	protected $id_wezel=null;
	
	
	
}
	
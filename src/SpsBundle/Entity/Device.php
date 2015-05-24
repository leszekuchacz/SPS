<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

 /**
 * @ORM\Entity(repositoryClass="SpsBundle\Entity\Repository\DeviceRepository")
 * @ORM\Table(name="kabel")
 * @ORM\HasLifecycleCallbacks()
 */

class Device
{
	
	public function __construct()
	{
		
	}
	
	public function __toString()
	{
		
	}
	
	/**
	 * @ORM\ManyToOne(targetEntity="SpsBundle\Entity\Wezel", inversedBy="id_kabel")
	 * @ORM\JoinColumn(name="id_wezel", referencedColumnName="id", nullable=true)
	 */
	protected $id_wezel=null;
	
	
	
}
	
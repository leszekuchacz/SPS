<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="rejon")
 */
class Rejon {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\OneToOne(targetEntity="Histori", inversedBy="history")
	 * @ORM\JoinColumn(name="id_histori", referencedColumnName="id")
	 */
	protected $id_histori;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $nazwa;
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $kod;
	
	
}
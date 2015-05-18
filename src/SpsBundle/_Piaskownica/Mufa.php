<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * 
 * @ORM\Entity
 * @ORM\Table(name="mufa")
 *
 */
class Mufa{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	/**
	 * @ORM\ManyToOne(targetEntity="Rejon", inversedBy="mufy")
	 * @ORM\JoinColumn(name="id_rejon", referencedColumnName="id")
	 */
	protected $id_rejon;
	/**
	 * @ORM\OneToOne(targetEntity="Histori", inversedBy="history")
	 * @ORM\JoinColumn(name="id_histori", referencedColumnName="id")
	 */
	protected $id_histori;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $kod;
	/**
	 * @ORM\Column(type="text")
	 */
	protected $opis;
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $type;
	/**
	 * @ORM\Column(type="double")
	 */
	protected $gps_n;
	/**
	 * @ORM\Column(type="double")
	 */
	protected $gps_e;
	/**
	 * @ORM\Column(type="integer")
	 */

}
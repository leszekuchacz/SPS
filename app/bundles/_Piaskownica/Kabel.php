<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="kabel")
 *
 */

class Kabel
{
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
	 * @ORM\OneToOne(targetEntity="Mufa", inversedBy="kable")
	 * @ORM\JoinColumn(name="id_mufa_start", referencedColumnName="id")
	 */
	protected $id_mufa_start;
	/**
	 * @ORM\OneToOne(targetEntity="Mufa", inversedBy="kable")
	 * @ORM\JoinColumn(name="id_mufa_end", referencedColumnName="id")
	 */
	protected $id_mufa_end;
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $producent;
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $j;
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $tubs;
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $lenght;
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $standard;
	
}
<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name=wlokno")
 *
 */

class Wlokno{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	/**
	 * @ORM\ManyToOne(targetEntity="Kabel", inversedBy="kable")
	 * @ORM\JoinColumn(name="id_kabel", referencedColumnName="id")
	 */
	protected $id_kabel;
	/**
	 * @ORM\OneToOne(targetEntity="wlokno", inversedBy="wlokna")
	 * @ORM\JoinColumn(name="id_rejon", referencedColumnName="id")
	 */
	protected $id_spaw_start;
	/**
	 * @ORM\OneToOne(targetEntity="wlokno", inversedBy="wlokna")
	 * @ORM\JoinColumn(name="id_spaw_start", referencedColumnName="id")
	 */
	protected $id_spaw_end;
	/**
	 * @ORM\OneToOne(targetEntity="Histori", inversedBy="history")
	 * @ORM\JoinColumn(name="id_histori", referencedColumnName="id")
	 */
	protected $id_histori_spaw_start;
	/**
	 * @ORM\OneToOne(targetEntity="Histori", inversedBy="history")
	 * @ORM\JoinColumn(name="id_histori", referencedColumnName="id")
	 */
	protected $id_histori_spaw_end;
}
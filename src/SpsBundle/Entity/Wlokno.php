<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity(repositoryClass="SpsBundle\Entity\Repository\WloknoRepository")
 * @ORM\Table(name="wlokno")
 * @ORM\HasLifecycleCallbacks()
 */
class Wlokno{
	

	public function __toString()
	{
		return $this->id.' ';
	}
	
	public function __construct()
	{
		//self::$historiInstance = new Histori($user,'tsdasd');
		$this->histori = new ArrayCollection();
		$this->tags = new ArrayCollection();
	}
	
	
	protected $tags;
	public function getTags()
	{
		return $this->tags;
	}
	
	/**
	 * @ORM\OneToMany(targetEntity="Histori", mappedBy="id_wlokno")
	 */
	private $histori;
	
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	/**
	 * @ORM\ManyToOne(targetEntity="Kabel", inversedBy="inverseIdKabel")
	 * @ORM\JoinColumn(name="id_kabel", referencedColumnName="id")
	 */
	protected $id_kabel;


	/**
	 * @ORM\ManyToOne(targetEntity="wlokno", inversedBy="inversedId_spaw_start")
	 * @ORM\JoinColumn(name="id_spaw_start", referencedColumnName="id")
	 */
	protected $id_spaw_start;
	/**
	 * @ORM\OneToMany(targetEntity="Wlokno", mappedBy="id_spaw_start")
	 */
	private $inversedId_spaw_start;
	
	/**
	 * @ORM\ManyToOne(targetEntity="wlokno",inversedBy="inversedId_spaw_end")
	 * @ORM\JoinColumn(name="id_spaw_end", referencedColumnName="id")
	 */
	protected $id_spaw_end;
	/**
	 * @ORM\OneToMany(targetEntity="Wlokno", mappedBy="id_spaw_end")
	 */
	private $inversedId_spaw_end;
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id_kabel
     *
     * @param \SpsBundle\Entity\Kabel $idKabel
     * @return Wlokno
     */
    public function setIdKabel(\SpsBundle\Entity\Kabel $idKabel = null)
    {
        $this->id_kabel = $idKabel;

        return $this;
    }

    /**
     * Get id_kabel
     *
     * @return \SpsBundle\Entity\Kabel 
     */
    public function getIdKabel()
    {
        return $this->id_kabel;
    }

    /**
     * Set id_spaw_start
     *
     * @param \SpsBundle\Entity\wlokno $idSpawStart
     * @return Wlokno
     */
    public function setIdSpawStart(\SpsBundle\Entity\wlokno $idSpawStart = null)
    {
        $this->id_spaw_start = $idSpawStart;

        return $this;
    }

    /**
     * Get id_spaw_start
     *
     * @return \SpsBundle\Entity\wlokno 
     */
    public function getIdSpawStart()
    {
        return $this->id_spaw_start;
    }

    /**
     * Set id_spaw_end
     *
     * @param \SpsBundle\Entity\wlokno $idSpawEnd
     * @return Wlokno
     */
    public function setIdSpawEnd(\SpsBundle\Entity\wlokno $idSpawEnd = null)
    {
        $this->id_spaw_end = $idSpawEnd;

        return $this;
    }

    /**
     * Get id_spaw_end
     *
     * @return \SpsBundle\Entity\wlokno 
     */
    public function getIdSpawEnd()
    {
        return $this->id_spaw_end;
    }

    /**
     * Set id_histori_spaw_start
     *
     * @param \SpsBundle\Entity\Histori $idHistoriSpawStart
     * @return Wlokno
     */
    public function setIdHistoriSpawStart(\SpsBundle\Entity\Histori $idHistoriSpawStart = null)
    {
        $this->id_histori_spaw_start = $idHistoriSpawStart;

        return $this;
    }

    /**
     * Get id_histori_spaw_start
     *
     * @return \SpsBundle\Entity\Histori 
     */
    public function getIdHistoriSpawStart()
    {
        return $this->id_histori_spaw_start;
    }

    /**
     * Set id_histori_spaw_end
     *
     * @param \SpsBundle\Entity\Histori $idHistoriSpawEnd
     * @return Wlokno
     */
    public function setIdHistoriSpawEnd(\SpsBundle\Entity\Histori $idHistoriSpawEnd = null)
    {
        $this->id_histori_spaw_end = $idHistoriSpawEnd;

        return $this;
    }

    /**
     * Get id_histori_spaw_end
     *
     * @return \SpsBundle\Entity\Histori 
     */
    public function getIdHistoriSpawEnd()
    {
        return $this->id_histori_spaw_end;
    }
    
   
}

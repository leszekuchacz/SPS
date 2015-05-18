<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="SpsBundle\Entity\Repository\HistoriRepository")
 * @ORM\Table(name="histori")
 * @ORM\HasLifecycleCallbacks()
 */
class Histori{
	
	
	
	
	public function __construct($user,$operacja)
	{
		
		$this -> setData(new \DateTime());
		$this -> setIdUser($user);
		$this-> setOperacja($operacja);
	
	}
	/**
	* @ORM\PreUpdate
	*/
	public function setUpdatedValue()
	{
		$this->setData(new \DateTime());
	}
	
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */	
	protected $id;
	
	/**
	 * @ORM\OneToOne(targetEntity="User",inversedBy="inverseHistori")
	 * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
	 */
	protected $id_user;
	
	/**
	 * @ORM\ManyToOne(targetEntity="SpsBundle\Entity\Rejon", inversedBy="histori")
	 * @ORM\JoinColumn(name="id_region", referencedColumnName="id")
	 */
	protected $id_rejon;
	/**
	 * @ORM\ManyToOne(targetEntity="Mufa", inversedBy="histori")
	 * @ORM\JoinColumn(name="id_mufa", referencedColumnName="id")
	 */
	protected $id_mufa;
	/**
	 * @ORM\ManyToOne(targetEntity="Kabel", inversedBy="histori")
	 * @ORM\JoinColumn(name="id_kabel", referencedColumnName="id")
	 */
	protected $id_kabel;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Wlokno", inversedBy="histori")
	 * @ORM\JoinColumn(name="id_wlokno", referencedColumnName="id")
	 */
	protected $id_wlokno;
	
	
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $data;
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $operacja;

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
     * Set data
     *
     * @param \DateTime $data
     * @return Histori
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set operacja
     *
     * @param string $operacja
     * @return Histori
     */
    public function setOperacja($operacja)
    {
        $this->operacja = $operacja;

        return $this;
    }

    /**
     * Get operacja
     *
     * @return string 
     */
    public function getOperacja()
    {
        return $this->operacja;
    }

    /**
     * Set id_user
     *
     * @param \SpsBundle\Entity\User $idUser
     * @return Histori
     */
    public function setIdUser(\SpsBundle\Entity\User $idUser = null)
    {
        $this->id_user = $idUser;

        return $this;
    }

    /**
     * Get id_user
     *
     * @return \SpsBundle\Entity\User 
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * Set id_rejon
     *
     * @param \SpsBundle\Entity\Rejon $idRejon
     * @return Histori
     */
    public function setIdRejon(\SpsBundle\Entity\Rejon $idRejon = null)
    {
        $this->id_rejon = $idRejon;

        return $this;
    }

    /**
     * Get id_rejon
     *
     * @return \SpsBundle\Entity\Rejon 
     */
    public function getIdRejon()
    {
        return $this->id_rejon;
    }

    /**
     * Set id_mufa
     *
     * @param \SpsBundle\Entity\Mufa $idMufa
     * @return Histori
     */
    public function setIdMufa(\SpsBundle\Entity\Mufa $idMufa = null)
    {
        $this->id_mufa = $idMufa;

        return $this;
    }

    /**
     * Get id_mufa
     *
     * @return \SpsBundle\Entity\Mufa 
     */
    public function getIdMufa()
    {
        return $this->id_mufa;
    }

    /**
     * Set id_kabel
     *
     * @param \SpsBundle\Entity\Kabel $idKabel
     * @return Histori
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
     * Set id_wlokno
     *
     * @param \SpsBundle\Entity\Wlokno $idWlokno
     * @return Histori
     */
    public function setIdWlokno(\SpsBundle\Entity\Wlokno $idWlokno = null)
    {
        $this->id_wlokno = $idWlokno;

        return $this;
    }

    /**
     * Get id_wlokno
     *
     * @return \SpsBundle\Entity\Wlokno 
     */
    public function getIdWlokno()
    {
        return $this->id_wlokno;
    }
    
    public function __toString()
    {
    	return $this->getTitle();
    }
}

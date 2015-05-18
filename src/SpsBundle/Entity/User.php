<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="SpsBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="users")
 * @ORM\HasLifecycleCallbacks()
 */
class User{
	
	
	public function __construct(){
		$this ->setCreated(new \DateTime());
		$this ->setLastLoged(new \DateTime());
	}
	/**
	 * @ORM\PreUpdate
	 */
	public function setUpdatedValue(){
	
		$this-> setLastLoged(new \DateTime());
	}
	
	/**
	* @ORM\OneToOne(targetEntity="Histori",mappedBy="id_user")
	*/
	private $inverseHistori;
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	/**
	 * @ORM\Column(type="string", length=20)
	 */
	protected $nazwa;
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $prawa;
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $created;
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $lastLoged;
	/**
	 * @ORM\Column(type="text")
	 */
	protected $pass;
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
     * Set nazwa
     *
     * @param string $nazwa
     * @return User
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    /**
     * Get nazwa
     *
     * @return string 
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }

    /**
     * Set prawa
     *
     * @param integer $prawa
     * @return User
     */
    public function setPrawa($prawa)
    {
        $this->prawa = $prawa;

        return $this;
    }

    /**
     * Get prawa
     *
     * @return integer 
     */
    public function getPrawa()
    {
        return $this->prawa;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return User
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set lastLoged
     *
     * @param \DateTime $lastLoged
     * @return User
     */
    public function setLastLoged($lastLoged)
    {
        $this->lastLoged = $lastLoged;

        return $this;
    }

    /**
     * Get lastLoged
     *
     * @return \DateTime 
     */
    public function getLastLoged()
    {
        return $this->lastLoged;
    }

    /**
     * Set pass
     *
     * @param string $pass
     * @return User
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string 
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set inverseHistori
     *
     * @param \SpsBundle\Entity\Histori $inverseHistori
     * @return User
     */
    public function setInverseHistori(\SpsBundle\Entity\Histori $inverseHistori = null)
    {
        $this->inverseHistori = $inverseHistori;

        return $this;
    }

    /**
     * Get inverseHistori
     *
     * @return \SpsBundle\Entity\Histori 
     */
    public function getInverseHistori()
    {
        return $this->inverseHistori;
    }
    
    public function __toString()
    {
    	return $this->getTitle();
    }
}

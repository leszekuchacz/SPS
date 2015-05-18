<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\Common\Collections\ArrayCollection;
use SpsBundle\Entity\Histori;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Doctrine\Common\Collections;
/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="SpsBundle\Entity\Repository\RejonRepository")
 * @ORM\Table(name="rejon")
 * @ORM\HasLifecycleCallbacks()
 */
class Rejon {
	
	
	
	private static $historiInstance = false;
	
	public static function getInstance()
	{
		if( self::$historiInstance == false )
		{
			self::$historiInstance = new Histori();
		
		}
		return self::$historiInstance;
	}
	
	
	public function __construct()
	{
		//self::$historiInstance = new Histori($user,'tsdasd');
		$this->histori = new \Doctrine\Common\Collections\ArrayCollection();
		$this->inverseIdRejon = new ArrayCollection();
		$this->id_wezel = new ArrayCollection();
	}
	
	
	public static function loadValidatorMetadata(ClassMetadata $metadata)
	{
		
		$metadata->addPropertyConstraint('kod', new Assert\Length(array(
				'min'        => 6,
				'max'        => 100,
				'minMessage' => 'Your first name must be at least {{ limit }} characters length',
				'maxMessage' => 'Your first name cannot be longer than {{ limit }} characters length',
		)));
		
		
		$metadata->addPropertyConstraint('nazwa', new Assert\Length(array(
				'min'        => 6,
				'max'        => 100,
				'minMessage' => 'Your first name must be at least {{ limit }} characters length',
				'maxMessage' => 'Your first name cannot be longer than {{ limit }} characters length',
		)));
		
		$metadata->addPropertyConstraint('kod', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole Kod!'
		)));
		$metadata->addPropertyConstraint('nazwa', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole Nazwa!'
		)));
		
	
	}
	
	/**
	 * @ORM\OneToMany(targetEntity="Wezel", mappedBy="id_rejon")
	 */
	protected  $id_wezel;
	
	
	/**
	 * @ORM\OneToMany(targetEntity="Mufa", mappedBy="id_rejon")
	 */
	protected  $inverseIdRejon;
	
	/**
	* @ORM\OneToMany(targetEntity="SpsBundle\Entity\Histori", mappedBy="id_rejon")
	*/
	private $histori;
	
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	
	/**
	 *
	 * @ORM\Column(type="string", length=100)
	 */
	protected $nazwa;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $kod;
	
	

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
     * @return Rejon
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
     * Set kod
     *
     * @param string $kod
     * @return Rejon
     */
    public function setKod($kod)
    {
        $this->kod = $kod;

        return $this;
    }

    /**
     * Get kod
     *
     * @return string 
     */
    public function getKod()
    {
        return $this->kod;
    }

    /**
     * Set id_histori
     *
     * @param \SpsBundle\Entity\Histori $idHistori
     * @return Rejon
     */
    public function setIdHistori(\SpsBundle\Entity\Histori $idHistori = null)
    {
        $this->id_histori = $idHistori;

        return $this;
    }

    /**
     * Get id_histori
     *
     * @return \SpsBundle\Entity\Histori 
     */
    public function getIdHistori()
    {
        return $this->id_histori;
    }
    public function __toString()
    {
    	return $this->nazwa;
    }
   
}

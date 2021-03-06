<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="SpsBundle\Entity\Repository\MufaRepository")
 * @ORM\Table(name="mufa")
 * @ORM\HasLifecycleCallbacks()
 */
class Mufa{
	
	
	public function __construct()
	{
		//self::$historiInstance = new Histori($user,'tsdasd');
		$this->histori = new ArrayCollection();
		$this->inverseMufaStart = new ArrayCollection();
		$this->inverseMufaEnd = new ArrayCollection();
	}

	public function __toString()
	{
		return $this->kod;
	}
	
	public static function loadValidatorMetadata(ClassMetadata $metadata)
	{
	
		$metadata->addPropertyConstraint('kod', new Assert\Length(array(
				'min'        => 6,
				'max'        => 100,
				'minMessage' => 'Your first name must be at least {{ limit }} characters length',
				'maxMessage' => 'Your first name cannot be longer than {{ limit }} characters length',
		)));
		$metadata->addPropertyConstraint('kod', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole !'
		)));
	
	
		$metadata->addPropertyConstraint('opis', new Assert\Length(array(
				'min'        => 6,
				'max'        => 100,
				'minMessage' => 'Your first name must be at least {{ limit }} characters length',
				'maxMessage' => 'Your first name cannot be longer than {{ limit }} characters length',
		)));
		$metadata->addPropertyConstraint('opis', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole !'
		)));
		
		$metadata->addPropertyConstraint('gps_e', new Assert\Length(array(
				'min'        => 9,
				'max'        => 15,
				'minMessage' => 'Your first name must be at least {{ limit }} characters length',
				'maxMessage' => 'Your first name cannot be longer than {{ limit }} characters length',
		)));
		$metadata->addPropertyConstraint('gps_e', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole !'
		)));
		$metadata->addPropertyConstraint('gps_e', new Assert\Type(array(
				'type'    => 'float',
				'message' => 'The value {{ value }} is not a valid {{ type }}.',
		)));
		
		$metadata->addPropertyConstraint('gps_n', new Assert\Length(array(
				'min'        => 9,
				'max'        => 15,
				'minMessage' => 'Your first name must be at least {{ limit }} characters length',
				'maxMessage' => 'Your first name cannot be longer than {{ limit }} characters length',
		)));
		
		$metadata->addPropertyConstraint('gps_n', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole !'
		)));
		$metadata->addPropertyConstraint('gps_n', new Assert\Type(array(
				'type'    => 'float',
				'message' => 'The value {{ value }} is not a valid {{ type }}.',
		)));
	
		$metadata->addPropertyConstraint('id_rejon', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole !'
		)));
		
		$metadata->addPropertyConstraint('id_mufa_type', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole !'
		)));
		
		$metadata->addPropertyConstraint('id_object_type', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole !'
		)));
	
	}
	
	/**
	 * @ORM\OneToMany(targetEntity="Kabel",mappedBy="id_mufa_start")
	 */
	private $inverseMufaStart;
	/**
	 * @ORM\OneToMany(targetEntity="Kabel",mappedBy="id_mufa_end")
	 */
	private $inverseMufaEnd;
		/**
	 * @ORM\ManyToOne(targetEntity="MufaTyp", inversedBy="inverseMufa")
	 * @ORM\JoinColumn(name="id_mufa_type", referencedColumnName="id")
	 */
	protected $id_mufa_type;
	
	/**
	 * @ORM\ManyToOne(targetEntity="ObjectTyp", inversedBy="inverseMufa")
	 * @ORM\JoinColumn(name="id_object_type", referencedColumnName="id")
	 */
	protected $id_object_type;
	
	
	/**
	/**
	 * @ORM\OneToMany(targetEntity="Histori", mappedBy="id_mufa")
	 */
	private $histori;
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\ManyToOne(targetEntity="SpsBundle\Entity\Wezel", inversedBy="id_mufa")
	 * @ORM\JoinColumn(name="id_wezel", referencedColumnName="id", nullable=true)
	 */
	protected $id_wezel;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Rejon", inversedBy="inverseIdRejon")
	 * @ORM\JoinColumn(name="id_rejon", referencedColumnName="id")
	 */
	protected $id_rejon;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $kod;
	/**
	 * @ORM\Column(type="text")
	 */
	protected $opis;

	/**
	 * @ORM\Column(type="float",options={"default": 18.40775371}, nullable=false)
	 */
	protected $gps_n;
	/**
	 * @ORM\Column(type="float", options={"default": 50.34566581}, nullable=false)
	 */
	protected $gps_e;
	
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
     * Set kod
     *
     * @param string $kod
     * @return Mufa
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
     * Set opis
     *
     * @param string $opis
     * @return Mufa
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;

        return $this;
    }

    /**
     * Get opis
     *
     * @return string 
     */
    public function getOpis()
    {
        return $this->opis;
    }

   

    /**
     * Set id_rejon
     *
     * @param \SpsBundle\Entity\Rejon $idRejon
     * @return Mufa
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
     * Set id_histori
     *
     * @param \SpsBundle\Entity\Histori $idHistori
     * @return Mufa
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

    /**
     * Set gps_n
     *
     * @param float $gpsN
     * @return Mufa
     */
    public function setGpsN($gpsN)
    {
        $this->gps_n = $gpsN;

        return $this;
    }

    /**
     * Get gps_n
     *
     * @return float 
     */
    public function getGpsN()
    {
        return $this->gps_n;
    }

    /**
     * Set gps_e
     *
     * @param float $gpsE
     * @return Mufa
     */
    public function setGpsE($gpsE)
    {
        $this->gps_e = $gpsE;

        return $this;
    }

    /**
     * Get gps_e
     *
     * @return float 
     */
    public function getGpsE()
    {
        return $this->gps_e;
    }

    /**
     * Set inverseMufaStart
     *
     * @param \SpsBundle\Entity\Mufa $inverseMufaStart
     * @return Mufa
     */
    public function setInverseMufaStart(\SpsBundle\Entity\Mufa $inverseMufaStart = null)
    {
        $this->inverseMufaStart = $inverseMufaStart;

        return $this;
    }

    /**
     * Get inverseMufaStart
     *
     * @return \SpsBundle\Entity\Mufa 
     */
    public function getInverseMufaStart()
    {
        return $this->inverseMufaStart;
    }

    /**
     * Set inverseMufaEnd
     *
     * @param \SpsBundle\Entity\Mufa $inverseMufaEnd
     * @return Mufa
     */
    public function setInverseMufaEnd(\SpsBundle\Entity\Mufa $inverseMufaEnd = null)
    {
        $this->inverseMufaEnd = $inverseMufaEnd;

        return $this;
    }

    /**
     * Get inverseMufaEnd
     *
     * @return \SpsBundle\Entity\Mufa 
     */
    public function getInverseMufaEnd()
    {
        return $this->inverseMufaEnd;
    }

  

    /**
     * Add histori
     *
     * @param \SpsBundle\Entity\Histori $histori
     * @return Mufa
     */
    public function addHistori(\SpsBundle\Entity\Histori $histori)
    {
        $this->histori[] = $histori;

        return $this;
    }

    /**
     * Remove histori
     *
     * @param \SpsBundle\Entity\Histori $histori
     */
    public function removeHistori(\SpsBundle\Entity\Histori $histori)
    {
        $this->histori->removeElement($histori);
    }

    /**
     * Get histori
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHistori()
    {
        return $this->histori;
    }

  

    /**
     * Set id_mufa_type
     *
     * @param \SpsBundle\Entity\MufaType $idMufaType
     * @return Mufa
     */
    public function setIdMufaType(\SpsBundle\Entity\MufaTyp $idMufaType = null)
    {
        $this->id_mufa_type = $idMufaType;

        return $this;
    }

    /**
     * Get id_mufa_type
     *
     * @return \SpsBundle\Entity\MufaType 
     */
    public function getIdMufaType()
    {
        return $this->id_mufa_type;
    }

    /**
     * Set id_object_type
     *
     * @param \SpsBundle\Entity\ObjectType $idObjectType
     * @return Mufa
     */
    public function setIdObjectType(\SpsBundle\Entity\ObjectTyp $idObjectType = null)
    {
        $this->id_object_type = $idObjectType;

        return $this;
    }

    /**
     * Get id_object_type
     *
     * @return \SpsBundle\Entity\ObjectType 
     */
    public function getIdObjectType()
    {
        return $this->id_object_type;
    }

    /**
     * Add inverseMufaStart
     *
     * @param \SpsBundle\Entity\Kabel $inverseMufaStart
     * @return Mufa
     */
    public function addInverseMufaStart(\SpsBundle\Entity\Kabel $inverseMufaStart)
    {
        $this->inverseMufaStart[] = $inverseMufaStart;

        return $this;
    }

    /**
     * Remove inverseMufaStart
     *
     * @param \SpsBundle\Entity\Kabel $inverseMufaStart
     */
    public function removeInverseMufaStart(\SpsBundle\Entity\Kabel $inverseMufaStart)
    {
        $this->inverseMufaStart->removeElement($inverseMufaStart);
    }

    /**
     * Add inverseMufaEnd
     *
     * @param \SpsBundle\Entity\Kabel $inverseMufaEnd
     * @return Mufa
     */
    public function addInverseMufaEnd(\SpsBundle\Entity\Kabel $inverseMufaEnd)
    {
        $this->inverseMufaEnd[] = $inverseMufaEnd;

        return $this;
    }

    /**
     * Remove inverseMufaEnd
     *
     * @param \SpsBundle\Entity\Kabel $inverseMufaEnd
     */
    public function removeInverseMufaEnd(\SpsBundle\Entity\Kabel $inverseMufaEnd)
    {
        $this->inverseMufaEnd->removeElement($inverseMufaEnd);
    }

    /**
     * Set id_wezel
     *
     * @param \SpsBundle\Entity\Wezel $idWezel
     * @return Mufa
     */
    public function setIdWezel(\SpsBundle\Entity\Wezel $idWezel = null)
    {
        $this->id_wezel = $idWezel;

        return $this;
    }

    /**
     * Get id_wezel
     *
     * @return \SpsBundle\Entity\Wezel 
     */
    public function getIdWezel()
    {
        return $this->id_wezel;
    }
}

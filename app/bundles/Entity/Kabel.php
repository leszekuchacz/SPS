<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

 /**
 * @ORM\Entity(repositoryClass="SpsBundle\Entity\Repository\KabelRepository")
 * @ORM\Table(name="kabel")
 * @ORM\HasLifecycleCallbacks()
 */

class Kabel
{
	
	public function __construct()
	{
		//self::$historiInstance = new Histori($user,'tsdasd');
		$this->histori = new ArrayCollection();
		$this->inverseIdKabel = new ArrayCollection();
	}
	
	public function __toString()
	{
		return $this->producent;
	}
	
	public static function loadValidatorMetadata(ClassMetadata $metadata)
	{
	
		
		$metadata->addPropertyConstraint('id_mufa_start', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole !'
		)));
		
		$metadata->addPropertyConstraint('id_mufa_end', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole !'
		)));
		
		$metadata->addPropertyConstraint('id_mufa_end', new Assert\NotEqualTo(array(
				'value' => 'id_mufa_start',
		)));
		
		$metadata->addPropertyConstraint('producent', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole !'
		)));
		$metadata->addPropertyConstraint('producent', new Assert\Length(array(
				'min'        => 2,
				'max'        => 100,
				'minMessage' => 'Your first name must be at least {{ limit }} characters length',
				'maxMessage' => 'Your first name cannot be longer than {{ limit }} characters length',
		)));
		$metadata->addPropertyConstraint('producent', new Assert\Type(array(
				'type'    => 'string',
				'message' => 'The value {{ value }} is not a valid {{ type }}.',
		)));
		
		
		$metadata->addPropertyConstraint('j', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole !'
		)));
		$metadata->addPropertyConstraint('j', new Assert\Type(array(
				'type'    => 'integer',
				'message' => 'The value {{ value }} is not a valid {{ type }}.',
		)));
		
		$metadata->addPropertyConstraint('tubs', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole !'
		)));
		$metadata->addPropertyConstraint('tubs', new Assert\Type(array(
				'type'    => 'integer',
				'message' => 'The value {{ value }} is not a valid {{ type }}.',
		)));
		
		$metadata->addPropertyConstraint('id_standard', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole !'
		)));
		
		$metadata->addPropertyConstraint('id_kabel_type', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole !'
		)));
		
		$metadata->addPropertyConstraint('id_object_type', new Assert\NotBlank(array(
				'message' => 'Uzupełnij pole !'
		)));
		
		
	
	}
	
	/**
	 * @ORM\ManyToOne(targetEntity="SpsBundle\Entity\Wezel", inversedBy="id_kabel")
	 * @ORM\JoinColumn(name="id_wezel", referencedColumnName="id", nullable=true)
	 */
	protected $id_wezel=null;
	
	/**
	 * @ORM\ManyToOne(targetEntity="SpsBundle\Entity\Standard", inversedBy="idKabel")
	 * @ORM\JoinColumn(name="id_standard", referencedColumnName="id")
	 */
	protected $id_standard;
	
	/**
	 * @ORM\OneToMany(targetEntity="Wlokno", mappedBy="id_kabel")
	 */
	protected $inverseIdKabel;
	/**
	 * @ORM\OneToMany(targetEntity="Histori", mappedBy="id_kabel")
	 */
	protected $histori;
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
		/**
	 * @ORM\ManyToOne(targetEntity="KabelTyp", inversedBy="inverseKabel")
	 * @ORM\JoinColumn(name="id_kabel_type", referencedColumnName="id")
	 */
	protected $id_kabel_type;
	
	/**
	 * @ORM\ManyToOne(targetEntity="ObjectTyp", inversedBy="inverseKabel")
	 * @ORM\JoinColumn(name="id_object_type", referencedColumnName="id")
	 */
	protected $id_object_type;
	
	
	/**
	 * @ORM\ManyToOne(targetEntity="Mufa", inversedBy="inverseMufaStart")
	 * @ORM\JoinColumn(name="id_mufa_start", referencedColumnName="id")
	 */
	protected $id_mufa_start;
	/**
	 * @ORM\ManyToOne(targetEntity="Mufa", inversedBy="inverseMufaEnd")
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set producent
     *
     * @param string $producent
     * @return Kabel
     */
    public function setProducent($producent)
    {
        $this->producent = $producent;

        return $this;
    }

    /**
     * Get producent
     *
     * @return string 
     */
    public function getProducent()
    {
        return $this->producent;
    }

    /**
     * Set j
     *
     * @param integer $j
     * @return Kabel
     */
    public function setJ($j)
    {
        $this->j = $j;

        return $this;
    }

    /**
     * Get j
     *
     * @return integer 
     */
    public function getJ()
    {
        return $this->j;
    }

    /**
     * Set tubs
     *
     * @param integer $tubs
     * @return Kabel
     */
    public function setTubs($tubs)
    {
        $this->tubs = $tubs;

        return $this;
    }

    /**
     * Get tubs
     *
     * @return integer 
     */
    public function getTubs()
    {
        return $this->tubs;
    }

    /**
     * Set lenght
     *
     * @param integer $lenght
     * @return Kabel
     */
    public function setLenght($lenght)
    {
        $this->lenght = $lenght;

        return $this;
    }

    /**
     * Get lenght
     *
     * @return integer 
     */
    public function getLenght()
    {
        return $this->lenght;
    }

    /**
     * Set id_wezel
     *
     * @param \SpsBundle\Entity\Wezel $idWezel
     * @return Kabel
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

    /**
     * Set id_standard
     *
     * @param \SpsBundle\Entity\Standard $idStandard
     * @return Kabel
     */
    public function setIdStandard(\SpsBundle\Entity\Standard $idStandard = null)
    {
        $this->id_standard = $idStandard;

        return $this;
    }

    /**
     * Get id_standard
     *
     * @return \SpsBundle\Entity\Standard 
     */
    public function getIdStandard()
    {
        return $this->id_standard;
    }

    /**
     * Add inverseIdKabel
     *
     * @param \SpsBundle\Entity\Wlokno $inverseIdKabel
     * @return Kabel
     */
    public function addInverseIdKabel(\SpsBundle\Entity\Wlokno $inverseIdKabel)
    {
        $this->inverseIdKabel[] = $inverseIdKabel;

        return $this;
    }

    /**
     * Remove inverseIdKabel
     *
     * @param \SpsBundle\Entity\Wlokno $inverseIdKabel
     */
    public function removeInverseIdKabel(\SpsBundle\Entity\Wlokno $inverseIdKabel)
    {
        $this->inverseIdKabel->removeElement($inverseIdKabel);
    }

    /**
     * Get inverseIdKabel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInverseIdKabel()
    {
        return $this->inverseIdKabel;
    }

    /**
     * Add histori
     *
     * @param \SpsBundle\Entity\Histori $histori
     * @return Kabel
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
     * Set id_kabel_type
     *
     * @param \SpsBundle\Entity\KabelTyp $idKabelType
     * @return Kabel
     */
    public function setIdKabelType(\SpsBundle\Entity\KabelTyp $idKabelType = null)
    {
        $this->id_kabel_type = $idKabelType;

        return $this;
    }

    /**
     * Get id_kabel_type
     *
     * @return \SpsBundle\Entity\KabelTyp 
     */
    public function getIdKabelType()
    {
        return $this->id_kabel_type;
    }

    /**
     * Set id_object_type
     *
     * @param \SpsBundle\Entity\ObjectTyp $idObjectType
     * @return Kabel
     */
    public function setIdObjectType(\SpsBundle\Entity\ObjectTyp $idObjectType = null)
    {
        $this->id_object_type = $idObjectType;

        return $this;
    }

    /**
     * Get id_object_type
     *
     * @return \SpsBundle\Entity\ObjectTyp 
     */
    public function getIdObjectType()
    {
        return $this->id_object_type;
    }

    /**
     * Set id_mufa_start
     *
     * @param \SpsBundle\Entity\Mufa $idMufaStart
     * @return Kabel
     */
    public function setIdMufaStart(\SpsBundle\Entity\Mufa $idMufaStart = null)
    {
        $this->id_mufa_start = $idMufaStart;

        return $this;
    }

    /**
     * Get id_mufa_start
     *
     * @return \SpsBundle\Entity\Mufa 
     */
    public function getIdMufaStart()
    {
        return $this->id_mufa_start;
    }

    /**
     * Set id_mufa_end
     *
     * @param \SpsBundle\Entity\Mufa $idMufaEnd
     * @return Kabel
     */
    public function setIdMufaEnd(\SpsBundle\Entity\Mufa $idMufaEnd = null)
    {
        $this->id_mufa_end = $idMufaEnd;

        return $this;
    }

    /**
     * Get id_mufa_end
     *
     * @return \SpsBundle\Entity\Mufa 
     */
    public function getIdMufaEnd()
    {
        return $this->id_mufa_end;
    }
}

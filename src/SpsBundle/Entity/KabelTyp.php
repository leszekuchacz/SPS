<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

 /**
 * @ORM\Entity(repositoryClass="SpsBundle\Entity\Repository\Types\KabelTypRepository")
 * @ORM\Table(name="kabel_type")
 * @ORM\HasLifecycleCallbacks()
 */

class KabelTyp
{
	
	public function __construct()
	{
		$this->inverseMufa = new ArrayCollection();
		$this->inverseKabel = new ArrayCollection();
	}
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=100,nullable=true)
	 * 
	 */
	protected $name=null;
	/**
	 * @ORM\Column(type="integer",nullable=true)
	 *
	 */
	protected $value=null;
	
	/**
	 * @ORM\Column(type="string", length=100,nullable=true)
	 *
	 */
	protected $tag=null;
	/**
	 * @ORM\Column(type="string", length=100,nullable=true)
	 *
	 */
	protected $type=null;
	
	
	/**
	 * @ORM\OneToMany(targetEntity="Kabel", mappedBy="id_kabel_type")
	 */
	private $inverseKabel;
	
	/**
	 * @ORM\ManyToOne(targetEntity="ObjectTyp", inversedBy="inverseKabelTyp")
	 * @ORM\JoinColumn(name="id_object_type", referencedColumnName="id",nullable=true)
	 */
	protected $id_object_type=null;
   

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
     * Set name
     *
     * @param string $name
     * @return KabelTyp
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set value
     *
     * @param integer $value
     * @return KabelTyp
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set tag
     *
     * @param string $tag
     * @return KabelTyp
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return KabelTyp
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add inverseKabel
     *
     * @param \SpsBundle\Entity\Kabel $inverseKabel
     * @return KabelTyp
     */
    public function addInverseKabel(\SpsBundle\Entity\Kabel $inverseKabel)
    {
        $this->inverseKabel[] = $inverseKabel;

        return $this;
    }

    /**
     * Remove inverseKabel
     *
     * @param \SpsBundle\Entity\Kabel $inverseKabel
     */
    public function removeInverseKabel(\SpsBundle\Entity\Kabel $inverseKabel)
    {
        $this->inverseKabel->removeElement($inverseKabel);
    }

    /**
     * Get inverseKabel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInverseKabel()
    {
        return $this->inverseKabel;
    }

    /**
     * Set id_object_type
     *
     * @param \SpsBundle\Entity\ObjectTyp $idObjectType
     * @return KabelTyp
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
}

<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

 /**
 * @ORM\Entity(repositoryClass="SpsBundle\Entity\Repository\MufaTypeRepository")
 * @ORM\Table(name="mufa_type")
 * @ORM\HasLifecycleCallbacks()
 */

class MufaTyp
{
	
	public function __construct()
	{
		$this->inverseMufa = new ArrayCollection();
		$this->inverseKabel = new ArrayCollection();
	}
	public function __toString()
	{
		return $this->name;
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
	 * @ORM\OneToMany(targetEntity="Mufa", mappedBy="id_mufa_type")
	 */
	private $inverseMufa;
	
   

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
     * @return MufaTyp
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
     * @return MufaTyp
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
     * @return MufaTyp
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
     * @return MufaTyp
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
     * Add inverseMufa
     *
     * @param \SpsBundle\Entity\Mufa $inverseMufa
     * @return MufaTyp
     */
    public function addInverseMufa(\SpsBundle\Entity\Mufa $inverseMufa)
    {
        $this->inverseMufa[] = $inverseMufa;

        return $this;
    }

    /**
     * Remove inverseMufa
     *
     * @param \SpsBundle\Entity\Mufa $inverseMufa
     */
    public function removeInverseMufa(\SpsBundle\Entity\Mufa $inverseMufa)
    {
        $this->inverseMufa->removeElement($inverseMufa);
    }

    /**
     * Get inverseMufa
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInverseMufa()
    {
        return $this->inverseMufa;
    }
}

<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

 /**
 * @ORM\Entity(repositoryClass="SpsBundle\Entity\Repository\ObjectTypeRepository")
 * @ORM\Table(name="object_type")
 * @ORM\HasLifecycleCallbacks()
 */

class ObjectTyp
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
	 * @ORM\OneToMany(targetEntity="Mufa", mappedBy="id_object_type")
	 */
	private $inverseMufa;
	
	
	/**
	 * @ORM\OneToMany(targetEntity="Kabel", mappedBy="id_object_type")
	 */
	private $inverseKabel;
	

   

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
     * @return ObjectTyp
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
     * Add inverseMufa
     *
     * @param \SpsBundle\Entity\Mufa $inverseMufa
     * @return ObjectTyp
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

    /**
     * Add inverseKabel
     *
     * @param \SpsBundle\Entity\Kabel $inverseKabel
     * @return ObjectTyp
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
}

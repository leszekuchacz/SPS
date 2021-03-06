<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

 /**
 * @ORM\Entity(repositoryClass="SpsBundle\Entity\Repository\WezelRepository")
 * @ORM\Table(name="wezel")
 * @ORM\HasLifecycleCallbacks()
 */

class Wezel
{
	
	public function __construct()
	{
		$this -> id_mufa = new ArrayCollection();
		$this -> id_kabel = new ArrayCollection();
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
	 * @ORM\ManyToOne(targetEntity="Rejon", inversedBy="id_wezel")
	 * @ORM\JoinColumn(name="id_rejon", referencedColumnName="id")	 
	 */
	protected $id_rejon;
	
	/**
	 * @ORM\OneToMany(targetEntity="Mufa", mappedBy="id_wezel")
	 */
	protected $id_mufa;
	
	
	/**
	 * @ORM\OneToMany(targetEntity="Kabel", mappedBy="id_wezel")
	 */
	protected $id_kabel;
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $name;
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $opis;
	
	

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
     * @return Wezel
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
     * Set opis
     *
     * @param string $opis
     * @return Wezel
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
     * @return Wezel
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
     * Add id_mufa
     *
     * @param \SpsBundle\Entity\Mufa $idMufa
     * @return Wezel
     */
    public function addIdMufa(\SpsBundle\Entity\Mufa $idMufa)
    {
        $this->id_mufa[] = $idMufa;

        return $this;
    }

    /**
     * Remove id_mufa
     *
     * @param \SpsBundle\Entity\Mufa $idMufa
     */
    public function removeIdMufa(\SpsBundle\Entity\Mufa $idMufa)
    {
        $this->id_mufa->removeElement($idMufa);
    }

    /**
     * Get id_mufa
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdMufa()
    {
        return $this->id_mufa;
    }

    /**
     * Add id_kabel
     *
     * @param \SpsBundle\Entity\Kabel $idKabel
     * @return Wezel
     */
    public function addIdKabel(\SpsBundle\Entity\Kabel $idKabel)
    {
        $this->id_kabel[] = $idKabel;

        return $this;
    }

    /**
     * Remove id_kabel
     *
     * @param \SpsBundle\Entity\Kabel $idKabel
     */
    public function removeIdKabel(\SpsBundle\Entity\Kabel $idKabel)
    {
        $this->id_kabel->removeElement($idKabel);
    }

    /**
     * Get id_kabel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdKabel()
    {
        return $this->id_kabel;
    }

    /**
     * Add id_panel
     *
     * @param \SpsBundle\Entity\Mufa $idPanel
     * @return Wezel
     */
    public function addIdPanel(\SpsBundle\Entity\Mufa $idPanel)
    {
        $this->id_panel[] = $idPanel;

        return $this;
    }

    /**
     * Remove id_panel
     *
     * @param \SpsBundle\Entity\Mufa $idPanel
     */
    public function removeIdPanel(\SpsBundle\Entity\Mufa $idPanel)
    {
        $this->id_panel->removeElement($idPanel);
    }

    /**
     * Get id_panel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdPanel()
    {
        return $this->id_panel;
    }
}

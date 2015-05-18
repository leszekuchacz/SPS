<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="SpsBundle\Entity\Repository\SettingsRepository")
 * @ORM\Table(name="settings")
 * @ORM\HasLifecycleCallbacks()
 */
class Settings{
	public function __construct()
	{
		
	}
	
	public static function loadValidatorMetadata(ClassMetadata $metadata)
	{
		$metadata->addPropertyConstraint('name', new NotBlank(array(
				'message' => 'You must enter your name'
		)));
		$metadata->addPropertyConstraint('value', new NotBlank(array(
				'message' => 'You must enter a comment'
		)));
	}
	
	
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=200)
	 */
	protected $name;
	/**
	 * @ORM\Column(type="string", length=200)
	 */
	protected $value;
	
	
	

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
     * @return Settings
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
     * @param string $value
     * @return Settings
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }
    
    public function __toString()
    {
    	return $this->getTitle();
    }
}

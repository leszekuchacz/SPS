<?php
namespace SpsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Entity(repositoryClass="SpsBundle\Entity\Repository\StandardRepository")
* @ORM\Table(name="standard")
* @ORM\HasLifecycleCallbacks()
*/
class Standard {
	
	public function __construct()
	{
		$this->IdKabel = new ArrayCollection();
	}
	
	
	/**
	 * @ORM\OneToMany(targetEntity="Kabel", mappedBy="id_standard")
	 */
	protected $idKabel;
	
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected  $id;
	
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $nazwa;
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $max;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color1=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa1=null;
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color2=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa2=null;
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color3=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa3=null;
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color4=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa4=null;
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color5=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa5=null;
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color6=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa6=null;
	
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color7=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa7=null;
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color8=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa8=null;
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color9=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa9=null;
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color10=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa10=null;
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color11=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa11=null;
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color12=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa12=null;
	
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color13=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa13=null;
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color14=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa14=null;
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color15=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa15=null;
	
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color16=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa16=null;
	
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color17=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa17=null;
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color18=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa18=null;
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color19=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa19=null;
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color20=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa20=null;
	
	
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color21=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa21=null;
	
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color22=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa22=null;
	
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color23=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa23=null;
	
	
	
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $color24=null;
	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $nazwa24=null;
	
	
	

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
     * @return Standard
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
     * Set max
     *
     * @param integer $max
     * @return Standard
     */
    public function setMax($max)
    {
        $this->max = $max;

        return $this;
    }

    /**
     * Get max
     *
     * @return integer 
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * Set color1
     *
     * @param string $color1
     * @return Standard
     */
    public function setColor1($color1)
    {
        $this->color1 = $color1;

        return $this;
    }

    /**
     * Get color1
     *
     * @return string 
     */
    public function getColor1()
    {
        return $this->color1;
    }

    /**
     * Set color2
     *
     * @param string $color2
     * @return Standard
     */
    public function setColor2($color2)
    {
        $this->color2 = $color2;

        return $this;
    }

    /**
     * Get color2
     *
     * @return string 
     */
    public function getColor2()
    {
        return $this->color2;
    }

    /**
     * Set color3
     *
     * @param string $color3
     * @return Standard
     */
    public function setColor3($color3)
    {
        $this->color3 = $color3;

        return $this;
    }

    /**
     * Get color3
     *
     * @return string 
     */
    public function getColor3()
    {
        return $this->color3;
    }

    /**
     * Set color4
     *
     * @param string $color4
     * @return Standard
     */
    public function setColor4($color4)
    {
        $this->color4 = $color4;

        return $this;
    }

    /**
     * Get color4
     *
     * @return string 
     */
    public function getColor4()
    {
        return $this->color4;
    }

    /**
     * Set color5
     *
     * @param string $color5
     * @return Standard
     */
    public function setColor5($color5)
    {
        $this->color5 = $color5;

        return $this;
    }

    /**
     * Get color5
     *
     * @return string 
     */
    public function getColor5()
    {
        return $this->color5;
    }

    /**
     * Set color7
     *
     * @param string $color7
     * @return Standard
     */
    public function setColor7($color7)
    {
        $this->color7 = $color7;

        return $this;
    }

    /**
     * Get color7
     *
     * @return string 
     */
    public function getColor7()
    {
        return $this->color7;
    }

    /**
     * Set color8
     *
     * @param string $color8
     * @return Standard
     */
    public function setColor8($color8)
    {
        $this->color8 = $color8;

        return $this;
    }

    /**
     * Get color8
     *
     * @return string 
     */
    public function getColor8()
    {
        return $this->color8;
    }

    /**
     * Set color9
     *
     * @param string $color9
     * @return Standard
     */
    public function setColor9($color9)
    {
        $this->color9 = $color9;

        return $this;
    }

    /**
     * Get color9
     *
     * @return string 
     */
    public function getColor9()
    {
        return $this->color9;
    }

    /**
     * Set color10
     *
     * @param string $color10
     * @return Standard
     */
    public function setColor10($color10)
    {
        $this->color10 = $color10;

        return $this;
    }

    /**
     * Get color10
     *
     * @return string 
     */
    public function getColor10()
    {
        return $this->color10;
    }

    /**
     * Set color11
     *
     * @param string $color11
     * @return Standard
     */
    public function setColor11($color11)
    {
        $this->color11 = $color11;

        return $this;
    }

    /**
     * Get color11
     *
     * @return string 
     */
    public function getColor11()
    {
        return $this->color11;
    }

    /**
     * Set color12
     *
     * @param string $color12
     * @return Standard
     */
    public function setColor12($color12)
    {
        $this->color12 = $color12;

        return $this;
    }

    /**
     * Get color12
     *
     * @return string 
     */
    public function getColor12()
    {
        return $this->color12;
    }

    /**
     * Set color13
     *
     * @param string $color13
     * @return Standard
     */
    public function setColor13($color13)
    {
        $this->color13 = $color13;

        return $this;
    }

    /**
     * Get color13
     *
     * @return string 
     */
    public function getColor13()
    {
        return $this->color13;
    }

    /**
     * Set color14
     *
     * @param string $color14
     * @return Standard
     */
    public function setColor14($color14)
    {
        $this->color14 = $color14;

        return $this;
    }

    /**
     * Get color14
     *
     * @return string 
     */
    public function getColor14()
    {
        return $this->color14;
    }

    /**
     * Set color15
     *
     * @param string $color15
     * @return Standard
     */
    public function setColor15($color15)
    {
        $this->color15 = $color15;

        return $this;
    }

    /**
     * Get color15
     *
     * @return string 
     */
    public function getColor15()
    {
        return $this->color15;
    }

    /**
     * Set color16
     *
     * @param string $color16
     * @return Standard
     */
    public function setColor16($color16)
    {
        $this->color16 = $color16;

        return $this;
    }

    /**
     * Get color16
     *
     * @return string 
     */
    public function getColor16()
    {
        return $this->color16;
    }

    /**
     * Set color17
     *
     * @param string $color17
     * @return Standard
     */
    public function setColor17($color17)
    {
        $this->color17 = $color17;

        return $this;
    }

    /**
     * Get color17
     *
     * @return string 
     */
    public function getColor17()
    {
        return $this->color17;
    }

    /**
     * Set color18
     *
     * @param string $color18
     * @return Standard
     */
    public function setColor18($color18)
    {
        $this->color18 = $color18;

        return $this;
    }

    /**
     * Get color18
     *
     * @return string 
     */
    public function getColor18()
    {
        return $this->color18;
    }

    /**
     * Set color19
     *
     * @param string $color19
     * @return Standard
     */
    public function setColor19($color19)
    {
        $this->color19 = $color19;

        return $this;
    }

    /**
     * Get color19
     *
     * @return string 
     */
    public function getColor19()
    {
        return $this->color19;
    }

    /**
     * Set color20
     *
     * @param string $color20
     * @return Standard
     */
    public function setColor20($color20)
    {
        $this->color20 = $color20;

        return $this;
    }

    /**
     * Get color20
     *
     * @return string 
     */
    public function getColor20()
    {
        return $this->color20;
    }

    /**
     * Set color21
     *
     * @param string $color21
     * @return Standard
     */
    public function setColor21($color21)
    {
        $this->color21 = $color21;

        return $this;
    }

    /**
     * Get color21
     *
     * @return string 
     */
    public function getColor21()
    {
        return $this->color21;
    }

    /**
     * Set color22
     *
     * @param string $color22
     * @return Standard
     */
    public function setColor22($color22)
    {
        $this->color22 = $color22;

        return $this;
    }

    /**
     * Get color22
     *
     * @return string 
     */
    public function getColor22()
    {
        return $this->color22;
    }

    /**
     * Set color23
     *
     * @param string $color23
     * @return Standard
     */
    public function setColor23($color23)
    {
        $this->color23 = $color23;

        return $this;
    }

    /**
     * Get color23
     *
     * @return string 
     */
    public function getColor23()
    {
        return $this->color23;
    }

    /**
     * Set color24
     *
     * @param string $color24
     * @return Standard
     */
    public function setColor24($color24)
    {
        $this->color24 = $color24;

        return $this;
    }

    /**
     * Get color24
     *
     * @return string 
     */
    public function getColor24()
    {
        return $this->color24;
    }

    /**
     * Add idKabel
     *
     * @param \SpsBundle\Entity\Kabel $idKabel
     * @return Standard
     */
    public function addIdKabel(\SpsBundle\Entity\Kabel $idKabel)
    {
        $this->idKabel[] = $idKabel;

        return $this;
    }

    /**
     * Remove idKabel
     *
     * @param \SpsBundle\Entity\Kabel $idKabel
     */
    public function removeIdKabel(\SpsBundle\Entity\Kabel $idKabel)
    {
        $this->idKabel->removeElement($idKabel);
    }

    /**
     * Get idKabel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdKabel()
    {
        return $this->idKabel;
    }

    /**
     * Set color6
     *
     * @param string $color6
     * @return Standard
     */
    public function setColor6($color6)
    {
        $this->color6 = $color6;

        return $this;
    }

    /**
     * Get color6
     *
     * @return string 
     */
    public function getColor6()
    {
        return $this->color6;
    }

    /**
     * Set nazwa1
     *
     * @param string $nazwa1
     * @return Standard
     */
    public function setNazwa1($nazwa1)
    {
        $this->nazwa1 = $nazwa1;

        return $this;
    }

    /**
     * Get nazwa1
     *
     * @return string 
     */
    public function getNazwa1()
    {
        return $this->nazwa1;
    }

    /**
     * Set nazwa2
     *
     * @param string $nazwa2
     * @return Standard
     */
    public function setNazwa2($nazwa2)
    {
        $this->nazwa2 = $nazwa2;

        return $this;
    }

    /**
     * Get nazwa2
     *
     * @return string 
     */
    public function getNazwa2()
    {
        return $this->nazwa2;
    }

    /**
     * Set nazwa3
     *
     * @param string $nazwa3
     * @return Standard
     */
    public function setNazwa3($nazwa3)
    {
        $this->nazwa3 = $nazwa3;

        return $this;
    }

    /**
     * Get nazwa3
     *
     * @return string 
     */
    public function getNazwa3()
    {
        return $this->nazwa3;
    }

    /**
     * Set nazwa4
     *
     * @param string $nazwa4
     * @return Standard
     */
    public function setNazwa4($nazwa4)
    {
        $this->nazwa4 = $nazwa4;

        return $this;
    }

    /**
     * Get nazwa4
     *
     * @return string 
     */
    public function getNazwa4()
    {
        return $this->nazwa4;
    }

    /**
     * Set nazwa5
     *
     * @param string $nazwa5
     * @return Standard
     */
    public function setNazwa5($nazwa5)
    {
        $this->nazwa5 = $nazwa5;

        return $this;
    }

    /**
     * Get nazwa5
     *
     * @return string 
     */
    public function getNazwa5()
    {
        return $this->nazwa5;
    }

    /**
     * Set nazwa6
     *
     * @param string $nazwa6
     * @return Standard
     */
    public function setNazwa6($nazwa6)
    {
        $this->nazwa6 = $nazwa6;

        return $this;
    }

    /**
     * Get nazwa6
     *
     * @return string 
     */
    public function getNazwa6()
    {
        return $this->nazwa6;
    }

    /**
     * Set nazwa7
     *
     * @param string $nazwa7
     * @return Standard
     */
    public function setNazwa7($nazwa7)
    {
        $this->nazwa7 = $nazwa7;

        return $this;
    }

    /**
     * Get nazwa7
     *
     * @return string 
     */
    public function getNazwa7()
    {
        return $this->nazwa7;
    }

    /**
     * Set nazwa8
     *
     * @param string $nazwa8
     * @return Standard
     */
    public function setNazwa8($nazwa8)
    {
        $this->nazwa8 = $nazwa8;

        return $this;
    }

    /**
     * Get nazwa8
     *
     * @return string 
     */
    public function getNazwa8()
    {
        return $this->nazwa8;
    }

    /**
     * Set nazwa9
     *
     * @param string $nazwa9
     * @return Standard
     */
    public function setNazwa9($nazwa9)
    {
        $this->nazwa9 = $nazwa9;

        return $this;
    }

    /**
     * Get nazwa9
     *
     * @return string 
     */
    public function getNazwa9()
    {
        return $this->nazwa9;
    }

    /**
     * Set nazwa10
     *
     * @param string $nazwa10
     * @return Standard
     */
    public function setNazwa10($nazwa10)
    {
        $this->nazwa10 = $nazwa10;

        return $this;
    }

    /**
     * Get nazwa10
     *
     * @return string 
     */
    public function getNazwa10()
    {
        return $this->nazwa10;
    }

    /**
     * Set nazwa11
     *
     * @param string $nazwa11
     * @return Standard
     */
    public function setNazwa11($nazwa11)
    {
        $this->nazwa11 = $nazwa11;

        return $this;
    }

    /**
     * Get nazwa11
     *
     * @return string 
     */
    public function getNazwa11()
    {
        return $this->nazwa11;
    }

    /**
     * Set nazwa12
     *
     * @param string $nazwa12
     * @return Standard
     */
    public function setNazwa12($nazwa12)
    {
        $this->nazwa12 = $nazwa12;

        return $this;
    }

    /**
     * Get nazwa12
     *
     * @return string 
     */
    public function getNazwa12()
    {
        return $this->nazwa12;
    }

    /**
     * Set nazwa13
     *
     * @param string $nazwa13
     * @return Standard
     */
    public function setNazwa13($nazwa13)
    {
        $this->nazwa13 = $nazwa13;

        return $this;
    }

    /**
     * Get nazwa13
     *
     * @return string 
     */
    public function getNazwa13()
    {
        return $this->nazwa13;
    }

    /**
     * Set nazwa14
     *
     * @param string $nazwa14
     * @return Standard
     */
    public function setNazwa14($nazwa14)
    {
        $this->nazwa14 = $nazwa14;

        return $this;
    }

    /**
     * Get nazwa14
     *
     * @return string 
     */
    public function getNazwa14()
    {
        return $this->nazwa14;
    }

    /**
     * Set nazwa15
     *
     * @param string $nazwa15
     * @return Standard
     */
    public function setNazwa15($nazwa15)
    {
        $this->nazwa15 = $nazwa15;

        return $this;
    }

    /**
     * Get nazwa15
     *
     * @return string 
     */
    public function getNazwa15()
    {
        return $this->nazwa15;
    }

    /**
     * Set nazwa16
     *
     * @param string $nazwa16
     * @return Standard
     */
    public function setNazwa16($nazwa16)
    {
        $this->nazwa16 = $nazwa16;

        return $this;
    }

    /**
     * Get nazwa16
     *
     * @return string 
     */
    public function getNazwa16()
    {
        return $this->nazwa16;
    }

    /**
     * Set nazwa17
     *
     * @param string $nazwa17
     * @return Standard
     */
    public function setNazwa17($nazwa17)
    {
        $this->nazwa17 = $nazwa17;

        return $this;
    }

    /**
     * Get nazwa17
     *
     * @return string 
     */
    public function getNazwa17()
    {
        return $this->nazwa17;
    }

    /**
     * Set nazwa18
     *
     * @param string $nazwa18
     * @return Standard
     */
    public function setNazwa18($nazwa18)
    {
        $this->nazwa18 = $nazwa18;

        return $this;
    }

    /**
     * Get nazwa18
     *
     * @return string 
     */
    public function getNazwa18()
    {
        return $this->nazwa18;
    }

    /**
     * Set nazwa19
     *
     * @param string $nazwa19
     * @return Standard
     */
    public function setNazwa19($nazwa19)
    {
        $this->nazwa19 = $nazwa19;

        return $this;
    }

    /**
     * Get nazwa19
     *
     * @return string 
     */
    public function getNazwa19()
    {
        return $this->nazwa19;
    }

    /**
     * Set nazwa20
     *
     * @param string $nazwa20
     * @return Standard
     */
    public function setNazwa20($nazwa20)
    {
        $this->nazwa20 = $nazwa20;

        return $this;
    }

    /**
     * Get nazwa20
     *
     * @return string 
     */
    public function getNazwa20()
    {
        return $this->nazwa20;
    }

    /**
     * Set nazwa21
     *
     * @param string $nazwa21
     * @return Standard
     */
    public function setNazwa21($nazwa21)
    {
        $this->nazwa21 = $nazwa21;

        return $this;
    }

    /**
     * Get nazwa21
     *
     * @return string 
     */
    public function getNazwa21()
    {
        return $this->nazwa21;
    }

    /**
     * Set nazwa22
     *
     * @param string $nazwa22
     * @return Standard
     */
    public function setNazwa22($nazwa22)
    {
        $this->nazwa22 = $nazwa22;

        return $this;
    }

    /**
     * Get nazwa22
     *
     * @return string 
     */
    public function getNazwa22()
    {
        return $this->nazwa22;
    }

    /**
     * Set nazwa23
     *
     * @param string $nazwa23
     * @return Standard
     */
    public function setNazwa23($nazwa23)
    {
        $this->nazwa23 = $nazwa23;

        return $this;
    }

    /**
     * Get nazwa23
     *
     * @return string 
     */
    public function getNazwa23()
    {
        return $this->nazwa23;
    }

    /**
     * Set nazwa24
     *
     * @param string $nazwa24
     * @return Standard
     */
    public function setNazwa24($nazwa24)
    {
        $this->nazwa24 = $nazwa24;

        return $this;
    }

    /**
     * Get nazwa24
     *
     * @return string 
     */
    public function getNazwa24()
    {
        return $this->nazwa24;
    }
    public function __toString()
    {
    	return $this->nazwa;
    }
}

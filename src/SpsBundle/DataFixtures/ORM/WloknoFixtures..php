<?php
namespace SpsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SpsBundle\Entity\Wlokno;
use SpsBundle\Entity\Kabel;
use SpsBundle\Entity\Histori;

class WloknoFixtures extends AbstractFixture implements OrderedFixtureInterface {
	
	protected $w1;
	protected $w2;
	protected $w3;
	
	public function load(ObjectManager $manager) {
		
		
		
		
		// Wlokna do prze 
		
		for ($i=0; $i<=7;$i++){
			$kl[$i] = new Wlokno();
			$kl[$i] -> setIdKabel($manager->merge($this->getReference('wkp1')));
			$manager-> persist($kl[$i]);
			$this->addReference('wkps1'.$i,$kl[$i]);
		
		}
		for ($i=0; $i<=7;$i++){
			$kl[$i] = new Wlokno();
			$kl[$i] -> setIdKabel($manager->merge($this->getReference('wkp2')));
			$manager-> persist($kl[$i]);
			$this->addReference('wkps2'.$i,$kl[$i]);
		
		}
		for ($i=0; $i<=7;$i++){
			$kl[$i] = new Wlokno();
			$kl[$i] -> setIdKabel($manager->merge($this->getReference('wkp3')));
			$manager-> persist($kl[$i]);
			$this->addReference('wkps3'.$i,$kl[$i]);
		
		}
		$k1 = new Kabel();
		//$k1 = $manager->merge($this->getReference('k1'));
		//$k1= $manager->merge($this->getReference('k1')->getJ());
		global $w1,$w2,$w3,$w4,$w5,$kl,$kl2,$kl3;
		
		
		
		
		for ($i=0; $i<=7;$i++){
			$kl[$i] = new Wlokno();
			$kl[$i] -> setIdKabel($manager->merge($this->getReference('wk1')));
			$manager-> persist($kl[$i]);
			$this->addReference('www1'.$i,$kl[$i]);
		
		}
		
		for ($i=0; $i<=7;$i++){
			$kl[$i] = new Wlokno();
			$kl[$i] -> setIdKabel($manager->merge($this->getReference('wk2')));
			$manager-> persist($kl[$i]);
			$this->addReference('www2'.$i,$kl[$i]);
		
		}
		
		
		echo ' kabel wezel';
		for ($i=0; $i<=7;$i++){
			$kl[$i] = new Wlokno();
			$kl[$i] -> setIdKabel($manager->merge($this->getReference('wk')));
			$manager-> persist($kl[$i]);
			$this->addReference('www3'.$i,$kl[$i]);
		
		}
		
		
		echo ' wlokno rejon 1 klient ';
		for ($i=0; $i<=1;$i++){
			$kl[$i] = new Wlokno();
			$kl[$i] -> setIdKabel($manager->merge($this->getReference('kl1')));
			$manager-> persist($kl[$i]);
			$this->addReference('kl1'.$i,$kl[$i]);
				
		}
		$manager->flush();

		for ($i=0; $i<=1;$i++){
			$kl2[$i] = new Wlokno();
			$kl2[$i] -> setIdKabel($manager->merge($this->getReference('kl2')));
			$manager-> persist($kl2[$i]);
			$this->addReference('kl2'.$i,$kl2[$i]);
		
		}
		$manager->flush();
		
		for ($i=0; $i<=1;$i++){
			$kl3[$i] = new Wlokno();
			$kl3[$i] -> setIdKabel($manager->merge($this->getReference('kl3')));
			$manager-> persist($kl3[$i]);
			$this->addReference('kl3'.$i,$kl3[$i]);
		
		}
		$manager->flush();
		
		
		
		for ($i=0; $i<=1;$i++){
			$w1[$i] = new Wlokno();
			$w1[$i] -> setIdKabel($manager->merge($this->getReference('k1')));
			$manager-> persist($w1[$i]);
			$this->addReference('w1'.$i,$w1[$i]);
			
		}
		$manager->flush();
		echo ' wlokno rejon w2 ';
		
		for ($i=0; $i<=7;$i++){
			$w2[$i] = new Wlokno();
			$w2[$i]-> setIdKabel($manager->merge($this->getReference('k2')));
			$manager-> persist($w2[$i]);
			$this->addReference('w2'.$i,$w2[$i]);
		}
		echo ' wlokno rejon w3 ';
		for ($i=0; $i<=11;$i++){
			$w3[$i] = new Wlokno();
			$w3[$i] -> setIdKabel($manager->merge($this->getReference('k3')));
			$manager-> persist($w3[$i]);
			$this->addReference('w3'.$i,$w3[$i]);
		}
		
		echo ' wlokno rejon 1 kabel 3 ';
		for ($i=0; $i<=7;$i++){
			$w4[$i] = new Wlokno();
			$w4[$i] -> setIdKabel($manager->merge($this->getReference('k4')));
			$manager-> persist($w4[$i]);
			$this->addReference('w4'.$i,$w4[$i]);
		}
		
		echo ' wlokno rejon 1 kabel 4 ';
		for ($i=0; $i<=7;$i++){
			$w5[$i] = new Wlokno();
			$w5[$i] -> setIdKabel($manager->merge($this->getReference('k5')));
			$manager-> persist($w5[$i]);
			$this->addReference('w5'.$i,$w5[$i]);
		}
		
		
		$manager->flush();
     // REJON 3 - duzo elemntow
		for ($i=0;$i<=199;$i++){		
			
			for ($z=0; $z<=7;$z++){
				$gw[$i][$z] = new Wlokno();
				$gw[$i][$z] -> setIdKabel($manager->merge($this->getReference('gk'.$i)));
				$manager-> persist($gw[$i][$z]);
				$manager->flush();
			}
			echo 'gw'.$i;
		}
        
        // SPAWY
        $w1[0]->setIdSpawEnd($manager->merge($this
        		->getReference('w20')));
        $w2[0]->setIdSpawStart($manager->merge($this
        		->getReference('w10')));
        
        
        // Case end to end
        $w1[1]->setIdSpawEnd($manager->merge($this
        		->getReference('w40')));
        
        $w4[0]->setIdSpawEnd($manager->merge($this
        		->getReference('w11')));
        
        // Case start to  start
        $w2[1]->setIdSpawStart($manager->merge($this
        		->getReference('w50')));
        $w5[0]->setIdSpawStart($manager->merge($this
        		->getReference('w21')));
        
        
        
        
        $w2[0]->setIdSpawEnd($manager->merge($this
        		->getReference('w30')));
        $w3[0]->setIdSpawStart($manager->merge($this
        		->getReference('w20')));
        
        
    
        
        
        
        $w3[0]->setIdSpawEnd($manager->merge($this
        		->getReference('kl11')));
        $kl[1]->setIdSpawStart($manager->merge($this
        		->getReference('w30')));
        
        $w3[2]->setIdSpawEnd($manager->merge($this
        		->getReference('kl21')));
        $kl2[0]->setIdSpawStart($manager->merge($this
        		->getReference('w32')));
        
        $w3[3]->setIdSpawEnd($manager->merge($this
        		->getReference('kl30')));
        $kl2[0]->setIdSpawStart($manager->merge($this
        		->getReference('w33')));
     
        
        
     
       // $w1[1]->setIdSpawEnd($w2[1]->getId());
        //$w2[1]->setIdSpawStart($w1[1]->getId());
    /*
     * REJON 2
     */
        global $r2w1,$r2w2;
        echo ' wlokno r2w1';
        for ($i=0; $i<=127;$i++){
        	$r2w1[$i] = new Wlokno();
        	$r2w1[$i] -> setIdKabel($manager->merge($this->getReference('r2k1')));
        	$manager-> persist($r2w1[$i]);
        	$this->addReference('r2w1'.$i,$r2w1[$i]);
        		
        }
        $manager->flush();
        echo ' wlokno r2w2';
        
        for ($i=0; $i<=127;$i++){
        	$r2w2[$i] = new Wlokno();
        	$r2w2[$i]-> setIdKabel($manager->merge($this->getReference('r2k2')));
        	$manager-> persist($r2w2[$i]);
        	$this->addReference('r2w2'.$i,$r2w2[$i]);
        } 
        $manager->flush();
        echo ' wlokno r2w1 - r2w2 spawy ';
        
        for ($i=0; $i<=127;$i++){
        	$r2w1[$i]->setIdSpawEnd($manager->merge($this
        			->getReference('r2w2'.$i)));
        	$r2w2[$i]->setIdSpawStart($manager->merge($this
        			->getReference('r2w1'.$i)));
        
        }
        
   
        
        
		$manager->flush();
	}
	
	public function getOrder()
	{
		return 7;
	}
}
<?php

namespace SpsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SpsBundle\Entity\Kabel;
use SpsBundle\Entity\Histori;
use SpsBundle\Entity\Mufa;

class  KabelFixtures extends AbstractFixture implements OrderedFixtureInterface {
	
	public function load(ObjectManager $manager) {
			
		
		
		
		$k1 = new Kabel();
		$k1 -> setIdMufaStart($manager->merge($this->getReference('mk2')));
		$k1 -> setIdMufaEnd($manager->merge($this->getReference('mk3')));
		$k1 -> setLenght(253);
		$k1 -> setProducent('Optix');
	
		$k1 -> setJ(8);
		$k1 -> setTubs(1);
		$k1 ->setIdKabelType($manager->merge($this->getReference('kt1')));
		$k1 ->setIdObjectType($manager->merge($this->getReference('ot')));
		$k1 ->setIdStandard($manager->merge($this->getReference('s1')));
		$this->setReference('wk2',$k1);
		$manager-> persist($k1);
		
		$k1 = new Kabel();
		$k1 -> setIdMufaStart($manager->merge($this->getReference('mk1')));
		$k1 -> setIdMufaEnd($manager->merge($this->getReference('mk2')));
		$k1 -> setLenght(254);
		$k1 -> setProducent('Teodor');
	
		$k1 -> setJ(8);
		$k1 -> setTubs(1);
		$k1 ->setIdKabelType($manager->merge($this->getReference('kt1')));
		$k1 ->setIdObjectType($manager->merge($this->getReference('ot')));
		$k1 ->setIdStandard($manager->merge($this->getReference('s1')));
		$this->setReference('wk1',$k1);
		$manager-> persist($k1);
		
		
		
		
		$k1 = new Kabel();
		$k1 -> setIdMufaStart($manager->merge($this->getReference('mw')));
		$k1 -> setIdMufaEnd($manager->merge($this->getReference('m1')));
		$k1 -> setLenght(358);
		$k1 -> setProducent('Optix');

		$k1 -> setJ(8);
		$k1 -> setTubs(1);
		$k1 ->setIdKabelType($manager->merge($this->getReference('kt1')));
		$k1 ->setIdObjectType($manager->merge($this->getReference('ot')));
		$k1 ->setIdStandard($manager->merge($this->getReference('s1')));
		$this->setReference('wk',$k1);
		
		$manager-> persist($k1);
		

		
		
		
		
		$k1 = new Kabel();
		//$k1 -> setIdHistori($manager->merge($this->getReference('h7')));
		$k1 -> setIdMufaStart($manager->merge($this->getReference('m1')));
		$k1 -> setIdMufaEnd($manager->merge($this->getReference('m2')));
		$k1 -> setLenght(100);
		$k1 -> setProducent('Optix');
	
		$k1 -> setJ(2);
		$k1 -> setTubs(1);
		$k1 ->setIdKabelType($manager->merge($this->getReference('kt1')));
		$k1 ->setIdObjectType($manager->merge($this->getReference('ot')));
		$k1 ->setIdStandard($manager->merge($this->getReference('s1')));
		
		$manager-> persist($k1);
		
		$k2 = new Kabel();
	//	$k2 -> setIdHistori($manager->merge($this->getReference('h8')));
		$k2 -> setIdMufaStart($manager->merge($this->getReference('m2')));
		$k2 -> setIdMufaEnd($manager->merge($this->getReference('m3')));
		$k2 -> setLenght(320);
		$k2 -> setProducent('Optix');

		$k2 -> setJ(8);
		$k2 -> setTubs(1);
		$k2->setIdStandard($manager->merge($this->getReference('s1')));
		$k2 ->setIdKabelType($manager->merge($this->getReference('kt1')));
		$k2 ->setIdObjectType($manager->merge($this->getReference('ot')));
		
		$manager-> persist($k2);
		
		
		//Case when spaw_end to spaw_end
		$k4 = new Kabel();
		//	$k2 -> setIdHistori($manager->merge($this->getReference('h8')));
		$k4 -> setIdMufaStart($manager->merge($this->getReference('m5')));
		$k4 -> setIdMufaEnd($manager->merge($this->getReference('m2')));
		$k4 -> setLenght(231);
		$k4 -> setProducent('Teodor');
	
		$k4 -> setJ(8);
		$k4 -> setTubs(1);
		$k4->setIdStandard($manager->merge($this->getReference('s1')));
		$k4 ->setIdKabelType($manager->merge($this->getReference('kt1')));
		$k4 ->setIdObjectType($manager->merge($this->getReference('ot')));
		$manager-> persist($k4);
		
		//Case when spaw_start to spaw_start
		
		$k5 = new Kabel();
		//	$k2 -> setIdHistori($manager->merge($this->getReference('h8')));
		$k5 -> setIdMufaStart($manager->merge($this->getReference('m2')));
		$k5 -> setIdMufaEnd($manager->merge($this->getReference('m6')));
		$k5 -> setLenght(98);
		$k5 -> setProducent('Teodor');

		$k5 -> setJ(8);
		$k5 -> setTubs(1);
		$k5->setIdStandard($manager->merge($this->getReference('s1')));
		$k5 ->setIdKabelType($manager->merge($this->getReference('kt1')));
		$k5 ->setIdObjectType($manager->merge($this->getReference('ot')));
		$manager-> persist($k5);
		
		
		
		
		$k3 = new Kabel();
	//	$k3 -> setIdHistori($manager->merge($this->getReference('h9')));
		$k3 -> setIdMufaStart($manager->merge($this->getReference('m3')));
		$k3 -> setIdMufaEnd($manager->merge($this->getReference('m4')));
		$k3 -> setLenght(210);
		$k3 -> setProducent('Dialog');

		$k3 -> setJ(12);
		$k3 -> setTubs(1);
		$k3->setIdStandard($manager->merge($this->getReference('s1')));
		$k3 ->setIdKabelType($manager->merge($this->getReference('kt1')));
		$k3 ->setIdObjectType($manager->merge($this->getReference('ot')));
		
		$manager-> persist($k3);
		
		$kl = new Kabel();
		//	$k3 -> setIdHistori($manager->merge($this->getReference('h9')));
		$kl -> setIdMufaStart($manager->merge($this->getReference('m4')));
		$kl -> setIdMufaEnd($manager->merge($this->getReference('kk1')));
		$kl -> setLenght(123);
		$kl -> setProducent('Dialog');

		$kl -> setJ(2);
		$kl -> setTubs(1);
		$kl->setIdStandard($manager->merge($this->getReference('s1')));
		$kl ->setIdKabelType($manager->merge($this->getReference('kt1')));
		$kl ->setIdObjectType($manager->merge($this->getReference('ok')));
		$this->SetReference('kl1',$kl);
		$manager-> persist($kl);
		
		
		
		$kl = new Kabel();
		//	$k3 -> setIdHistori($manager->merge($this->getReference('h9')));
		$kl -> setIdMufaStart($manager->merge($this->getReference('m4')));
		$kl -> setIdMufaEnd($manager->merge($this->getReference('kk2')));
		$kl -> setLenght(163);
		$kl -> setProducent('Dialog');
	
		$kl -> setJ(2);
		$kl -> setTubs(1);
		$kl->setIdStandard($manager->merge($this->getReference('s1')));
		$kl ->setIdKabelType($manager->merge($this->getReference('kt1')));
		$kl ->setIdObjectType($manager->merge($this->getReference('ok')));
		$this->SetReference('kl2',$kl);
		$manager-> persist($kl);
		
		
		$kl = new Kabel();
		//	$k3 -> setIdHistori($manager->merge($this->getReference('h9')));
		$kl -> setIdMufaStart($manager->merge($this->getReference('m4')));
		$kl -> setIdMufaEnd($manager->merge($this->getReference('kk3')));
		$kl -> setLenght(173);
		$kl -> setProducent('Dialog');

		$kl -> setJ(2);
		$kl -> setTubs(1);
		$kl->setIdStandard($manager->merge($this->getReference('s1')));
		$kl ->setIdKabelType($manager->merge($this->getReference('kt1')));
		$kl ->setIdObjectType($manager->merge($this->getReference('ok')));
		$this->SetReference('kl3',$kl);
		$manager-> persist($kl);
		
		
/*
 * REJON 2
 */		
		$r2k1 = new Kabel();
		//$k1 -> setIdHistori($manager->merge($this->getReference('h7')));
		$r2k1 -> setIdMufaStart($manager->merge($this->getReference('r2m1')));
		$r2k1 -> setIdMufaEnd($manager->merge($this->getReference('r2m2')));
		$r2k1 -> setLenght(100);
		$r2k1 -> setProducent('Optix');
;
		$r2k1 -> setJ(128);
		$r2k1 -> setTubs(8);
		$r2k1 ->setIdKabelType($manager->merge($this->getReference('kt1')));
		$r2k1 ->setIdObjectType($manager->merge($this->getReference('ot')));	
		$r2k1 ->setIdStandard($manager->merge($this->getReference('s1')));
		$manager-> persist($r2k1);
		
		$r2k2 = new Kabel();
		//	$k2 -> setIdHistori($manager->merge($this->getReference('h8')));
		$r2k2 -> setIdMufaStart($manager->merge($this->getReference('r2m2')));
		$r2k2 -> setIdMufaEnd($manager->merge($this->getReference('r2m3')));
		$r2k2 ->setIdKabelType($manager->merge($this->getReference('kt1')));
		$r2k2 ->setIdObjectType($manager->merge($this->getReference('ot')));
		$r2k2 -> setLenght(320);
		$r2k2 -> setProducent('Teodor');

		$r2k2 -> setJ(128);
		$r2k2 -> setTubs(8);
		$r2k2->setIdStandard($manager->merge($this->getReference('s1')));
		$manager-> persist($r2k2);
		
		
	
		
		$manager->flush();
		
		$this->setReference('k1',$k1);
		$this->setReference('k2',$k2);
		$this->SetReference('k3',$k3);
		$this->SetReference('k4',$k4);
		$this->SetReference('k5',$k5);
		
		$this->setReference('r2k1',$r2k1);
		$this->setReference('r2k2',$r2k2);
	
		
	// REJON 3
	 for ($i=0;$i<=199;$i++){
	 	
	 	echo ' gk'.$i;
		$gk = new Kabel();
		//	$k3 -> setIdHistori($manager->merge($this->getReference('h9')));
		$ref='gm'.$i;
		$k=$i+1;
		$ref2='gm'.$k;
		$gk -> setIdMufaStart($manager->merge($this->getReference($ref)));
		$gk -> setIdMufaEnd($manager->merge($this->getReference($ref2)));
		
		
		$gk -> setLenght(234+$i);
		$gk -> setProducent('Dialog');
	
		$gk -> setJ(8);
		$gk -> setTubs(2);
		$gk ->setIdStandard($manager->merge($this->getReference('s1')));
		$gk ->setIdKabelType($manager->merge($this->getReference('kt1')));
		$gk ->setIdObjectType($manager->merge($this->getReference('ot')));
		
		
		$manager-> persist($gk);
		$manager->flush();
		
		$this->setReference('gk'.$i,$gk);
	 }	
		
		
	}
	public function getOrder()
	{
		return 6;
	}
}
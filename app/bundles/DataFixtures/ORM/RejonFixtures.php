<?php
namespace SpsBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SpsBundle\Entity\Rejon;
use SpsBundle\Entity\Histori;



class RejonFixtures extends AbstractFixture implements OrderedFixtureInterface {
	
	public function load(ObjectManager $manager) {
		$u1 = $manager->merge($this->getReference('u1'));
		
		$rejon1 = new Rejon ();
		$rejon1->setNazwa('GLIWICE OKOLICE ULICY RADOMSKIEJ');
		$rejon1->setKod('GLIRAD');
		//$manager->merge($rejon1->getInstance());
		
	//	$rejon1-> setIdHistori($manager->merge($this->getReference('h1')));
		$manager->persist($rejon1);
		
		$rejon2 = new Rejon ();
		$rejon2->setNazwa('HIGH - DWA WIELKIE BATY');
		$rejon2->setKod('KOSIARZ');
		
	//	$manager->merge($rejon2->getInstance());
		$manager->persist($rejon2);
		
		$rejon3 = new Rejon ();
		$rejon3->setNazwa('Dużo obiektóœ');
		$rejon3->setKod('BANDZIOR');
		
		//	$manager->merge($rejon2->getInstance());
		$manager->persist($rejon3);
		
		$rejon4 = new Rejon ();
		$rejon4->setNazwa('nie dziel przezzero');
		$rejon4->setKod('ZERO');
		
		//	$manager->merge($rejon2->getInstance());
		$manager->persist($rejon4);
		
		
		$rejon5 = new Rejon ();
		$rejon5->setNazwa('Duzy przbieg spawow w petli ');
		$rejon5->setKod('WREDNARUDA');
		
		//	$manager->merge($rejon2->g
		
		
		$manager->flush();
		$manager->clear();
		$this->addReference('r1',$rejon1);
		$this->addReference('r2',$rejon2);
		$this->addReference('r3',$rejon3);
		$this->addReference('r4',$rejon4);
		$this->addReference('r5',$rejon4);
	}
	
	public function getOrder()
	{
		return 3;
	}
}
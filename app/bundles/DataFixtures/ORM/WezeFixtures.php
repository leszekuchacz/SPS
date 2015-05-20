<?php
namespace SpsBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SpsBundle\Entity\Wezel;
use SpsBundle\Entity\Histori;



class WezelFixtures extends AbstractFixture implements OrderedFixtureInterface {
	
	
	public function load(ObjectManager $manager) {
		
		$wez = new Wezel();
	 	$wez->setIdRejon($manager->merge($this->getReference('r1')));
		$wez ->setName('Wezel - SOPOCKA');
		$wez ->setOpis('Skrzynia elektryczna');
		$manager->persist($wez);
		$manager->flush();
		$this->addReference('wez1', $wez);
		
		
		$wez = new Wezel();
		$wez->setIdRejon($manager->merge($this->getReference('r1')));
		$wez ->setName('Wezel - KOZIELSKA');
		$wez ->setOpis('Skrzynia elektryczna');
		$manager->persist($wez);
		$manager->flush();
		$this->addReference('wez2', $wez);
	}
	
	
	public function getOrder()
	{
		return 3;
	}
}
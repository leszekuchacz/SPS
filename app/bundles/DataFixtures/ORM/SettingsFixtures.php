<?php
namespace SpsBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SpsBundle\Entity\Settings;



class SettingsFixtures extends AbstractFixture implements OrderedFixtureInterface {
	
	public function load(ObjectManager $manager) {
		
		$s1 = new Settings();
		$s1->setName('googleapi');
		$s1->setValue('AIzaSyCWbcjVed7EyM27yCJwlkCfsmc33CNaHVM');
		
		$manager->persist($s1);
		
		
		$manager->flush();
		$manager->clear();
	}
	
	
	public function getOrder()
	{
		return 6;
	}
	
}
<?php
namespace SpsBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SpsBundle\Entity\User;

class UserFixtures extends AbstractFixture implements OrderedFixtureInterface {
	public function load(ObjectManager $manager) {

		$u1 = new User();
		$u1 -> setNazwa('Admin');
		$u1 -> setPrawa(1); 
		$u1-> setLastLoged(new \DateTime());
		$u1-> setCreated(new \DateTime());
		$u1 -> setPass("AdminDupa"); 
		
		$manager ->persist($u1);
		$manager ->clear();
		$manager -> flush();
		
		$this->addReference('u1',$u1);
	}
		
		public function getOrder()
		{
			return 1;
		}
	}
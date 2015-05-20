<?php
namespace SpsBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SpsBundle\Entity\Histori;
use SpsBundle\Entity\User;

class HistoriFixtures extends AbstractFixture implements OrderedFixtureInterface {
	public function load(ObjectManager $manager) {

		$u1 = $manager->merge($this->getReference('u1'));
		
		$h1 = new Histori($u1,'Dodanie rejonu');
		$manager->persist($h1);
		//$h2 = new Histori($u1,'dupa');
		//$manager->persist($h2);
		/*$h3 = new Histori($u1,'dupa');
		$manager->persist($h3);
		$h4 = new Histori($u1,'dupa');
		$manager->persist($h4);
		$h5 = new Histori($u1,'dupa');
		$manager->persist($h5);
		$h6 = new Histori($u1,'dupa');
		$manager->persist($h6);
		$h7 = new Histori($u1,'dupa');
		$manager->persist($h7);
		$h8 = new Histori($u1,'dupa');
		$manager->persist($h8);
		$h9 = new Histori($u1,'dupa');
		$manager->persist($h9);
		$h10 = new Histori($u1,'dupa');
		$manager->persist($h10);
		/*
		$h1 = new Histori();
		$h1 -> setData(new \DateTime());
		$h1 -> setIdUser($u1);
		$h1 -> setOperacja('Dodanie rejonu 1');
		$manager->persist($h1);
		
		$h2 = new Histori();
		$h2 -> setData(new \DateTime());
		$h2 -> setIdUser($u1);
		$h2 -> setOperacja('Dodanie rejonu 2');
		$manager->persist($h2);
		
		$h3 = new Histori();
		$h3 -> setData(new \DateTime());
		$h3 -> setIdUser($u1);
		$h3 -> setOperacja('Dodanie mufy 1');
		$manager->persist($h3);
		
		$h4 = new Histori();
		$h4 -> setData(new \DateTime());
		$h4 -> setIdUser($u1);
		$h4 -> setOperacja('Dodanie mufy 2');
		$manager->persist($h4);
		
		$h5 = new Histori();
		$h5 -> setData(new \DateTime());
		$h5 -> setIdUser($u1);
		$h5 -> setOperacja('Dodanie mufy 3');
		$manager->persist($h5);
		
	
		
		$h6 = new Histori();
		$h6 -> setData(new \DateTime());
		$h6 -> setIdUser($u1);
		$h6 -> setOperacja('Dodanie mufy 4');
		$manager->persist($h6);
		
	
		
		$h7 = new Histori();
		$h7 -> setData(new \DateTime());
		$h7 -> setIdUser($u1);
		$h7 -> setOperacja('Dodanie kabla 1');
		$manager->persist($h7);
		
	
		
		$h8 = new Histori();
		$h8 -> setData(new \DateTime());
		$h8 -> setIdUser($u1);
		$h8 -> setOperacja('Dodanie kabla 2');
		$manager->persist($h8);
		
	
		
		$h9 = new Histori();
		$h9 -> setData(new \DateTime());
		$h9 -> setIdUser($u1);
		$h9 -> setOperacja('Dodanie kabla 3');
		$manager->persist($h9);
		
	
		
		$h10 = new Histori();
		$h10 -> setData(new \DateTime());
		$h10 -> setIdUser($u1);
		$h10 -> setOperacja('Dodanie kabla 4');
		$manager->persist($h10);
		
		$manager -> flush();
		
		
		
		//$this->addReference('h1',$h1);
		//$this->addReference('h2',$h2);
		$this->addReference('h3',$h3);
		$this->addReference('h4',$h4);
		$this->addReference('h5',$h5);
		$this->addReference('h6',$h6);
		$this->addReference('h7',$h7);
		$this->addReference('h8',$h8);
		$this->addReference('h9',$h9);
		#$this->addReference('h10',$h10);
		
		*/
		
	}
	public function getOrder()
	{
		return 2;
	}
}
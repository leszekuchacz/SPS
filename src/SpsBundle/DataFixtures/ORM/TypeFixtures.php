<?php
namespace SpsBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SpsBundle\Entity\MufaTyp;
use SpsBundle\Entity\KabelTyp;
use SpsBundle\Entity\ObjectTyp;




class TypeFixtures extends AbstractFixture implements OrderedFixtureInterface {
	public function load(ObjectManager $manager) {
		
	/*
	 * ObjectType
	 */

		$ob = new ObjectTyp();
		$ob->setName('trakt');

		$manager->persist($ob);
		$this->addReference('ot',$ob);
		
		
		$ob = new ObjectTyp();
		$ob->setName('klient');
	
		
		$manager->persist($ob);
		$this->addReference('ok',$ob);
		
		$ob = new ObjectTyp();
		$ob->setName('wezel');
	
		$manager->persist($ob);
		$this->addReference('ow',$ob);
		

		
		
		
		
		
		$mt =new MufaTyp();
		$mt -> setIdObjectType($manager->merge($this->getReference('ow')));
		$mt->setName('Przełącznica światłowodowa 24-SC');
		$mt->setTag('prze24');
		$mt->setValue(24);
	
		$manager->persist($mt);
		$this->addReference('mt1',$mt);
		
		$mt =new MufaTyp();
		$mt -> setIdObjectType($manager->merge($this->getReference('ow')));
		$mt->setName('Przełącznica światłowodowa 48-SC');
		$mt->setTag('prze48');
		$mt->setValue(48);
		$manager->persist($mt);
		$this->addReference('mt2',$mt);
		
		$mt =new MufaTyp();
		$mt->setName('Przełącznica światłowodowa 96-SC');
		$mt->setTag('prze96');
		$mt -> setValue(96);
		$mt -> setIdObjectType($manager->merge($this->getReference('ow')));
		$manager->persist($mt);
		$this->addReference('mt3',$mt);
		

		$mt =new MufaTyp();
		$mt->setName('Mala biała mufa GPON  8-SC');
		$mt->setValue(8);
		$mt -> setIdObjectType($manager->merge($this->getReference('ot')));
		$mt->setTag('gpon8');
		$manager->persist($mt);
		$this->addReference('mt4',$mt);
		
		$mt =new MufaTyp();
		$mt->setName('Duża biala mufa GPON  16-SC');
		$mt -> setIdObjectType($manager->merge($this->getReference('ot')));
		$mt->setTag('gpon16');
		$mt->setValue(16);
		$manager->persist($mt);
		$this->addReference('mt5',$mt);
		
		
		$mt =new MufaTyp();
		$mt->setName('Czarna duza mufa ');
		$mt -> setIdObjectType($manager->merge($this->getReference('ot')));
		$mt->setTag('czaduz');
		$manager->persist($mt);
		$this->addReference('mt6',$mt);
		
		$mt =new MufaTyp();
		$mt->setName('Czarna mala mufa ');
		$mt -> setIdObjectType($manager->merge($this->getReference('ot')));
		$mt->setTag('czamal');
		$manager->persist($mt);
		$this->addReference('mt7',$mt);
		
		$mt =new MufaTyp();
		$mt -> setIdObjectType($manager->merge($this->getReference('ow')));
		$mt->setName('Kaseta 8-SC ');
		$mt->setTag('kaseta8');
		$manager->persist($mt);
		$this->addReference('mt8',$mt);
		
		
		$mt =new MufaTyp();
		$mt->setName('Kaset u klienta ');
		$mt -> setIdObjectType($manager->merge($this->getReference('ok')));
		$mt->setTag('kaseta');
		$manager->persist($mt);
		$this->addReference('mt9',$mt);
		
		
		$mt =new MufaTyp();
		$mt->setName('Studnia SK1 mała ');
		$mt -> setIdObjectType($manager->merge($this->getReference('ow')));
		$mt->setTag('sk1');
		$manager->persist($mt);
		$this->addReference('mt10',$mt);
		
		
		
		
		$mk =new KabelTyp();
		$mk->setName('Kabel jednomodowy');
		$mk->setTag('jedno');
		$mk->setValue(1);
		$manager->persist($mk);
		$this->addReference('kt1',$mk);
		
		$mk =new KabelTyp();
		$mk->setName('Kabel wielomodowy');
		$mk->setTag('wielo');
		$mk->setValue(1);
		$manager->persist($mk);
		$this->addReference('kt2',$mk);
		
		
		$mk =new KabelTyp();
		$mk->setName('Pigtail');
		$mk->setTag('pig');
		$mk->setValue(1);
		$manager->persist($mk);
		$this->addReference('kt3',$mk);
		
		
		
		
		
		
		
		
		$manager -> flush();
		$manager->clear();
		
	}
	
	
	
	public function getOrder()
	{
		return 0;
	}
}
<?php
namespace SpsBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SpsBundle\Entity\Standard;


class StandardFixtures extends AbstractFixture implements OrderedFixtureInterface {
	
		
	
	public function load(ObjectManager $manager) {
	
		$s1 = new Standard();
		$s1->setNazwa('Telefonica');
		$s1->setMax(12);
		
		$s1->setColor1("FF0000");
		$s1->setNazwa1('CZE');
		
		$s1->setColor2("00FF62");
		$s1->setNazwa2('ZIE');
		
		$s1->setColor3("005AFF");
		$s1->setNazwa3('NIE');
		
		$s1->setColor4("FFFFFF");
		$s1->setNazwa4('BIA');
		
		
		$s1->setColor5("EA00F6");
		$s1->setNazwa5('FIO');
		$s1->setColor6("F6A000");
		$s1->setNazwa6('POM');
		$s1->setColor7("FFF07A");
		$s1->setNazwa7('SZA');
		$s1->setColor8("C6C4C6");
		$s1->setNazwa8('ZOL');
		

		$s1->setColor9("A6854B");
		$s1->setNazwa9('BRA');
		$s1->setColor10("F300FF");
		$s1->setNazwa10('ROZ');
		$s1->setColor11("020202");
		$s1->setNazwa11('CZA');
		$s1->setColor12("69DFFF");
		$s1->setNazwa12('TUR');
		$manager->persist($s1);
		$manager->flush();
		$this->addReference('s1',$s1);
	}
		

	/* (non-PHPdoc)
	 * @see \Doctrine\Common\DataFixtures\OrderedFixtureInterface::getOrder()
	 */
		public function getOrder() {
		return 1;
	
		}
	}
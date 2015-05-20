<?php
namespace SpsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SpsBundle\Entity\Rejon;
use SpsBundle\Entity\Histori;
use SpsBundle\Entity\Mufa;


class MufaFixtures extends AbstractFixture implements OrderedFixtureInterface {
	
	public function load(ObjectManager $manager) {
		/*
		 * Rejon 1
		 */
		
		
		
		
		
		
		$w1 = new Mufa();
		$w1 -> setIdRejon($manager->merge($this->getReference('r1')));
		$w1 -> setKod('WKOZIEL');
		$w1 -> setOpis('Przelacznica 8-SC w strone Radomskiej ');
		$w1 -> setGpsE(50.328107);
		$w1 -> setGpsN(18.572795);
		$w1 ->setIdMufaType($manager->merge($this->getReference('mt3')));
		$w1 ->setIdObjectType($manager->merge($this->getReference('ow')));
		$w1 ->setIdWezel($manager->merge($this->getReference('wez2')));
		$manager->persist($w1);
		$this->addReference('mk1', $w1);
	
		$w1 = new Mufa();
		$w1 -> setIdRejon($manager->merge($this->getReference('r1')));
		$w1 -> setKod('KOZ1');
		$w1 -> setOpis('Kozielska 48 ');
		$w1 -> setGpsE(50.326453);
		$w1 -> setGpsN(18.575354);
		$w1 ->setIdMufaType($manager->merge($this->getReference('mt3')));
		$w1 ->setIdObjectType($manager->merge($this->getReference('ot')));
	   $manager->persist($w1);
	   $this->addReference('mk2', $w1);
		
		
		
		$w1 = new Mufa();
		$w1 -> setIdRejon($manager->merge($this->getReference('r1')));
		$w1 -> setKod('WSOPKOZ');
		$w1 -> setOpis('Przelacznica 8-SC strone wezla kozielska ');
		$w1 -> setGpsE(50.328774);
		$w1 -> setGpsN(18.579945);
		$w1 ->setIdMufaType($manager->merge($this->getReference('mt2')));
		$w1 ->setIdObjectType($manager->merge($this->getReference('ow')));
		$w1 ->setIdWezel($manager->merge($this->getReference('wez1')));
		$manager->persist($w1);
		$this->addReference('mk3', $w1);
		
	

		$w1 = new Mufa();
		$w1 -> setIdRejon($manager->merge($this->getReference('r1')));
		$w1 -> setKod('WSOPOC1');
		$w1 -> setOpis('Przelacznica 24-SC przeznaczona na okolice ulicy Radomskiej');
		$w1 -> setGpsE(50.328774);
		$w1 -> setGpsN(18.579945);
		$w1 ->setIdMufaType($manager->merge($this->getReference('mt1')));
		$w1 ->setIdObjectType($manager->merge($this->getReference('ow')));
		$w1 ->setIdWezel($manager->merge($this->getReference('wez1')));
		$manager->persist($w1);
	
		

		
		$m1 = new Mufa();
	//	$m1 -> setIdHistori($manager->merge($this->getReference('h3')));
		$m1 -> setIdRejon($manager->merge($this->getReference('r1')));
		
		$m1 -> setKod('KIERAD');
		$m1 -> setOpis('skrzyzowanie Kielecka z Radomska, miala mufa gpon');
		$m1 -> setGpsE(50.32647761);
		$m1 -> setGpsN(18.58289123);
	//	$m1 -> setIdType($manager->merge($this->getReference('t4')));
		$m1 ->setIdMufaType($manager->merge($this->getReference('mt5')));
		$m1 ->setIdObjectType($manager->merge($this->getReference('ot')));
		
		
		$manager->persist($m1);
		
		$m2 = new Mufa();
		//$m2 -> setIdHistori($manager->merge($this->getReference('h4')));
		$m2 -> setIdRejon($manager->merge($this->getReference('r1')));
	
		$m2 -> setKod('RADZAK');
		$m2 -> setOpis('skrzyzowanie Radomska z Zakopiańska, miala mufa gpon');
		$m2 -> setGpsE(50.32503921);
		$m2 -> setGpsN(18.58465075);
		$m2 ->setIdMufaType($manager->merge($this->getReference('mt4')));
		$m2 ->setIdObjectType($manager->merge($this->getReference('ot')));
		
		$manager->persist($m2);
		
		$m5 = new Mufa();
		//$m2 -> setIdHistori($manager->merge($this->getReference('h4')));
		$m5 -> setIdRejon($manager->merge($this->getReference('r1')));
		
		$m5 -> setKod('ZAKODOL');
		$m5 -> setOpis('ulica Zakopiańska w dół, miala mufa gpon');
		$m5 -> setGpsE(50.323422);
		$m5 -> setGpsN(18.581561);
		$m5 ->setIdMufaType($manager->merge($this->getReference('mt4')));
		$m5 ->setIdObjectType($manager->merge($this->getReference('ot')));
		
		$manager->persist($m5);
		
		
		$m6 = new Mufa();
		//$m2 -> setIdHistori($manager->merge($this->getReference('h4')));
		$m6 -> setIdRejon($manager->merge($this->getReference('r1')));
		
		$m6 -> setKod('ZAKOGORA');
		$m6 -> setOpis('ulica Zakopiańska w góre, miala mufa gpon');
		$m6 -> setGpsE(50.3256);
		$m6 -> setGpsN(18.585799);
		$m6 ->setIdMufaType($manager->merge($this->getReference('mt4')));
		$m6 ->setIdObjectType($manager->merge($this->getReference('ot')));
		
		$manager->persist($m6);
		
		
		$m3 = new Mufa();
	//	$m3 -> setIdHistori($manager->merge($this->getReference('h5')));
		$m3 -> setIdRejon($manager->merge($this->getReference('r1')));
	
		$m3 -> setKod('RONRAD');
		$m3 -> setOpis('rondo  Randomsko, miala mufa gpon');
		$m3 -> setGpsE(50.32288838);
		$m3 -> setGpsN(18.58750463);
		$m3 ->setIdMufaType($manager->merge($this->getReference('mt6')));
		$m3 ->setIdObjectType($manager->merge($this->getReference('ot')));
		
		$manager->persist($m3);
		
		
		$m4 = new Mufa();
	//	$m4 -> setIdHistori($manager->merge($this->getReference('h6')));
		$m4 -> setIdRejon($manager->merge($this->getReference('r1')));
		
		$m4 -> setKod('RADD17');
		$m4 -> setOpis('ulica Radomska przy numerze  19, miala mufa gpon');
		$m4 -> setGpsE(50.32247738);
		$m4 -> setGpsN(18.58842462);
		$m4 ->setIdMufaType($manager->merge($this->getReference('mt6')));
		$m4 ->setIdObjectType($manager->merge($this->getReference('ot')));

	
		
		$manager->persist($m4);
		
		$mk = new Mufa();
		//	$m1 -> setIdHistori($manager->merge($this->getReference('h3')));
		$mk -> setIdRejon($manager->merge($this->getReference('r1')));
		
		$mk -> setKod('Kilient2342');
		$mk -> setOpis('Mala kaseta u klienta 2342');
		$mk -> setGpsE(50.320723);
		$mk -> setGpsN(18.590777);
		$mk ->setIdMufaType($manager->merge($this->getReference('mt6')));
		$mk ->setIdObjectType($manager->merge($this->getReference('ok')));
		$manager->persist($mk);
		$this->addReference('kk1', $mk);
		
		$manager -> flush();
		$manager ->clear();
		
		$mk = new Mufa();
		$mk -> setIdRejon($manager->merge($this->getReference('r1')));
		$mk -> setKod('Kilient2343');
		$mk -> setOpis('Mala kaseta u klienta 2343');
		$mk -> setGpsE(50.321735);
		$mk -> setGpsN(18.586614);
		$mk ->setIdMufaType($manager->merge($this->getReference('mt6')));
		$mk ->setIdObjectType($manager->merge($this->getReference('ok')));
		$manager->persist($mk);
		$this->addReference('kk2', $mk);

		
		
		$manager -> flush();
		$manager ->clear();
	
		

		$mk = new Mufa();
		$mk -> setIdRejon($manager->merge($this->getReference('r1')));
		$mk -> setKod('Kilient2344');
		$mk -> setOpis('Mala kaseta u klienta 2344');
		$mk -> setGpsE(50.322201);
		$mk -> setGpsN(18.589768);
		$mk ->setIdMufaType($manager->merge($this->getReference('mt6')));
		$mk ->setIdObjectType($manager->merge($this->getReference('ok')));
		$manager->persist($mk);
		$this->addReference('kk3', $mk);
		
		
		
		$manager -> flush();
		$manager ->clear();
		
	/*
	 * Rejon 2
	 */
		$r2m1 = new Mufa();
		//	$m1 -> setIdHistori($manager->merge($this->getReference('h3')));
		$r2m1 -> setIdRejon($manager->merge($this->getReference('r2')));
	
		$r2m1 -> setKod('Dubhe');
		$r2m1 -> setOpis('skrzyzowanie Dubhe z Alioth, miala mufa gpon');
		$r2m1 -> setGpsE(1.0);
		$r2m1 -> setGpsN(1.0);
		$r2m1 ->setIdMufaType($manager->merge($this->getReference('mt6')));
		$r2m1 ->setIdObjectType($manager->merge($this->getReference('ot')));
		
		$manager->persist($r2m1);
		
		$manager -> flush();
		$manager ->clear();
		
		$r2m2 = new Mufa();
		//$m2 -> setIdHistori($manager->merge($this->getReference('h4')));
		$r2m2 -> setIdRejon($manager->merge($this->getReference('r2')));
	
		$r2m2 -> setKod('Alioth');
		$r2m2 -> setOpis('skrzyzowanie Alioth z Dubhe, miala mufa gpon');
		$r2m2 -> setGpsE(1.0);
		$r2m2 -> setGpsN(2.0);
		$r2m2 ->setIdMufaType($manager->merge($this->getReference('mt6')));
		$r2m2 ->setIdObjectType($manager->merge($this->getReference('ot')));
		
		$manager->persist($r2m2);
		
		$r2m3 = new Mufa();
		//	$m3 -> setIdHistori($manager->merge($this->getReference('h5')));
		$r2m3 -> setIdRejon($manager->merge($this->getReference('r2')));
	
		$r2m3 -> setKod('Phekida');
		$r2m3 -> setOpis('skrzyzowanie Phekida z Alioth, miala mufa gpon');
		$r2m3 -> setGpsE(2.0);
		$r2m3 -> setGpsN(2.0);
		$r2m3 ->setIdMufaType($manager->merge($this->getReference('mt6')));
		$r2m3 ->setIdObjectType($manager->merge($this->getReference('ot')));
		
		
		
		$manager->persist($r2m3);
	
		$manager -> flush();
		
		
		for ($i=0;$i<=200;$i++){
			
			$ref='gm'.$i;
			echo  $ref.' ';
			
			$gm = new Mufa();
			//	$m3 -> setIdHistori($manager->merge($this->getReference('h5')));
			$gm -> setIdRejon($manager->merge($this->getReference('r3')));
			
			$gm -> setKod('MUFA'.$i);
			$gm -> setOpis('Mufa numer '.$i);
			$gm -> setGpsE(0.0+$i/1000);
			$gm -> setGpsN(0.0+$i/1000);
			$gm ->setIdMufaType($manager->merge($this->getReference('mt6')));
			$gm ->setIdObjectType($manager->merge($this->getReference('ot')));
		
			
			$manager->persist($gm);
			$manager -> flush();
			
			$this->addReference($ref, $gm);
			
		
		
		}
		
		
		//$this->addReference('gm0', $gm);
		
		$this->addReference('m1', $m1);
		$this->addReference('m2', $m2);
		$this->addReference('m3', $m3);
		$this->addReference('m4', $m4);
		$this->addReference('m5', $m5);
		$this->addReference('m6', $m6);
		$this->addReference('mw', $w1);
		
		$this->addReference('r2m1', $r2m1);
		$this->addReference('r2m2', $r2m2);
		$this->addReference('r2m3', $r2m3);
		
	}
	
	
	public function getOrder()
	{
		return 5;
	}
}
<?php

/**
 * Created by PhpStorm.
 * User: blk
 * Date: 11.05.15
 * Time: 09:02
 */
namespace SpsBundle\Twig\Extensions;

use Symfony\Bridge\Doctrine\RegistryInterface;
use SpsBundle\Entity\Settings;

class SpsBundleExtension extends \Twig_Extension {
	protected $doctrine;
	public function __construct(RegistryInterface $doctrine) {
		$this->doctrine = $doctrine;
	}
	
	
	function __destruct () {
	//	$this->doctrine->__destruct();
	}
	
	public function getFilters() {
		return array (
				'get_mufa_name' => new \Twig_Filter_Method ( $this, 'getMufaKodFromId'),
				'get_spaw_name_start' => new \Twig_Filter_Method ( $this, 'getKabelFromSpawStart'),
				'get_standard' => new \Twig_Filter_Method ( $this, 'getStandard',array('is_safe' => array('html'),
				'get_value_from_key' => new \Twig_Filter_Method ( $this, 'getKey')
						
						
						
				))
				
				
						
						
		);
	}
	
	public function getKey($name) {
		$em = $this->doctrine->getManager ();
	
		$x = $em->getRepository ( 'SpsBundle:SpsBundle\Entity\Settings' )->getValueFromName($name);
	
		$em->flush();
		$em->clear();
		return $x[0]['value'];
	}
	
	
	
	public function getMufaKodFromId($id) {
		$em = $this->doctrine->getManager ();
		
		$x = $em->getRepository ( 'SpsBundle:Mufa' )->getMufaKodFromID ( $id );
		
		$em->flush();
		$em->clear();
		return $x;
	}
	
	
	public function getKabelFromSpawStart($id){
		$em = $this->doctrine->getManager ();
		
		$x=$em->getRepository('SpsBundle:Wlokno')->getSpawStartFromId($id);
		
		$em->flush();
		$em->clear();
		return $x;
	}
	
	
	public function getStandard($id_wlokno){
		
		
		$em = $this->doctrine->getManager ();
		
		$x=$em->getRepository('SpsBundle:Wlokno')
		->getFiberPosition($id_wlokno);
		
		$position=$x[0]['1'];
		$max = $x[0]['max'];
		
	//	$colorPos = $max % $position;
		$colorPos=$this->getMaxColor($max, $position);
		
		
		
		$x2=$em->getRepository('SpsBundle:Wlokno')
		->getFiberColor( $colorPos);
		
		//print_r($x2);
		$em->flush();
		$em->clear();
	return ' <font color='.$x2[0]['color'].'>'.
			$x2[0]['nazwa'].'-'.$x[0]['1'].'</font>';
		
		
	}
	
	
	public function getMaxColor($max,$liczba)
	{
		if  ($liczba>$max){
			$liczbaN =$liczba-$max;
			$this->getMaxColor($max, $liczbaN);
		}else{
			return $liczba;
		}
	}
	public function getName() {
		return 'Sps_extension';
	}
}
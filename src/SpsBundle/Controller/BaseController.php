<?php
// src/Controller/PageContr
namespace SpsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ivory\GoogleMap\Map;
use Ivory\GoogleMap\MapTypeId;

class BaseController extends Controller {
	public function indexAction() {
		$em = $this->getDoctrine ()->getManager ();
		
		$base = $em->getRepository ( 'SpsBundle:Rejon' )->getBase ();
		
		$em->flush ();
		$em->clear ();
		return $this->render ( 'SpsBundle:Base:index.html.twig', array (
				'rejons' => $base 
		) );
	}
	public function rejonAction($id,$id_mufa_focus=null) {
		
	// stare rozwiazanie 	
	/*	
	 $kable = $em->getRepository ( 'SpsBundle:Kabel' )->getKableFromRejon ( $id,'trakt' );
		$kableKlient= $em->getRepository ( 'SpsBundle:Kabel' )->getKableFromRejon ( $id,'klient' );
		// bo doctrine nie lubi FK
		$kable_id_mufa_end = $em->getRepository ( 'SpsBundle:Kabel' )->getId_mufa_endFromRejon ( $id,'trakt' );
		
		$kable_id_mufa_start = $em->getRepository ( 'SpsBundle:Kabel' )->getId_mufa_startFromRejon ( $id,'trakt' );
		/*
		 $x;
		$i = 0;
		foreach ( $kable as $kabel ) {
			$x [$i] = array_merge ( 
					$kabel, 
					$kable_id_mufa_start [$i], 
					$kable_id_mufa_end [$i] );
			$i ++;
		}
		
			
		$kable_id_mufa_end = $em->getRepository ( 'SpsBundle:Kabel' )->getId_mufa_endFromRejon ( $id,'klient' );
		
		$kable_id_mufa_start = $em->getRepository ( 'SpsBundle:Kabel' )->getId_mufa_startFromRejon ( $id,'klient' );
		
		$x2;
		$i = 0;
		foreach ( $kableKlient as $kabel ) {
			$x2 [$i] = array_merge (
					$kabel,
					$kable_id_mufa_start [$i],
					$kable_id_mufa_end [$i] );
			$i ++;
		}
		if (!isset($x2)){
			$x2=null;
		}
		
		*/
		
		
		$em = $this->getDoctrine ()->getManager ();
		
		$rejon = $em->getRepository ( 'SpsBundle:Rejon' )->find ( $id );
		
		$mufy = $em->getRepository ( 'SpsBundle:Mufa' )->findBy ( array (
				'id_rejon' => $id
		) );
		
		
		$wezel = $em->getRepository ( 'SpsBundle:Wezel' )
						->getWezelFomRejon( $id);
		$newkable = $em->getRepository ( 'SpsBundle:Kabel' )->newGetKableFromRejon ( $id,'trakt' );
		$newKableKlienckie = $em->getRepository ( 'SpsBundle:Kabel' )->newGetKableFromRejon ( $id,'klient' );
		
		
	
		
		
		
		$em->flush ();
		$em->clear ();
		if(isset($id_mufa_focus)){
			return $this->render ( 'SpsBundle:Base:rejon.html.twig', array (
					'rejon' => $rejon,
					'wezly' => $wezel,
					'mufy' => $mufy,
					'kable' => $newkable,
					'kableKlient' =>$newKableKlienckie,
					'id_focus' =>$id_mufa_focus
			));
		}
		
		return $this->render ( 'SpsBundle:Base:rejon.html.twig', array (
				'rejon' => $rejon,
				'wezly' => $wezel,
				'mufy' => $mufy,
				'kable' => $newkable,
				'kableKlient' =>$newKableKlienckie
		)
		 );
	}
	public function kabelEndAction($id, $id_kabel, $id_mufa) {
		$em = $this->getDoctrine ()->getManager ();
		
		$rejon = $em->getRepository ( 'SpsBundle:Rejon' )->find ( $id );
		$kabel = $em->getRepository ( 'SpsBundle:Kabel' )->find ( $id_kabel );
		
		$wlokna = $em->getRepository ( 'SpsBundle:Wlokno' )->getWloknaEnd ( $id_kabel, $id_mufa );
		
		$x;
		$i = 0;
		foreach ( $wlokna as $wlokno ) {
			
			$idd = $em->getRepository ( 'SpsBundle:Wlokno' )->getSpawEndFromId ( $wlokno ['id'] );
			
			$x [$i] ['id'] = $idd [0];
			
			if ($wlokno ['id_spaw'] != null) {
				$id_spaw = $em->getRepository ( 'SpsBundle:Wlokno' )->getSpawEndFromId ( $wlokno ['id_spaw'] );
				
				// print_r($id_spaw);
				$x [$i] ['id_spaw'] = $id_spaw [0];
			} else {
				$x [$i] ['id_spaw'] = array ();
			}
			$i ++;
		}
		$side = "end";
		
		$em->flush ();
		$em->clear ();
		return $this->render ( 'SpsBundle:Base:kabel.html.twig', array (
				'rejon' => $rejon,
				'kabel' => $kabel,
				'wlokna' => $x,
				'side' => $side 
		) );
	}
	public function kabelStartAction($id, $id_kabel, $id_mufa) {
		$em = $this->getDoctrine ()->getManager ();
		
		$rejon = $em->getRepository ( 'SpsBundle:Rejon' )->find ( $id );
		$kabel = $em->getRepository ( 'SpsBundle:Kabel' )->find ( $id_kabel );
		
		$wlokna = $em->getRepository ( 'SpsBundle:Wlokno' )->getWloknaStart ( $id_kabel, $id_mufa );
		//$newWlokna = $em->getRepository ( 'SpsBundle:Wlokno' )->newGetWloknaStart ( $id_kabel, $id_mufa );
		
		$x;
		$i = 0;
		foreach ( $wlokna as $wlokno ) {
			
			$idd = $em->getRepository ( 'SpsBundle:Wlokno' )->getSpawStartFromId ( $wlokno ['id'] );
			
			$x [$i] ['id'] = $idd [0];
			
			if ($wlokno ['id_spaw'] != null) {
				$id_spaw = $em->getRepository ( 'SpsBundle:Wlokno' )->getSpawStartFromId ( $wlokno ['id_spaw'] );
				
				// print_r($id_spaw);
				$x [$i] ['id_spaw'] = $id_spaw [0];
			} else {
				$x [$i] ['id_spaw'] = array ();
			}
			$i ++;
		}
		$side = "start";
		
		$em->flush ();
		$em->clear ();
		
		return $this->render ( 'SpsBundle:Base:kabel.html.twig', array (
				'rejon' => $rejon,
				'kabel' => $kabel,
				'wlokna' => $x,
				'side' => $side 
		) );
	}
}
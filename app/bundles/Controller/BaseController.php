<?php
// src/Controller/PageContr
namespace SpsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ivory\GoogleMap\Map;
use Ivory\GoogleMap\MapTypeId;
use SpsBundle\Entity\Wlokno;
use SpsBundle\Entity\Tag;
use SpsBundle\Form\WloknoType;
use SpsBundle\Form\DeleteSpawType;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use SpsBundle\Form\SpsBundle\Form;


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
	public function showFiberAction($id,$id_w,$id_mufa){
		$em = $this->getDoctrine ()->getManager ();
		$rejon = $em->getRepository ( 'SpsBundle:Rejon' )->find ( $id );
		$i=0;
		$x;
		$razem=0;
	
		while (true){
			$check= $em->getRepository( 'SpsBundle:Wlokno' )-> isMufaStart($id_w,$id_mufa);
			//	var_dump($check);
	
	
			if ($check==true){
				$wlokna = $em->getRepository( 'SpsBundle:Wlokno' )-> getFiberStart($id_w,$id_mufa);
				$x[$i]=$wlokna[0];
				$razem=$razem+$wlokna[0]['od_lenght'];
				$x[$i]['razem']=$razem;
				//	var_dump($x);
	
			}else {
	
				$wlokna = $em->getRepository( 'SpsBundle:Wlokno' )-> getFiberEnd($id_w,$id_mufa);
				$x[$i]=$wlokna[0];
				$razem=$razem+$wlokna[0]['od_lenght'];
				$x[$i]['razem']=$razem;
	
				//var_dump($x);
			}
			if ($wlokna[0]['do_id_w']==null){
				break;
			}else {
				$id_w = $wlokna[0]['do_id_w'];
				$id_mufa = $wlokna[0]['do_id'];
				$i++;
			}
				
		}
		return $this->render ( 'SpsBundle:Base:showFiber.html.twig',array(
				'wlokna' => $x,
				'rejon' => $rejon
		));
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
		
		$mufy = $em->getRepository ( 'SpsBundle:Mufa' )->getMufyType($id,'trakt');
	
		$mufyKlienci = $em->getRepository ( 'SpsBundle:Mufa' )->getMufyType($id,'klient');
		
		
		$wezel = $em->getRepository ( 'SpsBundle:Wezel' )
						->getWezelFomRejon( $id);
		$wezelAll=$em->getRepository ( 'SpsBundle:Wezel' )
						->getAllWezlyFromRejon( $id);
		//var_dump($wezelAll);
		
		$newkable = $em->getRepository ( 'SpsBundle:Kabel' )->newGetKableFromRejon ( $id,'trakt' );
		$newKableKlienckie = $em->getRepository ( 'SpsBundle:Kabel' )->newGetKableFromRejon ( $id,'klient' );
		
		
	
		
		
		
		$em->flush ();
		$em->clear ();
		if(isset($id_mufa_focus)){
			return $this->render ( 'SpsBundle:Base:rejon.html.twig', array (
					'rejon' => $rejon,
					'wezly' => $wezelAll,
					'mufy' => $mufy,
					'mufyK'=> $mufyKlienci,
					'kable' => $newkable,
					'kableKlient' =>$newKableKlienckie,
					'id_focus' =>$id_mufa_focus
			));
		}
		
		return $this->render ( 'SpsBundle:Base:rejon.html.twig', array (
				'rejon' => $rejon,
				'wezly' => $wezelAll,
				'mufy' => $mufy,
				'mufyK'=> $mufyKlienci,
				'kable' => $newkable,
				'kableKlient' =>$newKableKlienckie
		)
		 );
	}
	public function kabelEndAction($id, $id_kabel, $id_mufa,$print=null) {
		$em = $this->getDoctrine ()->getManager ();
		
		$rejon = $em->getRepository ( 'SpsBundle:Rejon' )->find ( $id );
		$kabel = $em->getRepository ( 'SpsBundle:Kabel' )->find ( $id_kabel );
		
		$wlokna = $em->getRepository ( 'SpsBundle:Wlokno' )->getWloknaEnd ( $id_kabel, $id_mufa );
		
		
		$freeWlokna = $em->getRepository ( 'SpsBundle:Wlokno' )->getFiberToSpaw (  $id_mufa,$id_kabel );
		$z=array();
		$i=0;
	
		foreach ($freeWlokna as $wl)
		{
					
			$check= $em->getRepository( 'SpsBundle:Wlokno' )-> isMufaStart($wl['id'],$id_mufa);
				
			if ($check==true){
				$wlk = $em->getRepository( 'SpsBundle:Wlokno' )-> getFiberStart($wl['id'],$id_mufa);
				$z[$i]=$wlk[0];
					//var_dump($wlk);
				//	var_dump($wl['id']);
				
			}else {
				
				$wlk = $em->getRepository( 'SpsBundle:Wlokno' )-> getFiberEnd($wl['id'],$id_mufa);
				$z[$i]=$wlk[0];
				
				
			}
			$i++;
		}
	
	
	
		$x=array();
		$i = 0;
		foreach ( $wlokna as $wlokno ) {
			
			$idd = $em->getRepository ( 'SpsBundle:Wlokno' )->getSpawEndFromId ( $wlokno ['id'] );
			
			$x [$i] ['id'] = $idd [0];
			
			if ($wlokno ['id_spaw'] != null) {
				$id_spaw = $em->getRepository ( 'SpsBundle:Wlokno' )->getSpawEndFromId ( $wlokno ['id_spaw'] );
				
					// print_r($id_spaw);
				$x [$i] ['id_spaw'] = $id_spaw [0];
				$x[$i]['dform'] = $this -> createForm(new DeleteSpawType())->createView();
					
					
			} else {
				$x [$i] ['id_spaw'] = array ();

				$x[$i]['form'] = $this -> createForm(new WloknoType(),$z)->createView();
					
			
			}
			
			$i ++;
		}
		$side = "end";
		
		
		
		

		$em->clear ();
		return $this->render ( 'SpsBundle:Base:kabel.html.twig', array (
				'rejon' => $rejon,
				'kabel' => $kabel,
				'wlokna' => $x,
				'side' => $side,
				'print' => $print
		) );
	}
	public function kabelStartAction($id, $id_kabel, $id_mufa,$print=false) {
		$em = $this->getDoctrine ()->getManager ();
		
		$rejon = $em->getRepository ( 'SpsBundle:Rejon' )->find ( $id );
		$kabel = $em->getRepository ( 'SpsBundle:Kabel' )->find ( $id_kabel );
		
		$wlokna = $em->getRepository ( 'SpsBundle:Wlokno' )->getWloknaStart ( $id_kabel, $id_mufa );
		//$newWlokna = $em->getRepository ( 'SpsBundle:Wlokno' )->newGetWloknaStart ( $id_kabel, $id_mufa );
		
	
		$freeWlokna = $em->getRepository ( 'SpsBundle:Wlokno' )->getFiberToSpaw (  $id_mufa,$id_kabel );
		$i=0;
		$z=array();
	
		foreach ($freeWlokna as $wl)
		{
					
			$check= $em->getRepository( 'SpsBundle:Wlokno' )-> isMufaStart($wl['id'],$id_mufa);
				
			if ($check==true){
				$wlk = $em->getRepository( 'SpsBundle:Wlokno' )-> getFiberStart($wl['id'],$id_mufa);
				$z[$i]=$wlk[0];
					//var_dump($wlk);
				//	var_dump($wl['id']);
				
			}else {
				
				$wlk = $em->getRepository( 'SpsBundle:Wlokno' )-> getFiberEnd($wl['id'],$id_mufa);
				$z[$i]=$wlk[0];
				
				
			}
			$i++;
		}
	//	var_dump($freeWlokna);
		$x= array();
		$i = 0;
		foreach ( $wlokna as $wlokno ) {
			
			$idd = $em->getRepository ( 'SpsBundle:Wlokno' )->getSpawStartFromId ( $wlokno ['id'] );
			
			$x [$i] ['id'] = $idd [0];
			
			if ($wlokno ['id_spaw'] != null) {
				$id_spaw = $em->getRepository ( 'SpsBundle:Wlokno' )->getSpawStartFromId ( $wlokno ['id_spaw'] );
				
				$x[$i]['dform'] = $this -> createForm(new DeleteSpawType())->createView();
				
				$x [$i] ['id_spaw'] = $id_spaw [0];
			} else {
				$x [$i] ['id_spaw'] = array ();
				$x[$i]['form'] = $this -> createForm(new WloknoType(),$z)->createView();
				
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
				'side' => $side,
				'print' => $print
		) );
	}
	public function addSpawAction($id,$id_kabel,$id_mufa,Request $request){
		

		$em = $this->getDoctrine ()->getManager ();
		$rejon = $em->getRepository ( 'SpsBundle:Rejon' )->find ( $id );
		$kabel = $em->getRepository ( 'SpsBundle:Kabel' )->find ( $id_kabel );
		$freeWlokna = $em->getRepository ( 'SpsBundle:Wlokno' )->getFiberToSpaw (  $id_mufa,$id_kabel );
		
		$wlk = $em->getRepository( 'SpsBundle:Wlokno' )-> getFiberStart($freeWlokna[0]['id'],$id_mufa);
		if(!isset($wlk[0]))
		{
			$wlk = $em->getRepository( 'SpsBundle:Wlokno' )-> getFiberEnd($freeWlokna[0]['id'],$id_mufa);
		}
		
		$z=array();
		$i=0;
		foreach ($freeWlokna as $wl)
		{
				
			$check= $em->getRepository( 'SpsBundle:Wlokno' )-> isMufaStart($wl['id'],$id_mufa);
		
			if ($check==true){
				$wlk = $em->getRepository( 'SpsBundle:Wlokno' )-> getFiberStart($wl['id'],$id_mufa);
				$z[$i]=$wlk[0];
				//var_dump($wlk);
				//	var_dump($wl['id']);
		
			}else {
		
				$wlk = $em->getRepository( 'SpsBundle:Wlokno' )-> getFiberEnd($wl['id'],$id_mufa);
				$z[$i]=$wlk[0];
		
		
			}
			$i++;
		}		
		
		
		
		$form = $this-> createForm(new WloknoType(),$z);
		$form ->handleRequest($request);
		$h =$form->getData();
		
		
		if($form->isValid()){
		
		
		
			
			$checkLewa= $em->getRepository( 'SpsBundle:Wlokno' )-> isMufaStart($h['id_lewa'],$id_mufa);
			$checkPrawa= $em->getRepository( 'SpsBundle:Wlokno' )-> isMufaStart($h['id_prawa'],$id_mufa);
		
			
			if ($checkLewa==true){
				$em->getRepository ( 'SpsBundle:Wlokno' )->updateId_spaw_start($h['id_lewa'],$h['id_prawa']);
			}else {
				$em->getRepository ( 'SpsBundle:Wlokno' )->updateId_spaw_end($h['id_lewa'],$h['id_prawa']);
			}
		
			if ($checkPrawa==true){
				$em->getRepository ( 'SpsBundle:Wlokno' )->updateId_spaw_start($h['id_prawa'],$h['id_lewa']);
			}else {
				$em->getRepository ( 'SpsBundle:Wlokno' )->updateId_spaw_end($h['id_prawa'],$h['id_lewa']);
			}
		}
	
		if ($h['side']=='end'){
			
		
		
		return $this->redirect($this->generateUrl('SpsBundle_base_rejon_kabelEnd'
				,array(
						'id' => $id,
						'id_kabel'=>$id_kabel,
						'id_mufa' =>$id_mufa
						
				)
				
				));
		}else
		{
			return $this->redirect($this->generateUrl('SpsBundle_base_rejon_kabelStart'
					,array(
							'id' => $id,
							'id_kabel'=>$id_kabel,
							'id_mufa' =>$id_mufa
			
					)
			
			));
		}		
	}
	public function deleteSpawAction($id,$id_kabel,$id_mufa,Request $request){
		
		$em = $this->getDoctrine ()->getManager ();
		
		
		$form = $this->createForm(new DeleteSpawType());
		$form ->handleRequest($request);
		$h =$form->getData();
	
		
		
			$checkLewa= $em->getRepository( 'SpsBundle:Wlokno' )-> isMufaStart($h['id_lewa'],$id_mufa);
			$checkPrawa= $em->getRepository( 'SpsBundle:Wlokno' )-> isMufaStart($h['id_prawa'],$id_mufa);
			
			
			if ($checkLewa==true){
				$em->getRepository ( 'SpsBundle:Wlokno' )->updateId_spaw_start($h['id_lewa'],null);
			}else {
				$em->getRepository ( 'SpsBundle:Wlokno' )->updateId_spaw_end($h['id_lewa'],null);
			}
			
			if ($checkPrawa==true){
				$em->getRepository ( 'SpsBundle:Wlokno' )->updateId_spaw_start($h['id_prawa'],null);
			}else {
				$em->getRepository ( 'SpsBundle:Wlokno' )->updateId_spaw_end($h['id_prawa'],null);
			}
	
		
		$em->flush();
		$em->clear();
	
		if ($h['side']=='end')
		{
				
		
		
			return $this->redirect($this->generateUrl('SpsBundle_base_rejon_kabelEnd'
					,array(
							'id' => $id,
							'id_kabel'=>$id_kabel,
							'id_mufa' =>$id_mufa
		
					)
		
			));
		}else
		{
			return $this->redirect($this->generateUrl('SpsBundle_base_rejon_kabelStart'
					,array(
							'id' => $id,
							'id_kabel'=>$id_kabel,
							'id_mufa' =>$id_mufa
								
					)
						
			));
		}
		
	}
	
	
}
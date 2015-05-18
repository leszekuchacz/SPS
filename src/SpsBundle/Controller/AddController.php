<?php
namespace SpsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use SpsBundle\Form\RejonType;
use SpsBundle\Form\MufaType;
use SpsBundle\Form\KabelType;

use SpsBundle\Entity\Rejon;
use SpsBundle\Entity\Mufa;
use SpsBundle\Entity\Kabel;
use SpsBundle\Entity\Standard;
use Symfony\Component\HttpFoundation\Request;


class AddController extends Controller
{
	public function indexAction(){
		
		
		$q='';

		return $this->render ( 'SpsBundle:Add:index.html.twig',array(
				'result' => $q		
				
		));
		
		
		
	}

	public function rejonAction(){
		
		$em= $this->getDoctrine()->getManager();
		$rejon = new Rejon();
		
		$form = $this-> createForm(new RejonType(),$rejon);
		
		$base = $em->getRepository ( 'SpsBundle:Rejon' )->getBase ();
		

		return $this->render ( 'SpsBundle:Add:rejon.html.twig'
				,array(
					'form' =>$form->createView(),
						'rejony' =>$base
						
				));
	}
	
	public function rejonReqAction(Request $request){
		
		
		$em= $this->getDoctrine()->getManager();
		$base = $em->getRepository ( 'SpsBundle:Rejon' )->getBase ();
		$rejon = new Rejon();
		$form = $this-> createForm(new RejonType(),$rejon);
		
		  $form ->handleRequest($request);
			
			
			if($form->isValid()){
				
				$result= ' Pomyslnie dodano nowy Rejon do Bazy!';
				$em->persist($rejon);
				$em->flush();
				return $this-> render('SpsBundle:Add:index.html.twig',array(
						
						'result'=> $result
				));
			}
			
		//var_dump($form->getErrorsAsString());
			
			return $this->render ( 'SpsBundle:Add:rejon.html.twig',array(
					
					'form' =>$form->createView(),
					'rejony' =>$base
					
			));
	}
	
	public function mufaAction(){
		$em= $this->getDoctrine()->getManager();
		$base = $em->getRepository ( 'SpsBundle:Mufa' )->getMufy();
		$mufa = new Mufa();
		
		$form = $this-> createForm(new MufaType(),$mufa);
		
		return $this->render ( 'SpsBundle:Add:mufa.html.twig'
				,array(
					'form' =>$form->createView(),
						'mufy' =>$base
				));
	}
	
	public function mufaReqAction(Request $request){
		
		
		$em= $this->getDoctrine()->getManager();
		$base = $em->getRepository ( 'SpsBundle:Mufa' )->getMufy();
		$mufa = new Mufa();
		$form = $this-> createForm(new MufaType(),$mufa);
		
		  $form ->handleRequest($request);
			
			
			if($form->isValid()){
				$result= ' Pomyslnie dodano nowa mufe do Bazy!';
				
				$em->persist($mufa);
				$em->flush();
				$mufa = new Mufa();
				$form = $this-> createForm(new MufaType(),$mufa);
				
				return $this->render('SpsBundle:Add:mufa.html.twig'
						,array(
								'form' =>$form->createView(),
								'mufy' =>$base,
								'result' => $result
						));
			}
			
			
			return $this->render ( 'SpsBundle:Add:mufa.html.twig',array(
					
					'form' =>$form->createView(),
					'mufy' =>$base
					
			));
	}
	
	public function kabelAction(){
		$em= $this->getDoctrine()->getManager();
		$base = $em->getRepository ( 'SpsBundle:Kabel' )->getKable();
		$mufa = new Kabel();
	
		$form = $this-> createForm(new KabelType(),$mufa);
	
		return $this->render ( 'SpsBundle:Add:kabel.html.twig'
				,array(
						'form' =>$form->createView(),
						'kable' =>$base
				));
	}
	
	public function kabelReqAction(Request $request){
	
		$em= $this->getDoctrine()->getManager();
		$base = $em->getRepository ( 'SpsBundle:Kabel' )->getKable();
		$mufa = new Kabel();
		
		$form = $this-> createForm(new KabelType(),$mufa);
	
		$form ->handleRequest($request);
			
			
		if($form->isValid()){
			$result= ' Pomyslnie dodano nowy kabel do Bazy!';
	
			$em->persist($mufa);
			$em->flush();
			$mufa = new Kabel();
			$form = $this-> createForm(new KabelType(),$mufa);
	
			return $this->render('SpsBundle:Add:kabel.html.twig'
					,array(
							'form' =>$form->createView(),
							'kable' =>$base,
							'result' => $result
					));
		}
			
			
		return $this->render ( 'SpsBundle:Add:mufa.html.twig',array(
					
				'form' =>$form->createView(),
				'mufy' =>$base
					
		));
	}
	
	
	
	
	
	
	
	
	
}

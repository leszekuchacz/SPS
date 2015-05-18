<?php
namespace SpsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SpsBundle\Entity\Settings;
use SpsBundle\Form\SettingsType;

class SetController extends Controller
{
	public function indexAction(){
		
		$em = $this->getDoctrine ()->getManager ();
		$data = $em->getRepository ( 'SpsBundle:Settings' )->getAll();
		
	
		$settings =  new Settings();
		$form = $this->createForm(new SettingsType(),$settings);
		
		
		$em->flush();
		$em->clear();
		return $this->render ( 'SpsBundle:Set:index.html.twig', array(
				'data' => $data,
				'form' =>$form->createView()
		));
	}
	
	
	public function AddAction(){
	
		$em = $this->getDoctrine ()->getManager ();
		$data = $em->getRepository ( 'SpsBundle:Settings' )->getAll();
	
		
		$settings =  new Settings();
		$request = $this->getRequest();
		$form = $this->createForm(new SettingsType(),$settings);
		$form->submit($request);
		
	
	
		
		if ($form->isValid()) {
			
			$em = $this->getDoctrine()
			->getEntityManager();
			$em->persist($settings);
			$em->flush();
			$em->clear();
			
			
			return $this->redirect($this->generateUrl('SpsBundle_set', 
					array(
							'data' => $data
			)));
		}
		$em->flush();
		$em->clear();
		return $this->render ( 'SpsBundle:Set:index.html.twig', array(
				'data' => $data,
				'form' => $form	
		));
	}
	
	
	
}

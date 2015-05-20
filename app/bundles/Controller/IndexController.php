<?php
namespace SpsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
	public function indexAction(){
		
		$em = $this->getDoctrine()
		->getEntityManager();
		
		$histori = $em ->getRepository('SpsBundle:Histori')
							->getLatestHistori(10);
		
		
		
		return $this->render ( 'SpsBundle:Index:index.html.twig',
				array('histores' => $histori));
	}
	
}

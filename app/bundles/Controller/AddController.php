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
use SpsBundle\Entity\Wezel;
use SpsBundle\Entity\Wlokno;
use SpsBundle\Entity\Standard;
use Symfony\Component\HttpFoundation\Request;
use SpsBundle\Form\FromRejon\WezelRejonType;
use SpsBundle\Form\FromRejon\MufaRejonType;
use SpsBundle\Form\FromRejon\KabelRejonType;
use SpsBundle\Form\FromRejon\KlientRejonType;
use SpsBundle\Form\FromRejon\PanelRejonType;


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
	
	
	public function addObjectToRejonAction($type,$id){
		$em= $this->getDoctrine()->getManager();
		$rejon = $em->getRepository ( 'SpsBundle:Rejon' )->find ( $id );
		
	
		switch ($type){		
			case 'wezel':
				
				$max = $em->getRepository ( 'SpsBundle:Wezel' )->getLastIdFromRejon($id);
				$max = $max[$id]+1;
				$form = $this->createForm(new WezelRejonType());
				return $this->render ( 'SpsBundle:Add/FromRejon:wezelRejon.html.twig',array(
						'form' => $form->createView(),
						'rejon'=>$rejon,
						'nextid' => $max
				
				));
				
				break;
			case 'patch':
				
				$max = $em->getRepository ( 'SpsBundle:Kabel' )->getLastIdFromRejon($id);
				$max = (int)$max+1;
				
				
				$all[1]= $em-> getRepository ( 'SpsBundle:Standard' )->getAll();
				$all[2]= $em-> getRepository ( 'SpsBundle:Mufa' )->getAllFromRejon($id,'trakt');
				$all[3]= $em-> getRepository ( 'SpsBundle:KabelTyp' )->getAll();
				$all[4]= $em->getRepository ( 'SpsBundle:MufaTyp' )->getMufaTyp('klient');
				
				
				
				
				$form = $this->createForm(new KlientRejonType(),$all);
				
				
				
				return $this->render ( 'SpsBundle:Add/FromRejon:patchRejon.html.twig',array(
						'form' => $form->createView(),
						'rejon'=>$rejon,
						'nextid' => $max
				
				));
				
				break;
			case 'mufa':
				
				
				$max = $em->getRepository ( 'SpsBundle:Mufa' )->getLastIdFromRejon($id);
				$max = $max[$id]+1;
				$mufa_types=$em->getRepository ( 'SpsBundle:MufaTyp' )->getMufaTyp('trakt');
				
				
				$form = $this->createForm(new MufaRejonType(),$mufa_types);
				
				
				
				return $this->render ( 'SpsBundle:Add/FromRejon:mufaRejon.html.twig',array(
						'form' => $form->createView(),
						'rejon'=>$rejon,
						'nextid' => $max
				
				));
				
				
				break;
			case 'kabel':

				
				$max = $em->getRepository ( 'SpsBundle:Kabel' )->getLastIdFromRejon($id);
				$max = (int)$max+1;
				
				
				$all[1]= $em-> getRepository ( 'SpsBundle:Standard' )->getAll();
				$all[2]= $em-> getRepository ( 'SpsBundle:Mufa' )->getAllFromRejon($id,'trakt');
				$all[3]= $em-> getRepository ( 'SpsBundle:KabelTyp' )->getAll();
				
				
				
				
				
				$form = $this->createForm(new KabelRejonType(),$all);
				
				
				
				return $this->render ( 'SpsBundle:Add/FromRejon:kabelRejon.html.twig',array(
						'form' => $form->createView(),
						'rejon'=>$rejon,
						'nextid' => $max
				
				));
				
				
				break;
			case 'klient':
				
				$max = $em->getRepository ( 'SpsBundle:Kabel' )->getLastIdFromRejon($id);
				$max = (int)$max+1;
				
				
				$all[1]= $em-> getRepository ( 'SpsBundle:Standard' )->getAll();
				$all[2]= $em-> getRepository ( 'SpsBundle:Mufa' )->getAllFromRejon($id,'trakt');
				$all[3]= $em-> getRepository ( 'SpsBundle:KabelTyp' )->getAll();
				$all[4]= $em->getRepository ( 'SpsBundle:MufaTyp' )->getMufaTyp('klient');
				
				
				
				
				
				
				
				$form = $this->createForm(new KlientRejonType(),$all);
				
				
				
				return $this->render ( 'SpsBundle:Add/FromRejon:klientRejon.html.twig',array(
						'form' => $form->createView(),
						'rejon'=>$rejon,
						'nextid' => $max
				
				));
				break;
				case 'panel':
				
				
					$max = $em->getRepository ( 'SpsBundle:Mufa' )->getLastIdFromRejon($id);
					$max = (int)$max+1;
				
				
					$all[1]= $em-> getRepository ( 'SpsBundle:Standard' )->getAll();
					$all[2]= $em-> getRepository ( 'SpsBundle:Wezel' )->getWezelFomRejon($id,'trakt');
					$all[3]= $em-> getRepository ( 'SpsBundle:MufaTyp' )->getMufaTyp('wezel');
					
				
				
				
					$form = $this->createForm(new PanelRejonType(),$all);
				
				
				
					return $this->render ( 'SpsBundle:Add/FromRejon:panelRejon.html.twig',array(
							'form' => $form->createView(),
							'rejon'=>$rejon,
							'nextid' => $max
				
					));
				
				
					break;
			default:
				echo "Something fucked up :)";
		}
		
	}
	
	

	public function postAddObjectToRejonAction($type,$id,Request $request){
		
		$em= $this->getDoctrine()->getManager();
		$rejon = $em->getRepository ( 'SpsBundle:Rejon' )->find ( $id );
		
		
		
		switch ($type){
/*
 * POST - WEZEL
 */
			case 'wezel':
		
				$max = $em->getRepository ( 'SpsBundle:Wezel' )->getLastIdFromRejon($id);
				$mufaTyp = $em->getRepository ( 'SpsBundle:MufaTyp' )->getMufaTyp('trakt','sk1');
			
				$max = $max[$id]+1;
				//$base = $em->getRepository ( 'SpsBundle:Wezel' )->getMufy();
				$form = $this->createForm(new WezelRejonType());
				$form ->handleRequest($request);
				$h =$form->getData();
				
				var_dump($form->isValid());
				
			
				
				if($form->isValid()){
					
					$w = new Wezel();
					$w->setName('WEZEL - '.$h['name']);
					$w->setOpis($h['opis']);
					$w->setIdRejon($this->getDoctrine()->getEntityManager()->find('SpsBundle:Rejon',$id));
					$em->persist($w);
					$em->flush();
					
					$m = new Mufa();
					$m ->setIdRejon($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:Rejon',$id));
					$m -> setIdMufaType($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:MufaTyp',$mufaTyp[0]['mid']));
					$m -> setIdObjectType(
							$this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:ObjectTyp',$mufaTyp[0]['oid']));
					$m ->setOpis($h['opis']);
					$m -> setKod('WEZEL'.$h['kod']);
					$m ->setGpsE($h['gps_e']);
					$m ->setGpsN($h['gps_n']);
					$m->setIdWezel($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:Wezel',$w->getId()));
						
						
					$em->persist($m);
					$em->flush();
					$em->clear();
					
					return $this->redirect($this->generateUrl('SpsBundle_base_rejon'
							,array(
									'id' => $id)));					
				}
				
				return $this->render ( 'SpsBundle:Add/FromRejon:wezelRejon.html.twig',array(
						'form' => $form->createView(),
						'rejon'=>$rejon,
						'nextid' => $max
		
				));
		
				break;
			case 'patch':
				
				
				break;
/*
 * POST - MUFA
 */
			case 'mufa':
				
				
				$max = $em->getRepository ( 'SpsBundle:Mufa' )->getLastIdFromRejon($id);
				$max = $max[$id]+1;
				$mufa_types=$em->getRepository ( 'SpsBundle:MufaTyp' )->getMufaTyp('trakt');
				
				
				$form = $this->createForm(new MufaRejonType(),$mufa_types);
				
				$form ->handleRequest($request);
				$h =$form->getData();
				
				//var_dump($h);
				
				if($form->isValid()){	
					
					$m = new Mufa();
					$m ->setIdRejon($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:Rejon',$id));
					$m -> setIdMufaType($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:MufaTyp',$h['mufatype']));
					$m -> setIdObjectType(
							$this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:ObjectTyp',$mufa_types[0]['oid']));
					$m ->setOpis($h['opis']);
					$m -> setKod($h['kod']);
					$m ->setGpsE($h['gps_e']);
					$m ->setGpsN($h['gps_n']);
					
					
					$em->persist($m);
					$em->flush();
					$em->clear();
					
					return $this->redirect($this->generateUrl('SpsBundle_base_rejon'
							,array(
									'id' => $id)));					
				}
				
				return $this->render ( 'SpsBundle:Add/FromRejon:mufaRejon.html.twig',array(
						'form' => $form->createView(),
						'rejon'=>$rejon,
						'nextid' => $max
						));
				
				
				
				break;
/*
 * POST - KABEL
 */				
			case 'kabel':
				
				
				$max = $em->getRepository ( 'SpsBundle:Kabel' )->getLastIdFromRejon($id);
				$max = (int)$max+1;
				$all[1]= $em-> getRepository ( 'SpsBundle:Standard' )->getAll();
				$all[2]= $em-> getRepository ( 'SpsBundle:Mufa' )->getAllFromRejon($id,'trakt');
				$all[3]= $em-> getRepository ( 'SpsBundle:KabelTyp' )->getAll();
				
				
				$form = $this->createForm(new KabelRejonType(),$all);
				$form ->handleRequest($request);
				$h =$form->getData();
				
			//	var_dump($h);
				$ot=$em->getRepository ( 'SpsBundle:ObjectTyp' )->getAll('trakt');
					
				if($form->isValid()){
				
					$k = new Kabel();
					$k->setIdKabelType($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:KabelTyp',$h['kabeltype']));
					
					$k->setIdObjectType($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:ObjectTyp',$ot[0]['id']));
	
					$k->setIdStandard($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:Standard',$h['standard']));
					
					$k->setIdMufaStart($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:Mufa',$h['od']));
					
					$k->setIdMufaEnd($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:Mufa',$h['do']));
					
					$k->setTubs($h['tubs']);
					$k->setJ($h['j']);		
					$k->setLenght($h['lenght']);
					$k->setProducent($h['producent']);
	
					$em ->persist($k);
					$em -> flush();
					
					for ($i=0;$i<$h['j'];$i++)
					{
						var_dump($k->getId());
						$w = new Wlokno();
						$w->setIdKabel($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:Kabel',$k->getId()));
						$em -> persist($w);
					}
					
					$em -> flush();
					$em->clear();
								
					return $this->redirect($this->generateUrl('SpsBundle_base_rejon'
							,array(
									'id' => $id)));
				}
					
				return $this->render ( 'SpsBundle:Add/FromRejon:kabellRejon.html.twig',array(
						'form' => $form->createView(),
						'rejon'=>$rejon,
						'nextid' => $max
				));
/*
 * POST - KLIENT
 */	
			case 'klient':
				
				$max = $em->getRepository ( 'SpsBundle:Kabel' )->getLastIdFromRejon($id);
				$max = (int)$max+1;
				
				
				$all[1]= $em-> getRepository ( 'SpsBundle:Standard' )->getAll();
				$all[2]= $em-> getRepository ( 'SpsBundle:Mufa' )->getAllFromRejon($id,'trakt');
				$all[3]= $em-> getRepository ( 'SpsBundle:KabelTyp' )->getAll();
				$all[4]= $em->getRepository ( 'SpsBundle:MufaTyp' )->getMufaTyp('klient');
				
				
				
				
				
				$form = $this->createForm(new KlientRejonType(),$all);
				
				$form ->handleRequest($request);
				$h =$form->getData();
				
				//	var_dump($h);
				$ot=$em->getRepository ( 'SpsBundle:ObjectTyp' )->getAll('klient');
				
				if($form->isValid()){
					
				
					

					$k = new Kabel();
					$k->setTubs($h['tubs']);
					$k->setJ($h['j']);
					$k->setLenght($h['lenght']);
					$k->setProducent($h['producent']);
					$k->setIdKabelType($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:KabelTyp',$h['kabeltype']));
						
					$k->setIdObjectType($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:ObjectTyp',$ot[0]['id']));
					
					$k->setIdStandard($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:Standard',$h['standard']));
						
					$k->setIdMufaStart($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:Mufa',$h['od']));
						
					
					$m = new Mufa();
					$m ->setIdRejon($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:Rejon',$id));
					$m -> setIdMufaType($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:MufaTyp',$h['mufatyp']));
					$m -> setIdObjectType(
							$this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:ObjectTyp',$ot[0]['id']));
					$m ->setOpis($h['do']);
					$m -> setKod($h['kod']);
					$m ->setGpsE($h['gps_e']);
					$m ->setGpsN($h['gps_n']);
					
					
					$em->persist($m);
					$em -> flush();
					
					
					$k->setIdMufaEnd($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:Mufa',$m->getId()));
						
				
					
					$em ->persist($k);
					$em -> flush();
						
					for ($i=0;$i<$h['j'];$i++)
					{
					var_dump($k->getId());
					$w = new Wlokno();
					$w->setIdKabel($this
					->getDoctrine()
					->getEntityManager()
					->find('SpsBundle:Kabel',$k->getId()));
					$em -> persist($w);
					}
						
					$em -> flush();
					$em->clear();
					
					return $this->redirect($this->generateUrl('SpsBundle_base_rejon'
							,array(
									'id' => $id)));
					}
						
				return $this->render ( 'SpsBundle:Add/FromRejon:klientRejon.html.twig',array(
						'form' => $form->createView(),
						'rejon'=>$rejon,
						'nextid' => $max
				));
/*
 * POST - PANEL
 */
				
				case 'panel':
				
				
					$max = $em->getRepository ( 'SpsBundle:Mufa' )->getLastIdFromRejon($id);
					$max = (int)$max+1;
				

					$all[1]= $em-> getRepository ( 'SpsBundle:Standard' )->getAll();
					$all[2]= $em-> getRepository ( 'SpsBundle:Wezel' )->getWezelFomRejon($id,'trakt');
					$all[3]= $em-> getRepository ( 'SpsBundle:MufaTyp' )->getMufaTyp('wezel');
						
					
				
					
				
					$form = $this->createForm(new PanelRejonType(),$all);
					$form ->handleRequest($request);
					$h =$form->getData();

					var_dump($h);
					$mufaTyp=$em->getRepository ( 'SpsBundle:MufaTyp' )->getMufaTyp('wezel');
					$kableTyp=$em->getRepository ( 'SpsBundle:KabelTyp' )->getKabelTyp('pig');
					$mufa_in = $em-> getRepository ( 'SpsBundle:Wezel' )->getMufaInFomRejon($id,$h['wezel']);
					
			
					
					
					if($form->isValid()){
						
							

						$m = new Mufa();
						$m -> setIdWezel($this
								->getDoctrine()
								->getEntityManager()
								->find('SpsBundle:Wezel',$h['wezel']));
						$m ->setIdRejon($this
								->getDoctrine()
								->getEntityManager()
								->find('SpsBundle:Rejon',$id));
						$m -> setIdMufaType($this
								->getDoctrine()
								->getEntityManager()
								->find('SpsBundle:MufaTyp',$h['j']));
						$m -> setIdObjectType(
								$this
								->getDoctrine()
								->getEntityManager()
								->find('SpsBundle:ObjectTyp',$mufaTyp[$h['j']]['oid']));
						$m ->setOpis($h['opis']);
						$m -> setKod($h['kod']);
						$m ->setGpsE($mufa_in[0]['gps_e']);
						$m ->setGpsN($mufa_in[0]['gps_n']);
						
						$em->persist($m);
						$em ->flush();
						
						

						$k = new Kabel();
						$k -> setProducent('Made in China');
						$k->setIdWezel($this
								->getDoctrine()
								->getEntityManager()
								->find('SpsBundle:Wezel',$h['wezel']));
						$k->setTubs(1);
						$value=$this
								->getDoctrine()
								->getEntityManager()
								->find('SpsBundle:MufaTyp',$h['j'])->getValue();
						$k->setJ($value);
						$k->setLenght(1);	
						$k->setIdKabelType($this
								->getDoctrine()
								->getEntityManager()
								->find('SpsBundle:KabelTyp',$kableTyp[0]['id']));
						
						$k->setIdObjectType($this
								->getDoctrine()
								->getEntityManager()
								->find('SpsBundle:ObjectTyp',$mufaTyp[$h['j']]['oid']));
							
						$k->setIdStandard($this
								->getDoctrine()
								->getEntityManager()
								->find('SpsBundle:Standard',$h['standard']));
			
						$k->setIdMufaStart($this
								->getDoctrine()
								->getEntityManager()
								->find('SpsBundle:Mufa',$m->getId()));
						
					
						
						$k->setIdMufaEnd($this
								->getDoctrine()
								->getEntityManager()
								->find('SpsBundle:Mufa',$mufa_in[0]['id']));
						
					
						$em ->persist($k);
						$em -> flush();
						
						for ($i=0;$i<$value;$i++)
						{
					
							$w = new Wlokno();
							$w->setIdKabel($this
							->getDoctrine()
							->getEntityManager()
							->find('SpsBundle:Kabel',$k->getId()));
							$em -> persist($w);
						}
						
						$em -> flush();
						$em->clear();
						
						return $this->redirect($this->generateUrl('SpsBundle_base_rejon'
								,array(
										'id' => $id)));
					}
						
					return $this->render ( 'SpsBundle:Add/FromRejon:panelRejon.html.twig',array(
							'form' => $form->createView(),
							'rejon'=>$rejon,
							'nextid' => $max
					));		
				
				
		
				
				
				break;
			default:
				echo "Something fucked up :)";
		}
		
		
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

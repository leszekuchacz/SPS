<?php
namespace SpsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ivory\GoogleMap\Map;
use Ivory\GoogleMap\MapTypeId;
use Ivory\GoogleMap\Overlays\Marker;
use Ivory\GoogleMap\Overlays\Animation;
use Ivory\GoogleMap\Overlays\InfoWindow;
use Ivory\GoogleMap\Events\MouseEvent;
use Ivory\GoogleMap\Overlays\Polyline;
use Ivory\GoogleMap\Overlays\EncodedPolyline;

class MapController extends Controller
{
	public function indexAction(){
		
		$map = new Map();
		$map->setPrefixJavascriptVariable('map_');
		$map->setHtmlContainerId('map_canvas');
		
		$map->setAsync(false);
		$map->setAutoZoom(false);
		
		$map->setCenter(0, 0, true);
		$map->setMapOption('zoom', 3);
		
		$map->setBound(-2.1, -3.9, 2.6, 1.4, true, true);
		
		$map->setMapOption('mapTypeId', MapTypeId::ROADMAP);
		$map->setMapOption('mapTypeId', 'roadmap');
		
		$map->setMapOption('disableDefaultUI', true);
		$map->setMapOption('disableDoubleClickZoom', true);
		$map->setMapOptions(array(
				'disableDefaultUI'       => true,
				'disableDoubleClickZoom' => true,
		));
		
		$map->setStylesheetOption('width', '300px');
		$map->setStylesheetOption('height', '300px');
		$map->setStylesheetOptions(array(
				'width'  => '100%',
				'height' => '300px',
		));
		
		$map->setLanguage('en');
		
	
		return $this->render ( 'SpsBundle:Map:index.html.twig',array(
				'map' => $map
		));
	}
	
	public function showAction($id,$id_mufa_focus=null){
		
		
	// Build Map
		$map = new Map();
		$map->setPrefixJavascriptVariable('map_');
		$map->setHtmlContainerId('map_canvas');
		
		$map->setAsync(false);
		$map->setAutoZoom(true);
		
		$map->setCenter(0, 0, true);
		$map->setMapOption('zoom', 2);
		
		$map->setBound(-2.1, -3.9, 2.6, 1.4, true, true);
		
		$map->setMapOption('mapTypeId', MapTypeId::ROADMAP);
		$map->setMapOption('mapTypeId', 'roadmap');
		
		$map->setMapOption('disableDefaultUI', true);
		$map->setMapOption('disableDoubleClickZoom', true);
		$map->setMapOptions(array(
				'disableDefaultUI'       => true,
				'disableDoubleClickZoom' => true,
		));
		
		$map->setStylesheetOption('width', '300px');
		$map->setStylesheetOption('height', '300px');
		$map->setStylesheetOptions(array(
				'width'  => '100%',
				'height' => '300px',
		));
	
		
		$em = $this->getDoctrine ()->getManager ();
		$base = $em->getRepository ( 'SpsBundle:Kabel' )->getGps($id);
		$base2 = $em->getRepository ( 'SpsBundle:Kabel' )->getGpsFristStart($id);
		foreach ($base as $mufa){
			
			$marker =new Marker();
			$marker->setPosition($mufa['gps_e'],$mufa['gps_n'], true);
			if($mufa['id']== $id_mufa_focus)
			{	
				
				$marker->setAnimation(Animation::BOUNCE);
			}
			$infoWindow = new InfoWindow();
			$infoWindow->setPrefixJavascriptVariable('info_window_');
			$infoWindow->setPixelOffset(1.1, 2.1, 'px', 'pt');
			$infoWindow->setContent('<h3>'.$mufa['id'].'-'.$mufa['kod'].'</h3>
											<p>'.$mufa['opis'].'</p'							
					);
			$infoWindow->setOpen(false);
			$infoWindow->setAutoOpen(true);
			$infoWindow->setOpenEvent(MouseEvent::CLICK);
			$infoWindow->setAutoClose(false);
			$infoWindow->setOption('disableAutoPan', true);
			$infoWindow->setOption('zIndex', 10);
			$infoWindow->setOptions(array(
					'disableAutoPan' => true,
					'zIndex'         => 10,
			));
			
			$polyline = new Polyline();
			$polyline->setPrefixJavascriptVariable('polyline_');
			$polyline->setOption('geodesic', true);
			$polyline->setOption('strokeColor', '#ffffff');
			$polyline->setOptions(array(
					'geodesic'    => true,
					'strokeColor' => '#ff0000f',
			));
			$polyline->addCoordinate($mufa['start_e'],$mufa['start_n'], true);
			$polyline->addCoordinate($mufa['end_e'],$mufa['end_n'], true);
			
			
			$marker->setInfoWindow($infoWindow);
			$map->addMarker($marker);
			$map->addPolyline($polyline);
			
		}
		$infoWindow->setOpen(true);
		$infoWindow->setAutoOpen(true);
		
		$marker =new Marker();
		$marker->setPosition($base2[0]['gps_e'],$base2[0]['gps_n'], true);
		
		if($base2[0]['id']== $id_mufa_focus)
		{
		
			$marker->setAnimation(Animation::BOUNCE);
		}
		
		$infoWindow = new InfoWindow();
		$infoWindow->setPrefixJavascriptVariable('info_window_');
		$infoWindow->setPixelOffset(1.1, 2.1, 'px', 'pt');
		$infoWindow->setContent('<h3>'.$base2[0]['id'].'-'.$base2[0]['kod'].'</h3>
											<p>'.$base2[0]['opis'].'</p'
		);
		$infoWindow->setOpen(false);
		$infoWindow->setAutoOpen(true);
		$infoWindow->setOpenEvent(MouseEvent::CLICK);
		$infoWindow->setAutoClose(false);
		$infoWindow->setOption('disableAutoPan', true);
		$infoWindow->setOption('zIndex', 10);
		$infoWindow->setOptions(array(
				'disableAutoPan' => true,
				'zIndex'         => 10,
		));
		//var_dump($base2);
		$marker->setInfoWindow($infoWindow);
		$map->addMarker($marker);
		$em->flush();
		$em->clear();
		
		
	

		return $this->render ( 'SpsBundle:Map:show.html.twig',array(
				'map' => $map
				
		));
		
		
		
		
		
	}
	public function showKabelAction($mufa,$kabel){
		
		$em = $this-> getDoctrine()->getManager();
		$main = $em->getRepository ( 'SpsBundle:Mufa' )->find ( $mufa );
		
		
		
		
		$map = new Map();
		$map->setPrefixJavascriptVariable('map_');
		$map->setHtmlContainerId('map_canvas');
		
		$map->setAsync(false);
		$map->setAutoZoom(true);
		
		$map->setCenter(50, 18, true);
		$map->setMapOption('zoom', 2);
		
		$map->setBound(-2.1, -3.9, 2.6, 1.4, true, true);
		
		$map->setMapOption('mapTypeId', MapTypeId::ROADMAP);
		$map->setMapOption('mapTypeId', 'roadmap');
		
		$map->setMapOption('disableDefaultUI', true);
		$map->setMapOption('disableDoubleClickZoom', true);
		$map->setMapOptions(array(
				'disableDefaultUI'       => true,
				'disableDoubleClickZoom' => true,
		));
		
		$map->setStylesheetOption('width', '300px');
		$map->setStylesheetOption('height', '300px');
		$map->setStylesheetOptions(array(
				'width'  => '100%',
				'height' => '300px',
		));
		
		return $this->render ( 'SpsBundle:Map:show.html.twig',array(
				'map' => $map
		
		));
	}
	
	
}

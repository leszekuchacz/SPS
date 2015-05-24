<?php

namespace SpsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BaseControllerTest extends WebTestCase
{
    public function testIndex()
    {
    	
    	
    	
    	
    	// Klient Testowy
        $client = static::createClient();
       
      
        $crawler = $client->request('GET', '/sps/base');
        $this->assertTrue($crawler->filter('html:contains("Dostepne trakty:")')->count() > 0);
 	 
        $link = $crawler->filter('a:contains("POKAZ")')->eq(0)->link();
        $crawler = $client->click($link);
        $this->assertTrue($crawler->filter('html:contains("Mapa traktu")')->count() > 0);

        $this->assertTrue($crawler->filter('html:contains("OD MUFY")')->count() > 0);
        
        $this->assertTrue($crawler->filter('html:contains("Węzły")')->count() > 0);
        
  
      
    
	}	
}
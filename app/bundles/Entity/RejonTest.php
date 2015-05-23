<?php


namespace SpsBundle\Tests\Entity;

use SpsBundle\Entity\Rejon;

class RejonTest extends \PHPUnit_Framework_TestCase
{
	public function testSlugify()
	{
		$rejon = new Rejon ();
		$this->assertEquals('hello-world', $rejon>slugify('Hello World'));
	}
}
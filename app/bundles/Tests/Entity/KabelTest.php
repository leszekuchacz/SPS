<?php
namespace SpsBundle\Tests\Entity;


use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


class KabelTest extends KernelTestCase
{
	 /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;
    }

    public function testSearchByCategoryName()
    {
        $products = $this->em
            ->getRepository('SpsBundle:Kabel')
            ->findAll();
        ;
        $this->assertGreaterThan(
        		0,$products);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
    }
}
<?php
namespace SpsBundle\Tests\Entity;


use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use SpsBundle\Entity\Standard;


class StandardTest extends KernelTestCase
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
            ->getRepository('SpsBundle:Standard')
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
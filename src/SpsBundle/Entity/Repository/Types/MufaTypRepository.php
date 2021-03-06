<?php

namespace SpsBundle\Entity\Repository\Types;

use Doctrine\ORM\EntityRepository;

/**
 * MufaTypRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MufaTypRepository extends EntityRepository
{
	

	public function getMufaTyp($type,$tag=null){
	
		if($tag !=null){
			
			$qb = $this->getEntityManager()
			->createQuery(
					'SELECT  m.name as mname, m.id as mid,o.name as oname,
				o.id as oid
				FROM SpsBundle:MufaTyp m
				LEFT JOIN SpsBundle:ObjectTyp o
				with m.id_object_type = o.id
				WHERE o.name =:type
					AND m.tag=:tag'
			)->setParameter('type', $type)
			->setParameter('tag', $tag);
			
			return $qb->getResult();
			
		}
		
		
		$qb = $this->getEntityManager()
		->createQuery(
				'SELECT  m.name as mname, m.id as mid,o.name as oname,
				o.id as oid
				FROM SpsBundle:MufaTyp m
				LEFT JOIN SpsBundle:ObjectTyp o
				with m.id_object_type = o.id
				WHERE o.name =:type'
		)->setParameter('type', $type);
	
		return $qb->getResult();
	
	}
}

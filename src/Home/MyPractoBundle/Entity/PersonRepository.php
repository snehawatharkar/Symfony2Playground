<?php

namespace Home\MyPractoBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Home\MyPractoBundle\Entity\Person;

/**
* PersonRepository
*/
class PersonRepository extends EntityRepository
{
	/**
	 * Retrieve all person records from the DB
	 *
	 * @return array
	 */
	public function retrieveAll()
	{
		$qb = $this->createQueryBuilder('p');

		$query = $qb->getQuery();

		return $query->getResult();
	}

	/**
	 * Retrieve a particular person record from the DB
	 *
	 * @param integer $id - Person Id
	 *
	 * @return Person
	 */
	public function retrieve($id)
	{
		return $this->find($id);
	}

	public function getCount()
	{
		$qb = $this->createQueryBuilder('p')
					->select('count(p)');

		$query = $qb->getQuery();

		return $query->getSingleScalarResult();
	}
}
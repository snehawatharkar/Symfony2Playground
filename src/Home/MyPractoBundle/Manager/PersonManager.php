<?php

namespace Home\MyPractoBundle\Manager;

use Home\MyPractoBundle\Entity\Person;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Validator\ValidatorInterface;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Constraints\Email as EmailConstraint;

/**
* PersonManager
*/
class PersonManager
{
	/**
	 * Constructor
	 * 
	 * @param Doctrine                 $doctrine                           - Doctrine
	 */
	public function __construct(Doctrine $doctrine)
	{
		$this->doctrine = $doctrine;
	}

	/**
	 * Add a new person
	 *
	 */
	public function add($data)
	{
		$person = new Person();
		$person->setName($data['name']);
		$person->setEmail($data['email']);
		$person->setMobile($data['mobile']);

		$em = $this->doctrine->getManager();
        $em->persist($person);
        $em->flush();

        return $person;
	}

	/**
	 * Delete an existing person
	 *
	 * @param Person $person - Person
	 */
	public function delete($person)
	{
		$person->setSoftDeleted(1);
		$em = $this->doctrine->getManager();
        $em->persist($person);
        $em->flush();
	}

	/**
	 * Update the fields in Person entity object using the request params
	 *
	 * @param Person $person - Person
	 * @param array $requestParams - Request Params
	 * 
	 * @return null
	 */
	public function updateFields($person, $requestParams)
	{

		if(array_key_exists('name', $requestParams)) {
			$person->setName($requestParams['name']);
			unset($requestParams['name']);
		}

		if(array_key_exists('email', $requestParams)) {
			$person->setEmail($requestParams['email']);
			unset($requestParams['email']);
		}

		if(array_key_exists('mobile', $requestParams)) {
			$person->setMobile($requestParams['mobile']);
			unset($requestParams['mobile']);
		}

		return;
	}
	/**
	 * Patch/Update an existing person
	 *
	 * @param Person $person - Person
	 * @param array $patchData - Request params
	 */
	public function update($person, $patchData)
	{
		$this->updateFields($person, $patchData);
		$em = $this->doctrine->getManager();
        $em->persist($person);
        $em->flush();
	}

	/**
	 * Load person details
	 */
	public function load($id)
	{
		$em = $this->doctrine->getManager();
		$person = $em->getRepository("HomeMyPractoBundle:Person")->retrieve($id);

		if (is_null($person)) {
            return null;
        }

        return $person;
	}

	/**
	 * Load all person details
	 */
	public function loadAll()
	{
		$em = $this->doctrine->getManager();
		$persons = $em->getRepository("HomeMyPractoBundle:Person")->retrieveAll();

		return $persons;
	}

	/**
	 * Get count of person in persons table
	 */
	public function getCount()
	{
		$em = $this->doctrine->getManager();

		return $em->getRepository("HomeMyPractoBundle:Person")->getCount();
	}

}
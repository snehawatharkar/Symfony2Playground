<?php

namespace Home\MyPractoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\Rest\Util\Codes;
use FOS\RestBundle\View\View;

/**
 * Person Controller - This controller is used for CRUD operation on Person
 *
 * @Route("/persons")
 *
 */
class PersonsController extends Controller
{
    /**
     * Get Person Details
     *
     * @param integer $personId - Person Id
     *
     * @Route(name="get_person", methods="GET", path="/{personId}.{_format}")
     *
     * @return array
     */
    public function getPersonAction($personId)
    {
    	$data = array(
    		'name' => 'Ms. India',
    		'id' => $personId,
    		);
    	return array('persons' => $data);
    }

    /**
     * Get All Person Details
     * @return array
     */
    public function getPersonsAction()
    {
    	$data = array(
    		'name' => 'Mr. India',
    		);
    	return array('persons' => $data);
    }

    /**
     * Create a new person entry
     *
     * @return view
     */
    public function postPersonAction()
    {

    }

    /**
     * Update person details
     *
     * @param integer $personId - Person Id
     *
     * @return array
     */
    public function patchPersonAction($personId)
    {

    }

    /**
     * Delete a person
     *
     * @param integer $personId - Person Id
     *
     * @return array
     */
    public function deletePersonAction($personId)
    {

    }
}

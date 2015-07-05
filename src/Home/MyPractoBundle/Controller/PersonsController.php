<?php

namespace Home\MyPractoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Person Controller - This controller is used for CRUD operation on Person
 *
 * @Route("/persons")
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

    }

    /**
     * Get All Person Details
     * @return array
     */
    public function getPersonsAction()
    {
    	var_dump("No Person");
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

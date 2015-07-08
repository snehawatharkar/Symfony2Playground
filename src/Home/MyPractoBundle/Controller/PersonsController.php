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
    	$personManager = $this->get('home_my_practo.person_manager');

        $person = $personManager->load($personId);

        if (null === $person) {
            return View::create(null, Codes::HTTP_NOT_FOUND);
        }

    	return $person->serialise();
    }

    /**
     * Get All Person Details
     * @return array
     */
    public function getPersonsAction()
    {
        $personManager = $this->get('home_my_practo.person_manager');

        $persons = $personManager->loadAll();
        $personCount = $personManager->getCount();

        if (null === $persons) {
            return View::create(null, Codes::HTTP_NOT_FOUND);
        }

    	return View::create(array('persons' => $persons, 'count' => intval($personCount)), Codes::HTTP_OK);
    }

    /**
     * Create a new person entry
     *
     * @return view
     */
    public function postPersonsAction()
    {
        $postData = $this->getRequest()->request->all();

        $personManager = $this->get('home_my_practo.person_manager');
        $person = $personManager->add($postData);

        $router = $this->get('router');
        $personURL = $router->generate('get_person', array(
            'personId' => $person->getId()), true);

        return View::create($person->serialise(),
            Codes::HTTP_CREATED,
            array('Location' => $petrsonURL));
    }

    /**
     * Update person details
     *
     * @param integer $personId - Person Id
     *
     * @Route(name="patch_person", methods="PATCH", path="/{personId}.{_format}")
     *
     * @return array
     */
    public function patchPersonAction($personId)
    {
        $patchData = $this->getRequest()->request->all();

        $personManager = $this->get('home_my_practo.person_manager');

        $person = $personManager->load($personId);

        if (null === $person) {
            return View::create(null, Codes::HTTP_NOT_FOUND);
        }

        $personManager->update($person, $patchData);
        $person = $personManager->load($personId);

        return $person->serialise();
    }

    /**
     * Delete a person
     *
     * @param integer $personId - Person Id
     *
     * @Route(name="delete_person", methods="DELETE", path="/{personId}.{_format}")
     *
     * @return array
     */
    public function deletePersonAction($personId)
    {
        $personManager = $this->get('home_my_practo.person_manager');

        $person = $personManager->load($personId);

        if (null === $person) {
            return View::create(null, Codes::HTTP_NOT_FOUND);
        }

        try {
            $personManager->delete($person);
        }catch (Exception $e) {
            return array('message' => 'failure');
        }
        return array('message' => 'success');
    }
}

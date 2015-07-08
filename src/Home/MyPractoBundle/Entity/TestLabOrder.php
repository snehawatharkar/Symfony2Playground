<?php

namespace Home\MyPractoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Practo\ApiBundle\Entity\TestLabOrder
 * Uses ORM
 *
 * @ORM\Table(name="test_lab_orders")
 * @ORM\Entity()
 */
class TestLabOrder
{

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var integer $practiceSettingsId
     *
     * @ORM\Column(name="practice_settings_id", type="integer", nullable=false)
     */
    protected $practiceSettingsId;


    /**
     * @var integer $patientId
     *
     * @ORM\Column(name="patient_id", type="integer", nullable=false)
     */
    protected $patientId;

    /**
     * @var integer $testLab
     *
     * @ORM\ManyToOne(targetEntity="TestLab")
     * @ORM\JoinColumn(name="test_lab_id", nullable=true)
     */
    protected $testLab;

    /**
     * @var integer $testExpense
     *
     * @ORM\ManyToOne(targetEntity="TestExpense")
     * @ORM\JoinColumn(name="test_expense_id", nullable=true)
     */
    protected $testExpense;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     * Note: setId() is required for entities persisted in the legacy database
     * FIXME when moving to neo database
     *
     * @param integer $id - Id
     *
     * @return integer
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * Get practiceSettingsId
     *
     * @return integer
     */
    public function getPracticeSettingsId()
    {
        return $this->practiceSettingsId;
    }

    /**
     * Set practiceSettingsId
     *
     * @param integer $practiceSettingsId - Practice Settings Id
     */
    public function setPracticeSettingsId($practiceSettingsId)
    {
        $this->practiceSettingsId = $practiceSettingsId;
    }

    /**
     * Get Patient Id
     *
     * @return integer
     */
    public function getPatientId()
    {
        if ($this->patient) {
            return $this->patient->getId();
        } else {
            return $this->patientId;
        }

        return null;
    }

    /**
     * Set Patient Id
     *
     * @param integer $patientId - patientId
     */
    public function setPatientId($patientId)
    {
        $this->patientId = $patientId;
    }

    /**
     * Get Lab Id
     *
     * @return integer
     */
    public function getTestLab()
    {
        return $this->testLab;
    }

    /**
     * Set Lab Id
     *
     * @param integer $testLab - testLab
     */
    public function setTestLab($testLab)
    {
        $this->testLab = $testLab;
    }

    /**
     * Get Expense Id
     *
     * @return integer
     */
    public function getTestExpense()
    {
        return $this->testExpense;
    }

    /**
     * Set Lab Id
     *
     * @param integer $testExpense - testExpense
     */
    public function setTestExpense($testExpense)
    {
        $this->testExpense = $testExpense;
    }

    /**
     * Is Editable Attribute
     *
     * @param string $attrSnake - Snake cased attribute
     *
     * @return boolean
     */
    public function isEditableAttribute($attrSnake)
    {
        $editableAttributes = array('patient_id', 'test_lab_id');

        return in_array($attrSnake, $editableAttributes);
    }

    /**
     * Serialise
     *
     * @return array
     */
    public function serialise()
    {

        $data = array(
            'practice_id'   => $this->getPracticeSettingsId(),
            'patient_id'    => $this->getPatientId(),
            'test_lab_id'   => $this->getTestLab(),
            'test_expnese_id' => $this->getTestExpense(),
        ) + parent::serialise();

        return $data;
    }
}

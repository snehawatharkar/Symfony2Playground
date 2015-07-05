<?php

namespace Home\MyPractoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Practo\ApiBundle\Entity\TestLabs
 * Uses ORM
 *
 * @ORM\Table(name="test_labs")
 * @ORM\Entity()
 */
class TestLabs
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="TestExpenseVendor")
     * @ORM\JoinColumn(name="test_expense_vendor_id", nullable=false)
     * @var integer $testExpenseVendor
     */
    
    protected $testExpenseVendor;
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
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name - Name
     */
    public function setName($name)
    {
        $this->setString('name', $name);
    }

    /**
     * Get Expense Vendor Id
     * @return integer
     */
     public function getTestExpenseVendor()
     {
        return $this->testExpenseVendor;
     }

     /**
      * Set Expense Vendor Id
      * @param integer $testExpenseVendor
      */
     public function setTestExpenseVendor($testExpenseVendor)
     {
        $this->testExpenseVendor = $testExpenseVendor;
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
        $editableAttributes = array('name');

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
            'practice_id'      => $this->getPracticeSettingsId(),
            'name'             => $this->getName(),
            'test_expense_vendor_id' => $this->getTestExpenseVendor(),
        ) + parent::serialise();

        return $data;
    }
}

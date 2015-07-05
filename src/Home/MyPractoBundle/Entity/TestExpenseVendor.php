<?php

namespace Home\MyPractoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Practo\ApiBundle\Entity\ExpenseCategory
 *
 * @ORM\Table(name="test_expense_vendor")
 * @ORM\Entity()
 */
class TestExpenseVendor
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
     * @var integer $practiceProfileId
     */
    protected $practiceProfileId;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @var string $name
     * @Assert\NotBlank
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="TestExpenseCategory")
     * @ORM\JoinColumn(name="test_expense_category_id", nullable=false)
     * @var integer $testExpenseCategory
     */
    protected $testExpenseCategory;

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
     * Get practiceProfileId
     *
     * @return integer
     */
    public function getPracticeProfileId()
    {
        return $this->practiceProfileId;
    }

    /**
     * Set practiceProfileId
     *
     * @param integer $practiceProfileId - Practice Profile Id
     *
     * @return integer
     */
    public function setPracticeProfileId($practiceProfileId)
    {
        $this->practiceProfileId = $practiceProfileId;
    }

    /**
     * Get Name
     *
     * @return String
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Name
     *
     * @param String $name
     */
    public function setName($name)
    {
        $this->setString('name', $name);
    }

    /**
     * Get Expense Category Id
     * @return integer
     */
     public function getTestExpenseCategory()
     {
        return $this->testExpenseCategory;
     }

     /**
      * Set Expense Category Id
      * @param integer $testExpenseCategory
      */
     public function setTestExpenseCategory($testExpenseCategory)
     {
        $this->testExpenseCategory = $testExpenseCategory;
     }

    /**
     * Is Editable Attribute
     *
     * @param string $attrSnake - Snake cased attribute name
     *
     * @return boolean
     */
    public function isEditableAttribute($attrSnake)
    {
        $editableAttributes = array(
            'name'
        );

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
            'name'        => $this->getName(),
            'practice_id' => $this->getPracticeProfileId(),
            'test_expense_category_id' => $this->getTestExpenseCategory(),
        ) + parent::serialise();

        return $data;
    }
}
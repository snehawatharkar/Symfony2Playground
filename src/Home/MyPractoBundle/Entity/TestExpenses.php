<?php

namespace Home\MyPractoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Practo\ApiBundle\Entity\Expense
 *
 * @ORM\Table(name="test_expenses")
 * @ORM\Entity()
 * @ORM\InheritanceType("SINGLE_TABLE")
 */
class TestExpenses
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
	 * @ORM\ManyToOne(targetEntity="TestExpenseCategory")
	 * @ORM\JoinColumn(name="test_expense_category_id", nullable=false)
	 * @var integer $testExpenseCategory
	 */
	protected $testExpenseCategory;

	/**
     * @var integer $practiceProfileId
     */
    protected $practiceProfileId;

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
	 * Get Practice Profile Id
	 * @return integer
	 */
	 public function getPracticeProfileId()
	 {
	 	return $this->practiceProfileId;
	 }

	 /**
	  * Set Practice Profile Id
	  * @param integer $practiceProfileId
	  */
	 public function setPracticeProfileId($practiceProfileId)
	 {
	 	$this->practiceProfileId = $practiceProfileId;
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
     * Serialise
     *
     * @return array
     */
    public function serialise()
    {
        $data = array_merge(array(
            'practice_id'         => $this->getPracticeProfileId(),
            'test_expense_category_id' => $this->getTestExpenseCategory(),
            'test_expense_vendor_id' => $this->getTestExpenseVendor(),
        ), parent::serialise());

        return $data;
     }
}
<?php

namespace Home\MyPractoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestExpenses
 *
 * @ORM\Table(name="test_expenses", indexes={@ORM\Index(name="idx_test_expense_category_id_test_expenses", columns={"test_expense_category_id"}), @ORM\Index(name="idx_test_expense_vendor_id_test_expenses", columns={"test_expense_vendor_id"})})
 * @ORM\Entity
 */
class TestExpenses
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var \Home\MyPractoBundle\Entity\TestExpenseVendor
     *
     * @ORM\ManyToOne(targetEntity="Home\MyPractoBundle\Entity\TestExpenseVendor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="test_expense_vendor_id", referencedColumnName="id")
     * })
     */
    protected $testExpenseVendor;

    /**
     * @var \Home\MyPractoBundle\Entity\TestExpenseCategory
     *
     * @ORM\ManyToOne(targetEntity="Home\MyPractoBundle\Entity\TestExpenseCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="test_expense_category_id", referencedColumnName="id")
     * })
     */
    protected $testExpenseCategory;


}


<?php

namespace Home\MyPractoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestExpenseVendor
 *
 * @ORM\Table(name="test_expense_vendor", indexes={@ORM\Index(name="idx_test_expense_category_id_test_expense_vendor", columns={"test_expense_category_id"})})
 * @ORM\Entity
 */
class TestExpenseVendor
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Home\MyPractoBundle\Entity\TestExpenseCategory
     *
     * @ORM\ManyToOne(targetEntity="Home\MyPractoBundle\Entity\TestExpenseCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="test_expense_category_id", referencedColumnName="id")
     * })
     */
    private $testExpenseCategory;


}


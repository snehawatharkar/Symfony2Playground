<?php

namespace Home\MyPractoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestLabs
 *
 * @ORM\Table(name="test_labs", indexes={@ORM\Index(name="idx_test_expense_vendor_id_test_labs", columns={"test_expense_vendor_id"})})
 * @ORM\Entity
 */
class TestLabs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="practice_settings_id", type="integer", nullable=false)
     */
    private $practiceSettingsId;

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
     * @var \Home\MyPractoBundle\Entity\TestExpenseVendor
     *
     * @ORM\ManyToOne(targetEntity="Home\MyPractoBundle\Entity\TestExpenseVendor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="test_expense_vendor_id", referencedColumnName="id")
     * })
     */
    private $testExpenseVendor;


}


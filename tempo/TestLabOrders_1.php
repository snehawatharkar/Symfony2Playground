<?php

namespace Home\MyPractoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestLabOrders
 *
 * @ORM\Table(name="test_lab_orders", indexes={@ORM\Index(name="idx_test_lab_id_test_expense_orders", columns={"test_lab_id"}), @ORM\Index(name="idx_test_expense_id_test_expense_orders", columns={"test_expense_id"})})
 * @ORM\Entity
 */
class TestLabOrders
{
    /**
     * @var integer
     *
     * @ORM\Column(name="practice_settings_id", type="integer", nullable=false)
     */
    private $practiceSettingsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="patient_id", type="integer", nullable=false)
     */
    private $patientId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Home\MyPractoBundle\Entity\TestExpenses
     *
     * @ORM\ManyToOne(targetEntity="Home\MyPractoBundle\Entity\TestExpenses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="test_expense_id", referencedColumnName="id")
     * })
     */
    private $testExpense;

    /**
     * @var \Home\MyPractoBundle\Entity\TestLabs
     *
     * @ORM\ManyToOne(targetEntity="Home\MyPractoBundle\Entity\TestLabs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="test_lab_id", referencedColumnName="id")
     * })
     */
    private $testLab;


}


<?php

namespace Home\MyPractoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestExpenseCategory
 *
 * @ORM\Table(name="test_expense_category")
 * @ORM\Entity
 */
class TestExpenseCategory
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


}


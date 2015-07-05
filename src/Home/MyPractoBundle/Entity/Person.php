<?php

namespace Home\MyPractoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Table(name="persons")
 * @ORM\Entity()
 * @ORM\InheritanceType("SINGLE_TABLE")
 */
class Person
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
	 * @var string $name
	 *
	 * @ORM\Column(name="name", type="string")
	 */
	protected $name;

	/**
	 * @var string $email
	 *
	 * @ORM\Column(name="email", type="string")
	 */
	protected $email;

	/**
	 * @var string $mobile
	 *
	 * @ORM\Column(name="mobile", type="string")
	 */
	protected $mobile;

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
	 * Get Name
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set Name
	 *
	 * @param string $name - Name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * Get Email
	 *
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set Email
	 *
	 * @param string $email - Email
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * Get Mobile
	 *
	 * @return string
	 */
	public function getMobile()
	{
		return $this->mobile;
	}

	/**
	 * Set Mobile
	 *
	 * @param string $mobile - Mobile
	 */
	public function setMobile($mobile)
	{
		$this->mobile = $mobile;
	}
	 /**
     * Serialise
     *
     * @return array
     */
    public function serialise()
    {
        $data = array_merge(array(
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'mobile' => $this->getMobile(),
        ), parent::serialise());

        return $data;
     }
}
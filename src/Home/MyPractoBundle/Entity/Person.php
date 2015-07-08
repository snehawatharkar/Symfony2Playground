<?php

namespace Home\MyPractoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Home\MyPractoBundle\Entity\Person
 *
 * @ORM\Table(name="persons")
 * @ORM\Entity(repositoryClass="PersonRepository")
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
	 * @var integer $softDeteleted
	 *
	 * @ORM\Column(name="soft_deleted", type="integer")
	 */
	protected $softDeleted;

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
	 * Soft Deleted
	 *
	 * @return integer
	 */
	public function getSoftDeleted()
	{
		return $this->softDeleted;
	}

	/**
	 * Soft Deleted
	 *
	 * @param integer $softDeleted - Soft Deleted
	 */
	public function setSoftDeleted($softDeleted)
	{
		$this->softDeleted = $softDeleted;
	}
	/**
     * Serialise
     *
     * @return array
     */
    public function serialise()
    {
        $data = array(
        	'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'mobile' => $this->getMobile(),
            'soft_deleted' => $this->getSoftDeleted(),
        );

        return $data;
     }
}
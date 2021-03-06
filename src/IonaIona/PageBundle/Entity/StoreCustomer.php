<?php
namespace IonaIona\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ACollection;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="ionaiona_store_customer")
 * @ORM\HasLifecycleCallbacks
 */
class StoreCustomer
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $state;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $postalCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $phone;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\Email()
     */
    protected $email;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $wantNewsletter;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @ORM\OneToMany(targetEntity="IonaIona\PageBundle\Entity\StoreCustomerProduct", mappedBy="storeCustomer")
     */
    private $storeCustomerProducts;

    public function getId()
    {
        return $this->id;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    public function getPostalCode()
    {
        return $this->postalCode;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setWantNewsletter($wantNewsletter)
    {
        $this->wantNewsletter = $wantNewsletter;
    }

    public function getWantNewsletter()
    {
        return $this->wantNewsletter;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setStoreCustomerProducts($storeCustomerProducts)
    {
        $this->storeCustomerProducts = $storeCustomerProducts;
    }

    public function getStoreCustomerProducts()
    {
        return $this->storeCustomerProducts;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->storeCustomerProducts = new ACollection();
    }

    function __toString()
    {
        return $this->getName();
        //return 'N:'.$this->getName().' · E:'.$this->getEmail().' · P:'.$this->getPhone().' · W:'.$this->getWantNewsletter();
    }

}
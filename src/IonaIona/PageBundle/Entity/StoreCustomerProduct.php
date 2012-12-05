<?php
namespace IonaIona\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="ionaiona_store_customer_flux_product")
 * @ORM\HasLifecycleCallbacks
 */
class StoreCustomerProduct
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="IonaIona\PageBundle\Entity\StoreCustomer", inversedBy="storeCustomerProducts", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="store_customer_id", referencedColumnName="id")
     * @Assert\Valid(deep = true)
     */
    private $storeCustomer;

    /**
     * @ORM\ManyToOne(targetEntity="Flux\ProductBundle\Entity\Product", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * @Assert\Valid(deep = true)
     */
    private $product;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @ORM\Column(type="float")
     */
    protected $price;

    public function setStoreCustomer($storeCustomer)
    {
        $this->storeCustomer = $storeCustomer;
    }

    public function getStoreCustomer()
    {
        return $this->storeCustomer;
    }

    public function setProduct($product)
    {
        $this->product = $product;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    function __toString()
    {
        return $this->storeCustomer;
    }

}
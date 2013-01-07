<?php 
namespace Flux\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Flux\Utilities\Utils;

/**
 * @ORM\Entity
 * @ORM\Table(name="flux_product")
 * @ORM\Entity(repositoryClass="Flux\ProductBundle\Repository\ProductRepository")
 * @ORM\HasLifecycleCallbacks
 * @Gedmo\TranslationEntity(class="Flux\ProductBundle\Entity\Translation\ProductTranslation")
 * @Vich\Uploadable
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=20, unique=true)
     * @Assert\NotBlank()
     */
    protected $code;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Gedmo\Translatable
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $birth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $dimensions;

    /**
     *  @ORM\Column(type="smallint", nullable=true)
     */
    protected $weight;

    /**
     *  @ORM\Column(type="smallint", nullable=true)
     */
    protected $fabrics;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $specifications;
    
    /**
     * @Assert\File(
     *     maxSize="3M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="imatge", fileNameProperty="image1")
     */
    protected $image1File;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $image1;

    /**
     * @Assert\File(
     *     maxSize="3M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="imatge", fileNameProperty="image2")
     */
    protected $image2File;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $image2;

    /**
     * @ORM\Column(type="float")
     */
    protected $price;

    /**
     * @ORM\Column(type="integer")
     */
    protected $stock;

    /**
     * @ORM\Column(type="smallint")
     */
    protected $gender;

    /**
     * @ORM\Column(type="smallint")
     */
    protected $position;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isActive;

    /** 
     * @ORM\ManyToOne(targetEntity="Flux\ProductBundle\Entity\Category") 
     */
    protected $category;

    /**
     * @ORM\OneToMany(
     *  targetEntity="Flux\ProductBundle\Entity\Translation\ProductTranslation",
     *  mappedBy="object",
     *  cascade={"persist", "remove"}
     * )
     * @Assert\Valid(deep = true)
     */
    private $translations;

    /**
     * Constructor
     */
    public function __construct() {
        $this->translations = new ArrayCollection();
    }

    /**
     * Get translations
     *
     * @return ArrayCollection
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * Get translated field and form locale
     */
    public function getTranslatedFieldAndFromLocale($field, $locale)
    {
        $this->getTranslations()->filter(function($entity) {
            return (($entity->getLocale() === $locale) && ($entity->getField() === $field));
        })->first();
    }

    /**
     * Add translation
     * @param EntityTranslation
     */
    public function addTranslation($translation) {
        if ($translation->getContent()) {
            $translation->setObject($this);
            $this->translations->add($translation);
        }
    }
    
    /**
     * Remove translation
     * @param EntityTranslation
     */
    public function removeTranslation($translation) {
        $this->translations->removeElement($translation);
    }

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
     * Set code
     *
     * @param string $code
     * @return Product
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    } 

    /**
     * Set birth
     *
     * @param string $birth
     * @return Product
     */
    public function setBirth($birth)
    {
        $this->birth = $birth;
    
        return $this;
    }

    /**
     * Get birth
     *
     * @return string 
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * Set dimensions
     *
     * @param string $dimensions
     * @return Product
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    
        return $this;
    }

    /**
     * Get dimensions
     *
     * @return string 
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return Product
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    
        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set fabrics
     *
     * @param integer $fabrics
     * @return Product
     */
    public function setFabrics($fabrics)
    {
        $this->fabrics = $fabrics;
    
        return $this;
    }

    /**
     * Get fabrics
     *
     * @return integer 
     */
    public function getFabrics()
    {
        return $this->fabrics;
    }

    /**
     * Set specifications
     *
     * @param string $specifications
     * @return Product
     */
    public function setSpecifications($specifications)
    {
        $this->specifications = $specifications;
    
        return $this;
    }

    /**
     * Get specifications
     *
     * @return string 
     */
    public function getSpecifications()
    {
        return $this->specifications;
    }

    /**
     * Set image1File
     *
     * @param string $imageFile
     * @return Product
     */
    public function setImage1File($imageFile)
    {
        $this->image1File = $imageFile;
        
        return $this;
    }

    /**
     * Get image1File
     *
     * @return string 
     */
    public function getImage1File()
    {
        return $this->image1File;
    }

    /**
     * Set image1
     *
     * @param string $image
     * @return Product
     */
    public function setImage1($image)
    {
        $this->image1 = $image;

        return $this;
    }

    /**
     * Get image1
     *
     * @return string 
     */
    public function getImage1()
    {
        return $this->image1;
    }

    /**
     * Set image2File
     *
     * @param string $imageFile
     * @return Product
     */
    public function setImage2File($imageFile)
    {
        $this->image2File = $imageFile;
        
        return $this;
    }

    /**
     * Get image2File
     *
     * @return string 
     */
    public function getImage2File()
    {
        return $this->image2File;
    }

    /**
     * Set image2
     *
     * @param string $image
     * @return Product
     */
    public function setImage2($image)
    {
        $this->image2 = $image;

        return $this;
    }

    /**
     * Get image2
     *
     * @return string 
     */
    public function getImage2()
    {
        return $this->image2;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Product
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    /**
     * Get stock
     *
     * @return integer
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set gender
     *
     * @param integer $gender
     * @return Product
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return integer
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Product
     */
    public function setPosition($position)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Product
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set category
     *
     * @param Category $category
     * @return Category
     */
    public function setCategory($category = null) {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return Category 
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug() {
        return Utils::getSlug($this->name);
    }

    /**
     * toString
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

}
<?php 
namespace Flux\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @ORM\Table(name="flux_product_category")
 * @ORM\Entity(repositoryClass="Flux\ProductBundle\Repository\CategoryRepository")
 * @ORM\HasLifecycleCallbacks
 * @Gedmo\TranslationEntity(class="Flux\ProductBundle\Entity\Translation\CategoryTranslation")
 * @Vich\Uploadable
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=10, unique=true)
     * @Assert\NotBlank()
     */
    protected $code;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Gedmo\Translatable
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Gedmo\Translatable
     */
    protected $subtitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $summary;
    
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
     * @ORM\Column(type="smallint")
     */
    protected $position;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isActive;

    /**
     * @ORM\OneToMany(
     *  targetEntity="Flux\ProductBundle\Entity\Translation\CategoryTranslation",
     *  mappedBy="object",
     *  cascade={"persist", "remove"}
     * )
     * @Assert\Valid(deep = true)
     */
    private $translations;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated;

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
     * @return Category
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
     * Set title
     *
     * @param string $title
     * @return Category
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    } 

    /**
     * Set subtitle
     *
     * @param string $subtitle
     * @return Category
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    
        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string 
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return Category
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    
        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set image1File
     *
     * @param string $imageFile
     * @return Category
     */
    public function setImage1File($imageFile)
    {
        $this->image1File = $imageFile;
        $this->updated  = new \DateTime();

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
     * @return Category
     */
    public function setImage1($image)
    {
        $this->image1 = $image;
        $this->updated  = new \DateTime();

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
     * @return Category
     */
    public function setImage2File($imageFile)
    {
        $this->image2File = $imageFile;
        $this->updated  = new \DateTime();

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
     * @return Category
     */
    public function setImage2($image)
    {
        $this->image2 = $image;
        $this->updated  = new \DateTime();
        
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
     * Set position
     *
     * @param integer $position
     * @return Category
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
     * @return Category
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
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * toString
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }

}
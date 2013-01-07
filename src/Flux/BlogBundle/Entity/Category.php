<?php 
namespace Flux\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Flux\Utilities\Utils;

/**
 * @ORM\Entity
 * @ORM\Table(name="flux_blog_category")
 * @ORM\Entity(repositoryClass="Flux\BlogBundle\Repository\CategoryRepository")
 * @ORM\HasLifecycleCallbacks
 * @Gedmo\TranslationEntity(class="Flux\BlogBundle\Entity\Translation\CategoryTranslation")
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
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Gedmo\Translatable
     */
    protected $title;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isActive;

    /**
     * @ORM\OneToMany(
     *  targetEntity="Flux\BlogBundle\Entity\Translation\CategoryTranslation",
     *  mappedBy="object",
     *  cascade={"persist", "remove"}
     * )
     * @Assert\Valid(deep = true)
     */
    private $translations;

    /**
     * @ORM\ManyToMany(targetEntity="Flux\BlogBundle\Entity\Post", mappedBy="categories")
     **/
    private $posts;

    /**
     * Constructor
     */
    public function __construct() {
        $this->translations = new ArrayCollection();
        $this->posts = new ArrayCollection();
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
     *
    public function getTranslatedFieldAndFromLocale($field, $locale)
    {
        $this->getTranslations()->filter(function($entity) {
            return (($entity->getLocale() === $locale) && ($entity->getField() === $field));
        })->first();
    }*/

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

    public function setPosts($posts)
    {
        $this->posts = $posts;

        return $this;
    }

    public function getPosts()
    {
        return $this->posts;
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
     * Get title slug
     *
     * @return string
     */
    public function getTitleSlug()
    {
        return Utils::getSlug($this->title);
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
     * toString
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }

}
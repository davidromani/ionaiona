<?php
namespace Flux\ProductBundle\Entity\Translation;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractPersonalTranslation;

/**
 * @ORM\Entity
 * @ORM\Table(
 *  name="flux_product_category_translation",
 *  uniqueConstraints={@ORM\UniqueConstraint(name="lookup_unique_idx", columns={"locale", "object_id", "field"})}
 * )
 */
class CategoryTranslation extends AbstractPersonalTranslation
{
    /**
     * @ORM\ManyToOne(targetEntity="Flux\ProductBundle\Entity\Category", inversedBy="translations")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $object;
}
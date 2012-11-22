<?php 
namespace IonaIona\PageBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Flux\ProductBundle\Entity\Category;
use Flux\ProductBundle\Entity\Translation\CategoryTranslation;
use Flux\ProductBundle\Entity\Product;
use Flux\ProductBundle\Entity\Translation\ProductTranslation;

class Categories implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setCode('00A-00A');
        $category->setTitle('balena');
        $category->setPosition(1);
        $category->setIsActive(true);
        $translation = new CategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('ballena');
        $category->addTranslation($translation);
        $translation = new CategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('whale');
        $category->addTranslation($translation);
        $manager->persist($category);

        $product = new Product();
        $product->setCategory($category);
        $product->setCode('BAL001');
        $product->setName('Balena la Pepa');
        $product->setBirth('Amposta');
        $product->setDimensions('100 cm');
        $product->setWeight(200);
        $product->setFabrics(4);
        $product->setSpecifications('100% cotó orgànic');
        $product->setPosition(1);
        $product->setIsActive(true);
        $manager->persist($product);

        $category = new Category();
        $category->setCode('00A-00B');
        $category->setTitle('girafa');
        $category->setPosition(2);
        $category->setIsActive(true);
        $translation = new CategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('jirafa');
        $category->addTranslation($translation);
        $translation = new CategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('jiraffe');
        $category->addTranslation($translation);
        $manager->persist($category);

        $category = new Category();
        $category->setCode('00A-00C');
        $category->setTitle('mico');
        $category->setPosition(3);
        $category->setIsActive(true);
        $translation = new CategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('mono');
        $category->addTranslation($translation);
        $translation = new CategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('monkey');
        $category->addTranslation($translation);
        $manager->persist($category);

        $manager->flush();
    }
}
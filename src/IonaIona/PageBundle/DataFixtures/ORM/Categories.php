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
        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('name');
        $translation->setContent('La ballena Pepa');
        $product->addTranslation($translation);
        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('name');
        $translation->setContent('The whale Pepa');
        $product->addTranslation($translation);
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($category);
        $product->setCode('BAL002');
        $product->setName('Balena la Buba');
        $product->setBirth('Amposta');
        $product->setDimensions('100 cm');
        $product->setWeight(200);
        $product->setFabrics(4);
        $product->setSpecifications('100% cotó orgànic');
        $product->setPosition(2);
        $product->setIsActive(true);
        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('name');
        $translation->setContent('La ballena Buba');
        $product->addTranslation($translation);
        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('name');
        $translation->setContent('The whale Buba');
        $product->addTranslation($translation);
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($category);
        $product->setCode('BAL003');
        $product->setName('Balena la Pipa');
        $product->setBirth('Amposta');
        $product->setDimensions('100 cm');
        $product->setWeight(200);
        $product->setFabrics(4);
        $product->setSpecifications('100% cotó orgànic');
        $product->setPosition(3);
        $product->setIsActive(true);
        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('name');
        $translation->setContent('La ballena Pipa');
        $product->addTranslation($translation);
        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('name');
        $translation->setContent('The whale Pipa');
        $product->addTranslation($translation);
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($category);
        $product->setCode('BAL004');
        $product->setName('Balena la Mima');
        $product->setBirth('Amposta');
        $product->setDimensions('100 cm');
        $product->setWeight(200);
        $product->setFabrics(4);
        $product->setSpecifications('100% cotó orgànic');
        $product->setPosition(4);
        $product->setIsActive(true);
        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('name');
        $translation->setContent('La ballena Mima');
        $product->addTranslation($translation);
        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('name');
        $translation->setContent('The whale Mima');
        $product->addTranslation($translation);
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

        $product = new Product();
        $product->setCategory($category);
        $product->setCode('JIR001');
        $product->setName('Jirafa la Jifa');
        $product->setBirth('Amposta');
        $product->setDimensions('50 cm');
        $product->setWeight(200);
        $product->setFabrics(4);
        $product->setSpecifications('100% cotó orgànic');
        $product->setPosition(1);
        $product->setIsActive(true);
        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('name');
        $translation->setContent('La girafa Jifa');
        $product->addTranslation($translation);
        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('name');
        $translation->setContent('The jiraffe Jifa');
        $product->addTranslation($translation);
        $manager->persist($product);

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
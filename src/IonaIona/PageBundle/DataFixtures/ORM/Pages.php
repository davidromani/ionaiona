<?php 
namespace IonaIona\PageBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Flux\PageBundle\Entity\Page;
use Flux\PageBundle\Entity\Translation\PageTranslation;

class Pages implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $page = new Page();
        $page->setCode('001-001');
        $page->setTitle('inici');
        $page->setSummary('inici...');
        $page->setText("vols veure l'armari de iona iona? fes pom pom a la porta!");
        $page->setPosition(1);
        $page->setImageBig('presentacion-big.jpeg');
        $page->setImage('presentacion.jpeg');
        $page->setIsActive(true);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('inicio');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('summary');
        $translation->setContent('inicio...');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('text');
        $translation->setContent("¿quieres ver el armario de iona iona? haz pom pom en la puerta!");
        $page->addTranslation($translation);
        $manager->persist($page);

        $manager->flush();
    }
}
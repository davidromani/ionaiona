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
        $page->setText1("vols veure l'armari de iona iona? fes pom pom a la porta!");
        $page->setText2("producte artesanal i de proximitat produït amb materials ecològics");
        $page->setImage1('home1.png');
        $page->setPosition(1);
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
        $translation->setField('text1');
        $translation->setContent("¿quieres ver el armario de iona iona? haz pom pom en la puerta!");
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('text2');
        $translation->setContent("producto artesanal y de proximidad producido con materiales ecológicos");
        $page->addTranslation($translation);

        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('home');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('summary');
        $translation->setContent('home...');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('text1');
        $translation->setContent("want to see the wardrobe iona iona? pom pom beam in the door!");
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('text2');
        $translation->setContent("proximity handmade product produced and environmentally friendly materials");
        $page->addTranslation($translation);

        $manager->persist($page);
        $manager->flush();
    }
}
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

        $page = new Page();
        $page->setCode('002-001');
        $page->setTitle('història');
        $page->setSummary('història...');
        $page->setText1("La història de iona iona i la balena. Hi havia una vegada...<br>Adaptació de la història bíblica<br>(...)<br>");
        $page->setImage1("history.png");
        $page->setPosition(1);
        $page->setIsActive(true);

        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('history');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('summary');
        $translation->setContent('history...');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('text1');
        $translation->setContent("The history of Iona Iona and the whale. Once upon a time...<br>Adaptation of the biblical story<br>(...)<br>");
        $page->addTranslation($translation);

        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('historia');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('summary');
        $translation->setContent('historia...');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('text1');
        $translation->setContent("La historia de Iona Iona y la ballena. Había una vez...<br>Adaptación de la historia bíblica<br>(...)<br>");
        $page->addTranslation($translation);

        $manager->persist($page);

        $page = new Page();
        $page->setCode('002-002');
        $page->setTitle('artesania');
        $page->setSummary('artesania...');
        $page->setText1("Explicar el procés d'elaboració del producte, des de com es treu el patró, elecció de teles, com es talla, com es confecciona i com s'omple.<br>(...)<br>");
        $page->setImage1("crafts.png");
        $page->setPosition(2);
        $page->setIsActive(true);

        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('crafts');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('summary');
        $translation->setContent('crafts...');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('text1');
        $translation->setContent("Explain the process of developing the product, from how to remove the pattern, choice of fabrics, cuts and as such is made and filled.<br>(...)<br>");
        $page->addTranslation($translation);

        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('artesania');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('summary');
        $translation->setContent('artesania...');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('text1');
        $translation->setContent("Explicar el proceso de elaboración del producto, desde cómo se saca el patrón, elección de telas, como se corta, como se confecciona y como se llena.<br>(...)<br>");
        $page->addTranslation($translation);

        $manager->persist($page);

        $page = new Page();
        $page->setCode('002-003');
        $page->setTitle('proximitat');
        $page->setSummary('proximitat...');
        $page->setText1("Proximitat.<br>(...)<br>");
        $page->setImage1("proximity.png");
        $page->setPosition(3);
        $page->setIsActive(true);

        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('crafts');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('summary');
        $translation->setContent('proxiity...');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('text1');
        $translation->setContent("Proxiity.<br>(...)<br>");
        $page->addTranslation($translation);

        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('proximidad');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('summary');
        $translation->setContent('proximidad...');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('text1');
        $translation->setContent("Proximidad.<br>(...)<br>");
        $page->addTranslation($translation);

        $manager->persist($page);

        $manager->flush();
    }
}
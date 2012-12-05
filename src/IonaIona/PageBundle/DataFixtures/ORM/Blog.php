<?php 
namespace IonaIona\PageBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Flux\BlogBundle\Entity\Category;
use Flux\BlogBundle\Entity\Translation\CategoryTranslation;
use Flux\BlogBundle\Entity\Post;
use Flux\BlogBundle\Entity\Translation\PostTranslation;

class Blog implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setTitle('productes');
        $category1->setIsActive(true);
        $translation = new CategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('productos');
        $category1->addTranslation($translation);
        $translation = new CategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('products');
        $category1->addTranslation($translation);
        $manager->persist($category1);

        $post = new Post();
        $post->addCategory($category1);
        $post->setPostDate(new \DateTime());
        $post->setTitle('el nou puff de iona iona');
        $post->setSummary('resum article el nou puff de iona iona');
        $post->setText1('text llarg sobre article de el nou puff iona iona');
        $post->setImage1('post1-img1.png');
        $post->setImage2('post1-img2.png');
        $post->setIsActive(true);
        $translation = new PostTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('el nuevo puff de iona iona');
        $post->addTranslation($translation);
        $translation = new PostTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('the new puff of iona iona');
        $post->addTranslation($translation);
        $translation = new PostTranslation();
        $translation->setLocale('es');
        $translation->setField('summary');
        $translation->setContent('resumen artículo el nuevo puff de iona iona');
        $post->addTranslation($translation);
        $translation = new PostTranslation();
        $translation->setLocale('en');
        $translation->setField('summary');
        $translation->setContent('summary of the new puff of iona iona post');
        $post->addTranslation($translation);
        $translation = new PostTranslation();
        $translation->setLocale('es');
        $translation->setField('text1');
        $translation->setContent('texto largo sobre el artículo de el nuevo puff de iona iona');
        $post->addTranslation($translation);
        $translation = new PostTranslation();
        $translation->setLocale('en');
        $translation->setField('text1');
        $translation->setContent('long text about the new puff of iona iona post');
        $post->addTranslation($translation);
        $manager->persist($post);

        $category2 = new Category();
        $category2->setTitle('notícies');
        $category2->setIsActive(true);
        $translation = new CategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('noticias');
        $category2->addTranslation($translation);
        $translation = new CategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('news');
        $category2->addTranslation($translation);
        $manager->persist($category2);

        $post = new Post();
        $post->addCategory($category1);
        $post->addCategory($category2);
        $post->setPostDate(new \DateTime());
        $post->setTitle('la balena margarita');
        $post->setSummary('resum article la balena margarita');
        $post->setText1('text llarg sobre article de la balena margarita');
        $post->setImage1('post2-img1.png');
        $post->setImage2('post2-img2.png');
        $post->setIsActive(true);
        $translation = new PostTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('la ballena margarita');
        $post->addTranslation($translation);
        $translation = new PostTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('the margarita whale');
        $post->addTranslation($translation);
        $translation = new PostTranslation();
        $translation->setLocale('es');
        $translation->setField('summary');
        $translation->setContent('resumen artículo la ballena margarita');
        $post->addTranslation($translation);
        $translation = new PostTranslation();
        $translation->setLocale('en');
        $translation->setField('summary');
        $translation->setContent('summary of the margarita whale post');
        $post->addTranslation($translation);
        $translation = new PostTranslation();
        $translation->setLocale('es');
        $translation->setField('text1');
        $translation->setContent('texto largo sobre el artículo de la ballena margarita');
        $post->addTranslation($translation);
        $translation = new PostTranslation();
        $translation->setLocale('en');
        $translation->setField('text1');
        $translation->setContent('long text about the margarita whale post');
        $post->addTranslation($translation);
        $manager->persist($post);

        $category = new Category();
        $category->setTitle('inspiració');
        $category->setIsActive(true);
        $translation = new CategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('inspiración');
        $category->addTranslation($translation);
        $translation = new CategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('inspiration');
        $category->addTranslation($translation);
        $manager->persist($category);

        $manager->flush();
    }
}
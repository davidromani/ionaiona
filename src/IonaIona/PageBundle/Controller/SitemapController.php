<?php
namespace IonaIona\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SitemapController extends Controller
{
    /**
     * @Template("PageBundle:Global:sitemap.xml.twig")
     */
    public function sitemapAction()
    {
        $em = $this->getDoctrine()->getManager();

        $urls = array();
        $hostname = $this->getRequest()->getHost();

        array_push($urls, array('loc' => $this->get('router')->generate('inicial'), 'changefreq' => 'weekly', 'priority' => '1.0'));



        // CA
        array_push($urls, array('loc' => $this->get('router')->generate('home_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '1.0'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_balena_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_girafa_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_gossalsitxa_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_pitet_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_ocell_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_banderola_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_mobil_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        foreach ($em->getRepository('FluxProductBundle:Product')->getSortedActiveItems() as $item) {
            array_push($urls, array('loc' => $this->get('router')->generate('armari_items_ca',
                array('_locale' => 'ca',
                    'nom' => $item->getSlug(),
                    'id' => $item->getId())), 'changefreq' => 'weekly', 'priority' => '0.3'));
        }
        array_push($urls, array('loc' => $this->get('router')->generate('taller_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('taller_historia_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('taller_artesania_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('taller_proximitat_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('diari_ca', array('_locale' => 'ca')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        foreach ($em->getRepository('FluxBlogBundle:Post')->getAllPostsSortedByDateQuery()->getResult() as $item) {
            array_push($urls, array('loc' => $this->get('router')->generate('diari_post_ca',
                array('_locale' => 'ca',
                    'year' => $item->getPostDate()->format('Y'),
                    'month' => $item->getPostDate()->format('m'),
                    'day' => $item->getPostDate()->format('d'),
                    'title' => $item->getTitleSlug(),
                    'id' => $item->getId())), 'changefreq' => 'weekly', 'priority' => '0.3'));
        }





        // ES
        array_push($urls, array('loc' => $this->get('router')->generate('home_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '1.0'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_balena_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_girafa_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_gossalsitxa_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_pitet_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_ocell_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_banderola_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_mobil_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        foreach ($em->getRepository('FluxProductBundle:Product')->getSortedActiveItems() as $item) {
            array_push($urls, array('loc' => $this->get('router')->generate('armari_items_es',
                array('_locale' => 'es',
                    'nom' => $item->getSlug(),
                    'id' => $item->getId())), 'changefreq' => 'weekly', 'priority' => '0.3'));
        }
        array_push($urls, array('loc' => $this->get('router')->generate('taller_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('taller_historia_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('taller_artesania_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('taller_proximitat_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('diari_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        foreach ($em->getRepository('FluxBlogBundle:Post')->getAllPostsSortedByDateQuery()->getResult() as $item) {
            array_push($urls, array('loc' => $this->get('router')->generate('diari_post_es',
                array('_locale' => 'es',
                    'year' => $item->getPostDate()->format('Y'),
                    'month' => $item->getPostDate()->format('m'),
                    'day' => $item->getPostDate()->format('d'),
                    'title' => $item->getTitleSlug(),
                    'id' => $item->getId())), 'changefreq' => 'weekly', 'priority' => '0.3'));
        }





        // EN
        array_push($urls, array('loc' => $this->get('router')->generate('home_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '1.0'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_balena_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_girafa_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_gossalsitxa_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_pitet_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_ocell_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_banderola_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('armari_mobil_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        foreach ($em->getRepository('FluxProductBundle:Product')->getSortedActiveItems() as $item) {
            array_push($urls, array('loc' => $this->get('router')->generate('armari_items_en',
                array('_locale' => 'en',
                    'nom' => $item->getSlug(),
                    'id' => $item->getId())), 'changefreq' => 'weekly', 'priority' => '0.3'));
        }
        array_push($urls, array('loc' => $this->get('router')->generate('taller_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('taller_historia_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('taller_artesania_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('taller_proximitat_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('diari_en', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        foreach ($em->getRepository('FluxBlogBundle:Post')->getAllPostsSortedByDateQuery()->getResult() as $item) {
            array_push($urls, array('loc' => $this->get('router')->generate('diari_post_en',
                array('_locale' => 'en',
                    'year' => $item->getPostDate()->format('Y'),
                    'month' => $item->getPostDate()->format('m'),
                    'day' => $item->getPostDate()->format('d'),
                    'title' => $item->getTitleSlug(),
                    'id' => $item->getId())), 'changefreq' => 'weekly', 'priority' => '0.3'));
        }

        return array('urls' => $urls, 'hostname' => $hostname);
    }
}
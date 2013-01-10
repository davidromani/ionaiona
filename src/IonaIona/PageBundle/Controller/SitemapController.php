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
        array_push($urls, array('loc' => $this->get('router')->generate('taller_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('taller_historia_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('taller_artesania_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('taller_proximitat_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        array_push($urls, array('loc' => $this->get('router')->generate('diari_es', array('_locale' => 'es')), 'changefreq' => 'weekly', 'priority' => '0.5'));
        /*foreach ($em->getRepository('ASBAEServicesBundle:GroupService')->findAllActiveAndOrderedByPosition() as $group) {
            foreach ($group->getServices() as $service) {
                array_push($urls, array('loc' => $this->get('router')->generate('detalleservicio_es',
                    array('_locale' => 'es',
                        'grupo' => $group->slug(),
                        'gid' => $group->getId(),
                        'servicio' => $service->slug(),
                        'sid' => $service->getId())), 'changefreq' => 'weekly', 'priority' => '0.5'));
            }
        }*/

        /* multi-lang pages
        foreach($languages as $lang) {
            $urls[] = array('loc' => $this->get('router')->generate('home_contact', array('_locale' => $lang)), 'changefreq' => 'monthly', 'priority' => '0.3');
        }

        // urls from database
        $urls[] = array('loc' => $this->get('router')->generate('home_product_overview', array('_locale' => 'en')), 'changefreq' => 'weekly', 'priority' => '0.7');
        // service
        foreach ($em->getRepository('AcmeSampleStoreBundle:Product')->findAll() as $product) {
            $urls[] = array('loc' => $this->get('router')->generate('home_product_detail',
                array('productSlug' => $product->getSlug())), 'priority' => '0.5');
        }*/

        return array('urls' => $urls, 'hostname' => $hostname);
    }
}
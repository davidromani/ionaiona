<?php
namespace Flux\ProductBundle\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\Translator;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;


class CategoryAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $listMapper
            //->addIdentifier('id')
            ->addIdentifier('code', null, array('label' => $translator->trans('page.code')))
            ->add('title', null, array('label' => $translator->trans('page.title')))
            ->add('image1', null, array('label' => $translator->trans('page.image1'), 'template' => 'FluxPageBundle:Admin:customimg1.html.twig'))
            ->add('position', null, array('label' => $translator->trans('page.position')))
            ->add('is_active', 'boolean', array('label' => $translator->trans('page.active'), 'editable' => true))
            // add custom action links
            ->add('_action', 'actions', array(
                'actions' => array(
                    //'view' => array(),
                    'edit' => array(),
                ),
                'label' => $translator->trans('page.actions')
            ))
        ;
    }

    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'ASC', // sort direction
        '_sort_by' => 'code' // field name
    );

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $datagridMapper
            ->add('title', null, array('label' => $translator->trans('page.title')))
            ->add('isActive', null, array('label' => $translator->trans('page.active')))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $formMapper
            ->add('code', 'text', array('label' => $translator->trans('page.code')))
            ->add('title', 'text', array('label' => $translator->trans('page.title')))
            //->add('subtitle', 'text', array('label' => $translator->trans('page.subtitle'), 'required' => false))
            //->add('summary', 'text', array('label' => $translator->trans('page.summary'), 'required' => false))

            ->with('Imatges') // IMAGES
            ->add('image1File', 'file', array('label' => $translator->trans('page.upload.image1'), 'required' => false))
            ->add('image1', null, array('label' => $translator->trans('page.image1'), 'required' => false, 'read_only' => true))
            // TRY TO PRINT PREVIEW ->add('img1', 'sonata_type_model', array('property_path' => false, 'label' => 'im1', 'required' => false, 'template' => 'FluxPageBundle:Default:img.html.twig'))
            //->add('image2File', 'file', array('label' => $translator->trans('page.upload.image2'), 'required' => false))
            //->add('image2', null, array('label' => $translator->trans('page.image2'), 'required' => false, 'read_only' => true))

            ->with('Traduccions') // TRADUCCIONS
            ->add('translations', 'a2lix_translations_gedmo', array(
                'translatable_class' => 'Flux\ProductBundle\Entity\Category',
                'label' => ' ',
                'fields' => array(
                    'title' => array('label' => $translator->trans('page.title')),
                    'subtitle' => array('label' => $translator->trans('page.subtitle'), 'required' => false),
                    'summary' => array('label' => $translator->trans('page.summary'), 'required' => false),
            )))

            ->with('Controls') // CONTROLS
            ->add('position', 'integer', array('label' => $translator->trans('page.position')))
            ->add('is_active', 'checkbox', array('label' => $translator->trans('page.active'), 'required' => false))
            // help messages like this
            /*->setHelps(array(
               'title' => $this->trans('help_post_title')
            ))*/
            ;
    }

    /*protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('code')
            ->add('position')
            ->add('title')
            ->add('subtitle')
            ->add('summary')
            ->add('text')
        ;
    }*/

    protected function configureRoutes(RouteCollection $collection)
    {
        //$collection->remove('create');
        $collection->remove('delete');
    }
}
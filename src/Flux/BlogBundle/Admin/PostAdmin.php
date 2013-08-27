<?php
namespace Flux\BlogBundle\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\Translator;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class PostAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $listMapper
            ->addIdentifier('id')
            ->add('postDate', null, array('label' => $translator->trans('blog.date'), 'template' => 'FluxPageBundle:Admin:custompostdate.html.twig'))
            ->add('title', null, array('label' => $translator->trans('blog.title')))
            ->add('image1', null, array('label' => $translator->trans('blog.image1'), 'template' => 'FluxPageBundle:Admin:customimg1.html.twig'))
            ->add('is_active', 'boolean', array('label' => $translator->trans('blog.active')))
            // add custom action links
            ->add('_action', 'actions', array(
                'actions' => array(
                    //'view' => array(),
                    'edit' => array(),
                ),
                'label' => $translator->trans('blog.actions')
            ))
        ;
    }

    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC', // sort direction
        '_sort_by' => 'postDate' // field name
    );

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $datagridMapper
            ->add('title', null, array('label' => $translator->trans('blog.title')))
            ->add('isActive', null, array('label' => $translator->trans('blog.active')))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $formMapper
            ->add('postDate', 'genemu_jquerydate', array('label' => $translator->trans('blog.date')))
            ->add('categories', 'genemu_jqueryselect2_entity', array(
                'label' => 'Categories',
                'required' => false,
                'class' => 'Flux\BlogBundle\Entity\Category',
                'multiple' => true,
                'configs'  => array(
                    'placeholder' => 'none',
                    'allowClear'  => true,
                )
            ))
            ->add('title', 'text', array('label' => $translator->trans('blog.title')))
            ->add('subtitle', 'text', array('label' => $translator->trans('blog.subtitle'), 'required' => false))
            ->add('summary', 'text', array('label' => $translator->trans('blog.summary'), 'required' => false))
            ->add('text1', 'textarea', array('label' => $translator->trans('blog.text1'), 'required' => false))
            ->add('text2', 'textarea', array('label' => $translator->trans('blog.text2'), 'required' => false))

            ->with('Imatges') // IMAGES
            ->add('image1File', 'file', array('label' => $translator->trans('blog.upload.image1'), 'required' => false))
            ->add('image1', null, array('label' => $translator->trans('blog.image1'), 'required' => false, 'read_only' => true))
            // TRY TO PRINT PREVIEW ->add('img1', 'sonata_type_model', array('property_path' => false, 'label' => 'im1', 'required' => false, 'template' => 'FluxPageBundle:Default:img.html.twig'))
            ->add('image2File', 'file', array('label' => $translator->trans('blog.upload.image2'), 'required' => false))
            ->add('image2', null, array('label' => $translator->trans('blog.image2'), 'required' => false, 'read_only' => true))
            ->add('image3File', 'file', array('label' => $translator->trans('blog.upload.image3'), 'required' => false))
            ->add('image3', null, array('label' => $translator->trans('blog.image3'), 'required' => false, 'read_only' => true))

            ->with('Traduccions') // TRADUCCIONS
            ->add('translations', 'a2lix_translations_gedmo', array(
                'translatable_class' => 'Flux\BlogBundle\Entity\Post',
                'label' => ' ',
                'fields' => array(
                    'title' => array('label' => $translator->trans('blog.title')),
                    'subtitle' => array('label' => $translator->trans('blog.subtitle'), 'required' => false),
                    'summary' => array('label' => $translator->trans('blog.summary'), 'required' => false),
                    'text1' => array('label' => $translator->trans('blog.text1'), 'required' => false),
                    'text2' => array('label' => $translator->trans('blog.text2'), 'required' => false)
            )))

            ->with('Controls') // CONTROLS
            ->add('is_active', 'checkbox', array('label' => $translator->trans('blog.active'), 'required' => false))
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
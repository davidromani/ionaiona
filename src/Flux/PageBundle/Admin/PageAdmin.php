<?php
namespace Flux\PageBundle\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\Translator;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\PageBundle\Model\PageInterface;
use Knp\Menu\ItemInterface as MenuItemInterface;

use Flux\PageBundle\Entity\Page;

class PageAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $listMapper
            //->addIdentifier('id')
            ->addIdentifier('code', null, array('label' => $translator->trans('page.code')))
            ->addIdentifier('title', null, array('label' => $translator->trans('page.title')))
            ->add('image1', null, array('label' => $translator->trans('page.image1')))
            ->add('position', null, array('label' => $translator->trans('page.position')))
            ->add('is_active', 'boolean', array('label' => $translator->trans('page.active')))
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
        $datagridMapper
            ->add('title', null, array('label' => 'Título'))
            ->add('isActive', null, array('label' => 'Activa'))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('code', 'text', array('label' => 'Código', 'read_only' => true))
            ->add('title', 'text', array('label' => 'Título'))
            ->add('subtitle', 'text', array('label' => 'Subtítulo', 'required' => false))
            ->add('summary', 'text', array('label' => 'Resumen', 'required' => false))
            ->add('text1', 'textarea', array('label' => 'Texto 1', 'required' => false))
            ->add('text2', 'textarea', array('label' => 'Texto 2', 'required' => false))
            ->add('translations', 'a2lix_translations', array(
                'label' => ' ',
                'fields' => array(
                    'title' => array('label' => 'Título'),
                    'subtitle' => array('label' => 'Subtítulo'),
                    'summary' => array('label' => 'Resumen'),
                    'text1' => array('label' => 'Texto 1'),
                    'text2' => array('label' => 'Texto 2')
            )))
            ->add('image1File', 'file', array('label' => 'Subir imagen 1', 'required' => false))
            ->add('image1', null, array('label' => 'Imagen 1', 'required' => false, 'read_only' => true))
            ->add('image2File', 'file', array('label' => 'Subir imagen 2', 'required' => false))
            ->add('image2', null, array('label' => 'Imagen 2', 'required' => false, 'read_only' => true))
            ->add('image3File', 'file', array('label' => 'Subir imagen 3', 'required' => false))
            ->add('image3', null, array('label' => 'Imagen 3', 'required' => false, 'read_only' => true))
            ->add('position', 'integer', array('label' => 'Posición'))
            ->add('is_active', 'checkbox', array('label' => 'Activa', 'required' => false))
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
}
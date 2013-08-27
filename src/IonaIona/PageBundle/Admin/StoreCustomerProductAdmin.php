<?php
namespace IonaIona\PageBundle\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\Translator;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class StoreCustomerProductAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('created', 'datetime', array('label' => 'Data compra'))
            ->add('store_customer', null, array('label' => 'Client'))
            ->add('product', null, array('label' => 'Producte'))
            ->add('price', null, array('label' => 'Import'))
            // add custom action links
            ->add('_action', 'actions', array(
                'actions' => array(
                    //'view' => array(),
                    //'edit' => array(),
                    //'show' => array(),
                ),
                'label' => 'Accions'
            ))
        ;
    }

    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC', // sort direction
        '_sort_by' => 'created' // field name
    );

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        /*$locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $datagridMapper
            ->add('title', null, array('label' => $translator->trans('page.title')))
            ->add('isActive', null, array('label' => $translator->trans('page.active')))
        ;*/
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $formMapper
            ->add('created', 'datetime', array('label' => 'Data compra', 'read_only' => true))
            //->add('updated', 'datetime', array('label' => 'Date modificació', 'read_only' => true))
            ->add('price', null, array('label' => 'Preu', 'read_only' => true))
            ->add('product', null, array('label' => 'Producte', 'read_only' => true))
            ->add('storeCustomer', null, array('label' => 'Client'))
            // help messages like this
            /*->setHelps(array(
               'title' => $this->trans('help_post_title')
            ))*/
            ;
    }

    protected function configureShowField(ShowMapper $showMapper)
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
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
        $collection->remove('delete');
    }
}
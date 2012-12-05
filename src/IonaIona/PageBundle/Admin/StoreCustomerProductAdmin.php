<?php
namespace IonaIona\PageBundle\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\Translator;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
//use Sonata\PageBundle\Model\PageInterface;
use Knp\Menu\ItemInterface as MenuItemInterface;

use IonaIona\PageBundle\Entity\StoreCustomer;

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
            ->add('created', 'datetime', array('label' => 'Data alta', 'read_only' => true))
            ->add('updated', 'datetime', array('label' => 'Date modificació', 'read_only' => true))
            ->add('email', 'text', array('label' => 'Email', 'read_only' => true))
            ->add('name', 'text', array('label' => 'Nom i cognoms'))
            ->add('address', 'text', array('label' => 'Adreça'))
            ->add('postalCode', 'text', array('label' => 'Codi postal'))
            ->add('city', 'text', array('label' => 'Població'))
            ->add('state', 'text', array('label' => 'Provínicia'))
            ->add('phone', 'text', array('label' => 'Telèfon'))
            ->add('wantNewsletter', 'checkbox', array('label' => 'Vol rebre newsletter', 'required' => false))
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
<?php
namespace Flux\ProductBundle\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\Translator;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\PageBundle\Model\PageInterface;
use Knp\Menu\ItemInterface as MenuItemInterface;

use Flux\ProductBundle\Entity\Product;

class ProductAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $listMapper
            //->addIdentifier('id')
            ->addIdentifier('code', null, array('label' => $translator->trans('page.code')))
            ->addIdentifier('name', null, array('label' => $translator->trans('page.name')))
            ->add('category', null, array('label' => $translator->trans('page.category')))
            ->add('image1', null, array('label' => $translator->trans('page.image1')))
            ->add('price', null, array('label' => $translator->trans('page.price')))
            ->add('stock', null, array('label' => $translator->trans('page.stock')))
            //->add('gender', null, array('label' => $translator->trans('page.gender')))
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
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $datagridMapper
            ->add('name', null, array('label' => $translator->trans('page.name')))
            ->add('isActive', null, array('label' => $translator->trans('page.active')))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $formMapper
            ->add('category','sonata_type_model', array('label' => $translator->trans('page.category')), array())
            ->add('code', 'text', array('label' => $translator->trans('page.code')))
            ->add('name', 'text', array('label' => $translator->trans('page.name')))
            ->add('birth', 'text', array('label' => $translator->trans('page.birth'), 'required' => false))
            ->add('dimensions', 'text', array('label' => $translator->trans('page.dimensions'), 'required' => false))
            ->add('specifications', 'text', array('label' => $translator->trans('page.specifications'), 'required' => false))
            ->add('translations', 'a2lix_translations', array(
                'label' => ' ',
                'fields' => array(
                    'name' => array('label' => $translator->trans('page.name')),
                    'birth' => array('label' => $translator->trans('page.birth')),
                    'dimensions' => array('label' => $translator->trans('page.dimensions')),
                    'specifications' => array('label' => $translator->trans('page.specifications')),
            )))
            ->add('image1File', 'file', array('label' => $translator->trans('page.upload.image1'), 'required' => false))
            ->add('image1', null, array('label' => $translator->trans('page.image1'), 'required' => false, 'read_only' => true))
            // TRY TO PRINT PREVIEW ->add('img1', 'sonata_type_model', array('property_path' => false, 'label' => 'im1', 'required' => false, 'template' => 'FluxPageBundle:Default:img.html.twig'))
            ->add('image2File', 'file', array('label' => $translator->trans('page.upload.image2'), 'required' => false))
            ->add('image2', null, array('label' => $translator->trans('page.image2'), 'required' => false, 'read_only' => true))
            ->add('weight', 'integer', array('label' => $translator->trans('page.weight'), 'required' => false))
            ->add('fabrics', 'integer', array('label' => $translator->trans('page.fabrics'), 'required' => false))
            ->add('price', null, array('label' => $translator->trans('page.price')))
            ->add('stock', null, array('label' => $translator->trans('page.stock')))
            //->add('urlPinterestPin', null, array('label' => $translator->trans('page.pinterest.pin')))
            //->add('urlPinterestPinboard', null, array('label' => $translator->trans('page.pinterest.pinboard')))
            //->add('urlFacebookPhoto', null, array('label' => $translator->trans('page.facebook.photo')))
            //->add('urlFacebookAlbum', null, array('label' => $translator->trans('page.facebook.album')))
            ->add('gender', 'choice', array('label' => $translator->trans('page.gender'), 'choices' => array(0 => $translator->trans('page.gender.male'), 1 => $translator->trans('page.gender.female'))))
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
}
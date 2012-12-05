<?php
namespace IonaIona\PageBundle\Form;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Store extends AbstractType
{
    public function getName()
    {
        return 'ionaiona_pagebundle_store';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IonaIona\PageBundle\Entity\StoreCustomer',
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$locale = $this->getRequest()->get('locale');
        //$translator = new Translator($locale);
        $builder
            ->add('name', null, array('required' => true))
            ->add('address', null, array('required' => true))
            ->add('postalCode', null, array('required' => true))
            ->add('city', null, array('required' => true))
            ->add('state', null, array('required' => true))
            ->add('email', null, array('required' => true))
            ->add('phone', null, array('required' => true))
            ->add('mensaje', 'textarea', array('mapped' => false, 'required' => false))
            ->add('wantNewsletter', null, array('required' => false))
        ;
    }
}
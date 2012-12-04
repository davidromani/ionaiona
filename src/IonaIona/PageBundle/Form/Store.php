<?php
namespace IonaIona\PageBundle\Form;

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
        $builder
            ->add('name', null, array('label' => 'Nombre', 'required' => true))
            ->add('address', null, array('label' => 'Dirección', 'required' => true))
            ->add('postalCode', null, array('label' => 'Código postal', 'required' => true))
            ->add('city', null, array('label' => 'Ciudad', 'required' => true))
            ->add('email', null, array('label' => 'Email', 'required' => true))
            ->add('phone', null, array('label' => 'Teléfono', 'required' => true))
            ->add('mensaje', 'textarea', array('label' => 'Comentario', 'mapped' => false, 'required' => false))
            ->add('wantNewsletter', null, array('label' => '', 'required' => false))
        ;
    }
}
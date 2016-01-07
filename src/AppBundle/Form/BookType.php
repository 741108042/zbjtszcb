<?php

namespace AppBundle\Form;
use AppBundle\Form\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BookType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        $builder
            ->add('title','text',array('label'=>'书籍名称'))
            ->add('author','text',array('label'=>'作者'))
            ->add('coverfile','file',array('required' => false, 'label'=>'书籍封面'))
             ->add('link','text',array('label'=>'书籍地址'))
             ->add('cover','text',array('label'=>'封面地址'))

            ->add('intro','textarea',array('label'=>'小说介绍'))
            ->add('category',null,array('label'=>'书籍归类'))
                        ->add('sortid','text',array('label'=>'排序'))

                        ->add('updated','hidden')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Book'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_book';
    }
}

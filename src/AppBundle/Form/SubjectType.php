<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SubjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('topicId','hidden')
            ->add('title','text',array('label'=>'新闻标题'))
            ->add('source','text',array('label'=>'新闻来源'))
            ->add('author','text',array('label'=>'新闻作者'))
            ->add('picids','hidden')
            ->add('intro','textarea',array('label'=>'新闻内容','attr'=>array('style'=>'width:100%;height:150px')))
             ->add('saveAndContinue', 'submit', array('label' => '保存并继续添加'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Subject'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_subject';
    }
}

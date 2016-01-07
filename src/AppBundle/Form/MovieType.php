<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MovieType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('title')
            ->add('keywords')
            ->add('length')
            ->add('englishtitle')
            ->add('cover')
            ->add('cdnCover')
            ->add('tags')
            ->add('pubdate')
            ->add('firstpubdate')
            ->add('kind')
            ->add('language')
            ->add('country')
            ->add('director')
            ->add('writer')
            ->add('actor')
            ->add('intro','textarea')
            ->add('score')
            ->add('hits')
            ->add('imdb')
            ->add('created')
            ->add('updated')
            ->add('status')
            ->add('coming')
            ->add('playing')
            ->add('hot')
            ->add('crapimg')
            ->add('scheduled')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Movie'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_movie';
    }
}

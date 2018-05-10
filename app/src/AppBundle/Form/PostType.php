<?php
namespace AppBundle\Form;

use AppBundle\Entity\Post;
use AppBundle\Form\Type\TagsInputType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'Title',
            ])
            ->add('slug', TextType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'Url slug',
            ])
            ->add('text', TextareaType::class, [
                'label' => 'Text',
                'required' => false,
            ])
            ->add('tags', TagsInputType::class, [
                'label' => 'Tags',
                'required' => false,
                'attr' =>  [
                    'data-role' => 'tagsinput',
                ]
            ])
            ->add('date', DateTimeType::class, array(
                'placeholder' => 'Date',
            ))
            ->add('isActive', CheckboxType::class, array(
                'label'    => 'Show this post publicly?',
                'required' => false,
            ))
            ->add('viewsCount', TextType::class, [
                'label' => 'Post views',
                'disabled' => true
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}

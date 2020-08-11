<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderImportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('json', Type\TextareaType::class, [
                'attr' => [
                    'rows' => 10,
                    'cols' => 80,
                ],
            ])
            ->add('amazon', Type\SubmitType::class,[
                'label' => 'Import from Amazon',
            ])
            ->add('etsy', Type\SubmitType::class, [
                'label' => 'Import from Etsy',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

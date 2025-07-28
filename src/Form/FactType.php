<?php

namespace App\Form;

use App\Entity\Fact;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('label', null, [
                'label' => 'Überschrift',
                'attr' => ['placeholder' => 'Kurzer Titel'],
                'required' => true,
            ])
            ->add('body', null, [
                'label' => 'Fakt',
                'attr' => ['placeholder' => 'Dein Fakt hier'],
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fact::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\ElectronicCategory;
use App\Entity\Manufacturer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function Symfony\Component\Translation\t;

class ManufacturerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('country', EntityType::class,[
                'class' => Country::class,
                'choice_label' => 'title',
                'required' => true
            ])
            ->add('electronicCategories', EntityType::class,[
                'class' => ElectronicCategory::class,
                'choice_label' => 'titleEng',
                'required' => true,
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Manufacturer::class,
        ]);
    }
}

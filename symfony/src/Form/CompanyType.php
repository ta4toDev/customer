<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('companyName', TextType::class, [
                'label' => 'Company Name',
            ])
            ->add('street', TextType::class, [
                'label' => 'Street',
            ])
            ->add('house_number', TextType::class, [
                'label' => 'House Number',
            ])
            ->add('city', TextType::class, [
                'label' => 'City',
            ])
            ->add('postal_code', TextType::class, [
                'label' => 'Postal Code',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('companyName', TextType::class, [
                'label' => 'Company Name',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Company Name is required.']),
                    new Assert\Length(['min' => 2, 'max' => 30, 'minMessage' => 'Company Name is too short.', 'maxMessage'=> 'Company Name is too long.']),
                ]
            ])
            ->add('street', TextType::class, [
                'label' => 'Street',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Street is required.']),
                    new Assert\Length(['max' => 30, 'maxMessage'=> 'Street is too long.']),
                ]
            ])
            ->add('house_number', TextType::class, [
                'label' => 'House Number',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'House Number is required.']),
                    new Assert\Length(['max' => 10, 'maxMessage'=> 'House Number is too long.']),
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'City',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'City is required.']),
                    new Assert\Length(['max' => 30, 'maxMessage'=> 'City is too long.']),
                ]
            ])
            ->add('postal_code', TextType::class, [
                'label' => 'Postal Code',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Postal Code is required.']),
                    new Assert\Length(['max' => 10, 'maxMessage'=> 'Postal Code is too long.']),
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}

<?php
namespace App\Form;

use App\Entity\Contact;
use App\Entity\Company;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) :void
    {
        $builder
            ->add('salutation', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Salutation should not be blank']),
                    new Assert\Length(['max' => 10, 'maxMessage' => 'salutation should not be longer than 10 characters']),
                ]
            ])
            ->add('firstName', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Firstname should not be blank']),
                    new Assert\Length(['max' => 30, 'maxMessage' => 'firstname should not be longer than 30 characters']),
                ]
            ])
            ->add('lastName', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Lastname should not be blank']),
                    new Assert\Length(['max' => 30, 'maxMessage' => 'lastname should not be longer than 30 characters']),
                ]
            ])
            ->add('street', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Street should not be blank']),
                    new Assert\Length(['max' => 30, 'maxMessage' => 'street should not be longer than 30 characters']),
                ]])
            ->add('houseNumber', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'House number should not be blank']),
                    new Assert\Length(['max' => 10, 'maxMessage' => 'house number should not be longer than 10 characters']),
                 ]])
            ->add('city', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'City should not be blank']),
                    new Assert\Length(['max' => 30, 'maxMessage' => 'city should not be longer than 30 characters']),
                ]
            ])
            ->add('postalCode', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Postal code should not be blank']),
                    new Assert\Length(['max' => 10, 'maxMessage' => 'postal code should not be longer than 10 characters']),
                ]
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Email should not be blank']),
                    new Assert\Email(['message' => 'Email should not be valid']),
                ]
            ])
            ->add('company', EntityType::class, [
                'class' => Company::class,
                'choice_label' => 'companyName',
                'required' => false,
                'placeholder' => 'Select a Company',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Company should not be blank']),
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver) :void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}

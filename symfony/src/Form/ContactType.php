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

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) :void
    {
        $builder
            ->add('salutation', TextType::class)
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('street', TextType::class)
            ->add('houseNumber', TextType::class)
            ->add('city', TextType::class)
            ->add('postalCode', TextType::class)
            ->add('email', EmailType::class)
            ->add('company', EntityType::class, [
                'class' => Company::class,
                'choice_label' => 'companyName',
                'required' => false,
                'placeholder' => 'Select a Company'
            ])
            ->add('save', SubmitType::class, ['label' => 'Create Contact',
                'attr' => ['class' => 'btn-success']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver) :void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}

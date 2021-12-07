<?php

namespace App\Form;

use App\Entity\Consultation;
use App\Entity\Paiement;
use App\Entity\Patient;
use App\Entity\ProfessionnelDeSante;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ConsultationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeConsultation')
            ->add('motifConsultation')
            ->add('tarifConsultation')
            ->add('leProfessionnel', EntityType::class, array(  
                'class'=>ProfessionnelDeSante::class,
                'choice_label' =>'nom',
                'multiple'=>false ))
            
            ->add('lePatient', EntityType::class, array(  
                'class'=>Patient::class,
                'choice_label' =>'nom',
                'multiple'=>false ))
            ->add('leMoyenPaiement', EntityType::class, array(  
                'class'=>Paiement::class,
                'choice_label' =>'libellePaiement',
                'multiple'=>false ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Consultation::class,
        ]);
    }
}

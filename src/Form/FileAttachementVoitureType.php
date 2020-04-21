<?php

namespace App\Form;

use App\Entity\FileAttachementVoiture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class FileAttachementVoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('name')
            ->add('imageFile', VichFileType::class)
//            ->add('creatAt')
//            ->add('updateAt')
//            ->add('descriptif')
//            ->add('voiture')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FileAttachementVoiture::class,
        ]);
    }
}

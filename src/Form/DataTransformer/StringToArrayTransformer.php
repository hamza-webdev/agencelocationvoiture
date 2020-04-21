<?php


namespace App\Form\DataTransformer;

use App\Entity\OptionsVoiture;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;


class StringToArrayTransformer implements DataTransformerInterface{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function transform($value)
    {
       return implode(', ', $value);
    }

    public function reverseTransform($value)
    {
        $names = array_unique(array_filter(array_map('trim', explode(',', $value)))) ;
        $optionsVoiture = $this->entityManager->getRepository(OptionsVoiture::class)->findBy([
            'name' => $names,
        ]);

        $newNames = array_diff($names, $optionsVoiture);
        $options = array();
        if($newNames){
            foreach ($newNames as $name){
                $option = new OptionsVoiture();
                $option->setName($name);
                $options[] = $option;
            }
        }
        return $options;

    }

}

<?php

namespace App\Form;

use App\Entity\Comment;
use App\Entity\User;
use Doctrine\ORM\Mapping\EntityResult;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $this->security->getUser();
       
        $builder
            ->add('comment')
            ->add('rate')
            ->add('episode', EpisodeType::class)
            ->add('author', User::class);
    
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}

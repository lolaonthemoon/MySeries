<?php

namespace App\DataFixtures;


use App\Entity\User ;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture

{
    const USERS = [        
        'laurence' => [
            'lastName' => 'Islost',
            'password' => 'toto', 
            'email' => 'laurence.test@test.com',
            'role' => ['ROLE_ADMIN']
        ],
        'marie' => [
            'lastName' => 'Tudor',
            'password' => 'tata', 
            'email'=> 'marie.test@test.com',
            'role' => ['ROLE_CONTRIBUTOR'],
        ],
    ];

    
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
      
        $i=0;
        foreach (self::USERS as $name => $data) {
            $user = new User();
            $user ->setFirstName ($name);
            $user ->setLastName($data['lastName']);
            $user ->setEmail($data['email']);
            $user ->setRoles($data['role']);
            $user -> setPassword($this->passwordEncoder->encodePassword($user,$data['password']));
            $manager->persist($user);
            $i++;
        }
        
        $manager->persist($user);
        $manager->flush();
    }
}

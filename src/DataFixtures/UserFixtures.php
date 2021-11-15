<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\UserPassewordEncoderInterface;
use App\Entity\User;
use DateTime;

class UserFixtures extends Fixture
{
    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('rtacon.ledantec@gmail.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->passwordHasher->hashPassword($user,'123456'));
        $user->setNom('Tacon');
        $user->setPrenom('Romain');
        $user->setsexe('M');
        $date= new \DateTime('02/11/1999');
        $user->setDateNaissance($date);
        $user->setNumeroTelephone('0202020202');

        $manager->persist($user);
        $manager->flush();

    }
}

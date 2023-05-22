<?php

namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class CustomUserProvider implements UserProviderInterface, UserLoaderInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function loadUserByUsername($username): UserInterface
    {
        $userRepository = $this->entityManager->getRepository(User::class);
        $user = $userRepository->findOneBy(['username' => $username]);

        if (!$user) {
            throw new UsernameNotFoundException();
        }

        return $user;
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        // Refresh the user entity
        // ...

        return $user;
    }

    public function supportsClass($class): bool
    {
        return User::class === $class;
    }
}


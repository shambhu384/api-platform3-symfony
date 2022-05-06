<?php

declare(strict_types=1);

namespace App\Provider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Repository\UserRepository;

final class CheapestBooksProvider implements ProviderInterface
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    /**
     * @return list<User>
     */
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        if (!$operation instanceof CollectionOperationInterface) {
            return $this->userRepository->findOneBy(['id' => $uriVariables['id']]);
        }
        return $this->userRepository->findOneBy(['id' => $uriVariables['id']]);

    }
}

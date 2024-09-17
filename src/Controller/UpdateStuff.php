<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Stuff;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
final readonly class UpdateStuff
{
    public function __construct(
        private EntityManagerInterface $entityManager
    )
    {
    }

    #[Route('/update-stuff/{id}', name: 'update_stuff')]
    public function __invoke(Stuff $stuff): JsonResponse
    {
        $stuff->setName('Updated Name');
        $stuff->setDescription('Updated Description');

        return new JsonResponse([
            'id' => $stuff->getId(),
            'name' => $stuff->getName(),
            'description' => $stuff->getDescription(),
        ]);
    }
}

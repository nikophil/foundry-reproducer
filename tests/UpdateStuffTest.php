<?php

declare(strict_types=1);

namespace App\Tests;

use App\Tests\Factory\StuffFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Zenstruck\Browser\Test\HasBrowser;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

final class UpdateStuffTest extends WebTestCase
{
    use ResetDatabase;
    use Factories;
    use HasBrowser;
    
    public function testUpdateStuff(): void
    {
        // Create a Stuff entity
        $stuff = StuffFactory::createOne();

        // Update the Stuff entity
        $this->browser()
            ->get('/update-stuff/' . $stuff->getId())
            ->assertStatus(200);

        self::assertSame('Updated Name', $stuff->getName());
    }
}

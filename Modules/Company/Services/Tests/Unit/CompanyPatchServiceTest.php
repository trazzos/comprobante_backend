<?php

namespace Modules\Company\Services\Tests\Unit;

use Modules\Branch\Models\Branch;
use Modules\Company\Models\Company;
use Modules\Company\Services\CompanyPatchService;
use Modules\User\Models\User;
use Tests\TestCase;
use App;
use Modules\Company\Repositories\Interfaces\CompanyRepositoryInterface;
use Mockery;

/**
 * Class CompanyDeleteServiceTest
 * @package Modules\Company\Services\Tests\Unit
 */
class CompanyPatchServiceTest extends TestCase {
    /**
     * @var mixed
     */
    private CompanyPatchService $companyPatchService;
    /**
     * @var CompanyRepositoryInterface
     */
    private CompanyRepositoryInterface $companyRepositoryInterface;

    /**
     * En el setup lo que hacemos es un mock de las instancias que son injectadas en el PHP
     * http://docs.mockery.io/en/latest/
     */
    public function setUp() : void {
        parent::setUp();

        $this->companyRepositoryInterface = Mockery::mock(CompanyRepositoryInterface::class);
        $this->app->instance(CompanyRepositoryInterface::class, $this->companyRepositoryInterface);

        $this->companyPatchService = App::make(CompanyPatchService::class);
    }

    /**
     * @return void
     */
    public function testPatch_success() : void {
        $user = factory(User::class)->states('unit')->make();
        $data = [
            'id' => $user->id,
            'name' => $this->faker->name
        ];

        $company = factory(Company::class)->states('unit')->make();
        $this->companyRepositoryInterface->shouldReceive('updateAndReturn')
            ->once()
            ->with($data, $data['id'])
            ->andReturn($company);

        $branch = factory(Branch::class)->states('unit')->make();
        //TODO problema de lazy eager load
        //$company->setRelation('branch', $branch);

        $result = $this->companyPatchService->update($user, $data);

        $this->assertInstanceOf(Company::class, $result);
    }
}

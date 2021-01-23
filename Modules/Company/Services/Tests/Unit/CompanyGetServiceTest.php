<?php

namespace Modules\Company\Services\Tests\Unit;

use App\Exceptions\NotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Company\Services\CompanyGetService;
use Tests\TestCase;
use App;
use Modules\Company\Repositories\Interfaces\CompanyRepositoryInterface;
use Mockery;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CompanyGetServiceTest
 * @package Modules\Company\Services\Tests\Unit
 */
class CompanyGetServiceTest extends TestCase {
    /**
     * @var CompanyGetService
     */
    private CompanyGetService $companyGetService;
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

        $this->companyGetService = App::make(CompanyGetService::class);
    }

    /**
     * @return void
     * El metodo debe de empezar con test
     */
    public function testList_throwsNotFound() : void {
        $data = [
            'per_page' => $this->faker->numberBetween(2, 20)
        ];

        //Al retornar null hacemos que se ejecute la exepcion
        $this->companyRepositoryInterface->shouldReceive('paginate')
            ->once()
            ->with($data['per_page'])
            ->andReturn(null);

        $this->companyRepositoryInterface->shouldReceive('resetRepository')
            ->once();

        //Aqui la diferencia es que el expectException va ANTES de llamar al metodo
        $this->expectException(NotFoundException::class);
        $this->companyGetService->list($data);
    }

    /**
     * @return void
     */
    public function testList_success() : void {
        $data = [
            'per_page' => $this->faker->numberBetween(2, 20)
        ];

        //Hay dos tipos de colecciones en laravel. Eloquent y Support. En este caso queremos usar
        //La de eloquent porque en el servicio estamos haciendo un eager load y el metodo load()  no existe en la
        //collecion de soporte. Entonces no puedes usar collect().
        //En la mayoria de los casos es mejor usar collect()
        $c = new Collection;
        $paginator = new LengthAwarePaginator($c, 1, 1, 1);

        //En la clase abstracta se manda a llamar list que hace una llamada $this->repo->paginate
        //esto le esta diciendo que companyRepositoryInterface debe recibir un metodo llamado paginate una vez (once)
        //con estos parametros (with) y debe retornar este valor (andReturn)
        $this->companyRepositoryInterface->shouldReceive('paginate')
            ->once()
            ->with($data['per_page'])
            ->andReturn($paginator);

        //Aqui hacemos lo mismo pero si te fijas este no recibe nada ni retorna nada
        $this->companyRepositoryInterface->shouldReceive('resetRepository')
            ->once();

        //Mandamos a llamar al metodo que estemos probando
        $result = $this->companyGetService->list($data);

        //Asemos aserciones sobre los datos retornados. Generalmente solo debemos hacer una o dos aserciones.
        //Aqui lo hacemos sobre el valor devuelto y como sabemos que estamos "moqueando" la coleccion y la coleccion
        //sera vacia pues asertamos que sea el resultado sea vacio
        $this->assertInstanceOf(LengthAwarePaginator::class, $result);
        $this->assertEmpty($result);

    }
}

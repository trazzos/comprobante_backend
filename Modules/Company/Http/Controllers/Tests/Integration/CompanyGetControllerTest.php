<?php
namespace Modules\Company\Http\Controllers\Test\Integration;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\User\Models\User;
use Tests\TestCase;
use Illuminate\Http\Response;

class CompanyGetControllerTest extends TestCase {
    //Importante usar este ya que inserta en la base pero al final los borra.
    use DatabaseTransactions;

    //Los tests de integracion son mas sencillos ya que simplemente llamamos al route y vemos que
    //no falle...es mas bien un test de funcionalidad
    public function testSuccess() {
        //Los tests de integration usan create...los de unit usan make
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this
            ->json('GET', route('company.get', [
            ]), [
                'page' => 1,
                'per_page' => 10,
            ]);

        //Generalmente lo unico que queremos en un integration test es checar que nos regrese el
        //tipo de response correcto de HTTP (en delete seria 204 por ejemplo
        $response->assertStatus(Response::HTTP_OK);
    }
}

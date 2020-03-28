<?php

namespace Modules\Company\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Company\Models\Company;
use Modules\Company\Repositories\Interfaces\CompanyRepositoryInterface;
use ThrowException;
use Filter;
use Sort;

/**
 * Class CompanyGetService
 * @package Modules\Company\Services
 */
class CompanyGetService {
    /**
     * @var CompanyRepositoryInterface
     */
    private $companyRepo;

    /**
     * CompanyGetService constructor.
     * @param CompanyRepositoryInterface $companyRepo
     */
    public function __construct(CompanyRepositoryInterface $companyRepo) {
        $this->companyRepo = $companyRepo;
    }

    /**
     * @param $id
     * @return Company|null
    * At this point everything is validated, we shouldn't check anything else
     */
    public function info($id) : ?Company {
        $company = $this->companyRepo->findBy('id', $id);

        if(!$company) {
            ThrowException::notFound();
        }

        return $company;
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator|null
     */
    public function list(array $data) : ?LengthAwarePaginator {
        //Para aplicar filtros, hay que llamar a esta funcion, por ejemplo para company seria $this->companyRepo
        //Lo demas quedaria igual
        if(isset($data['predicates'])) {
            Filter::apply(__NAMESPACE__, $this->companyRepo, $data['predicates']);
        }

        if(isset($data['sorts'])) {
            Sort::apply(__NAMESPACE__, $this->companyRepo, $data['sorts']);
        }
        //Notese como no se necesita pasar el parametro de "page" aqui. Ya laravel lo toma en cuenta internamente
        //por ejemplo
        //http://obras.test/api/user?page=1
        //http://obras.test/api/user?page=3
        $companies = $this->companyRepo->paginate($data['per_page']);
        $this->companyRepo->resetRepository(); //Limpiar los criterios SIEMPRE

        return $companies;
    }
}

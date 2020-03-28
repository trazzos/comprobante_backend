<?php

namespace Modules\Project\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Project\Repositories\Interfaces\ProjectRepositoryInterface;
use ThrowException;
use Filter;
use Sort;

/**
 * Class ProjectGetService
 * @package Modules\Project\Services
 */
class ProjectGetService {
    /**
     * @var ProjectRepositoryInterface
     */
    private $projectRepo;

    /**
     * ProjectGetService constructor.
     * @param ProjectRepositoryInterface $projectRepo
     */
    public function __construct(ProjectRepositoryInterface $projectRepo) {
        $this->projectRepo = $projectRepo;
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator|null
     */
    public function list(array $data) : ?LengthAwarePaginator {
        //Por favor para sus tareas borren estos comentarios, solo son de ejemplo
        //Para aplicar filtros, hay que llamar a esta funcion, por ejemplo para company seria $this->companyRepo
        //Lo demas quedaria igual
        if(isset($data['predicates'])) {
            Filter::apply(__NAMESPACE__, $this->projectRepo, $data['predicates']);
        }

        if(isset($data['sorts'])) {
            Sort::apply(__NAMESPACE__, $this->projectRepo, $data['sorts']);
        }

        //Notese como no se necesita pasar el parametro de "page" aqui. Ya laravel lo toma en cuenta internamente
        //por ejemplo
        //http://obras.test/api/project?page=1
        //http://obras.test/api/project?page=3
        $projects = $this->projectRepo->paginate($data['per_page']);
        $this->projectRepo->resetRepository(); //Limpiar los criterios SIEMPRE

        if(!$projects) {
            ThrowException::notFound();
        }

        return $projects;
    }
}

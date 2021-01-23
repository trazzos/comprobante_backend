<?php

namespace Modules\User\Services;

use Auth;
use Event;
use Exception;
use Illuminate\Auth\Events\Registered;
use Modules\Company\Repositories\Interfaces\CompanyRepositoryInterface;
use Modules\Branch\Repositories\Interfaces\BranchRepositoryInterface;
use Modules\User\Models\User;
use Modules\Company\Models\Company;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;
use JWTAuth;

/**
 * Class CompanyPostService
 * @package Modules\Company\Services
 */
class AuthRegisterService  {
    /*
     * @var CompanyRepositoryInterface $companyRepo
     */
    private CompanyRepositoryInterface $companyRepo;

    /*
     * @var BranchRepositoryInterface $branchRepo
     */
    private BranchRepositoryInterface $branchRepo;

    /*
     * @var UserRepositoryInterface $userRepo
     */
    private UserRepositoryInterface $userRepo;
    /**
     * AuthRegisterService constructor.
     * @param CompanyRepositoryInterface $companyRepo
     * @param BranchRepositoryInterface $branchRepo
     * @param UserRepositoryInterface $userRepo
     */
    public function __construct(CompanyRepositoryInterface $companyRepo, BranchRepositoryInterface $branchRepo, UserRepositoryInterface $userRepo) {
        $this->companyRepo = $companyRepo;
        $this->branchRepo = $branchRepo;
        $this->userRepo = $userRepo;
    }

    /*
     *
     * @param array $data
     * @return string|false
     */
    public function register(array $data) {

        $dataCompany =$this->normalizeDataCompany($data);
        $company =  $this->companyRepo->create($dataCompany);

        $dataBranch =$this->normalizeDataBranch($company, $data);
        $this->branchRepo->create($dataBranch);

        $dataUser =$this->normalizeDataUser($company, $data);
        $user = $this->userRepo->create($dataUser);

        Event::dispatch(new Registered($user));

        return JWTAuth::fromUser($user);
    }

    /*
     * @param array $data
     * @return array;
     */
    private function normalizeDataCompany(array $data) :array {
        $remove = ['zip_code', 'email', 'password'];
        return array_diff_key($data, array_flip($remove));
    }

    /*
    * @param Company $company
    * @param array $data
    * @return array;
    */
    private function normalizeDataBranch(Company $company, array $data) :array {
        $remove = ['email', 'password', 'taxpayer_id'];
        $data = array_diff_key($data, array_flip($remove));
        $extra = [
            'company_id' => $company->id,
            'name' => 'matriz',
            'user_id' => null,
        ];
        return array_merge($data, $extra);
    }

    /*
    * @param Company $company
    * @param array $data
    * @return array;
    */
    private function normalizeDataUser(Company $company, array $data) :array {
        $remove = ['taxpayer_id', 'zip_code'];
        $data = array_diff_key($data, array_flip($remove));
        $extra = [
            'company_id' => $company->id,
            'role' => User::ROLE_USER,
            'user_id' => null,
        ];
        return array_merge($data, $extra);
    }

}

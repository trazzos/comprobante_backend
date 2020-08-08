<?php

namespace Modules\User\Services;

use Auth;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Modules\Company\Repositories\Interfaces\CompanyRepositoryInterface;
use Modules\Branch\Repositories\Interfaces\BranchRepositoryInterface;
use Modules\User\Models\User;
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
        try {
              DB::beginTransaction();
              $company =  $this->companyRepo->create($data);

              $extraDataBranch = [
                  'company_id' => $company->id,
                  'name' => 'matriz',
                  'user_id' => null,
              ];
              $branchData = array_merge($data, $extraDataBranch);
              $this->branchRepo->create($branchData);

              $extraDataUser = [
                  'company_id' => $company->id,
                  'role' => User::ROLE_USER,
                  'user_id' => null,
              ];
              $userData = array_merge($data, $extraDataUser);
              $user = $this->userRepo->create($userData);

        } catch (\Exception $e){
            DB::rollback();
            throw  $e;
        }
        DB::commit();

        try {
            event(new Registered($user));
        } catch(Exception $e) { }

        return JWTAuth::fromUser($user);
    }

}

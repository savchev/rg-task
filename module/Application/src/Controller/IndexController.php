<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Service\Repository\UserRepository;
use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * IndexController constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function indexAction()
    {
        return [
            'users' => $this->repository->getAll()
        ];
    }
}

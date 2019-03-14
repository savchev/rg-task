<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Service\Repository\RepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    /**
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * IndexController constructor.
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function indexAction()
    {
        try {
            $users = $this->repository->getAll();
            $error = null;
        } catch (\Exception $e) {
            $users = [];
            $error = $e;
        }
        return [
            'users' => $users,
            'error' => $error,
        ];
    }
}

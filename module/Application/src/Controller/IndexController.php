<?php

namespace Application\Controller;

use Application\Service\Repository\RepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class IndexController
 *
 * @package Application\Controller
 */
class IndexController extends AbstractActionController
{
    /**
     * The users repository
     *
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * IndexController constructor.
     *
     * @param RepositoryInterface $repository The users repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Action method for index page
     *
     * @return array The view model with users and error (both params can be empty)
     */
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

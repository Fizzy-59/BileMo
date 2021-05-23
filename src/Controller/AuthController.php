<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends AbstractController
{
    /** @var UserRepository $userRepository */
    private $userRepository;

    /**
     * AuthController Constructor
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Register new user
     * @param Request $request
     *
     * @return Response
     */
    public function register(Request $request): Response
    {
        $newUserData['email'] = $request->get('email');
        $newUserData['password'] = $request->get('password');

        $user = $this->userRepository->createNewUser($newUserData);

        return new Response(sprintf('User %s successfully created', $user->getUsername()));
    }
}

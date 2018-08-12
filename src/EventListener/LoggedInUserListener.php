<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class LoggedInUserListener
{
    private $router;
    private $authChecker;

    public function __construct(RouterInterface $router, AuthorizationCheckerInterface $authChecker)
    {
        $this->router       = $router;
        $this->authChecker  = $authChecker;
    }

    /**
     * Redirect user to homepage if tryes to access in anonymously path
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $path = $request->getPathInfo();
        if ($this->authChecker->isGranted('IS_AUTHENTICATED_REMEMBERED') && $this->isAnonymouslyPath($path)) {
            $response = new RedirectResponse($this->router->generate('dashboard'));
            $event->setResponse($response);
        }
    }

    /**
     * Check if $path is an anonymously path
     * @param string $path
     * @return bool
     */
    private function isAnonymouslyPath(string $path): bool
    {
        return preg_match('/\/login|\/register|\/resetting/', $path) ? true : false;
    }
}
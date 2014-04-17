<?php
/**
 * @author Aden Kejawen <surya.kejawen@gmail.com>
 *
 * This file is part of Aden Kejawen Bundle
 **/
namespace Aden\Kejawen\Bundle\Voter;

use \Symfony\Component\HttpFoundation\RequestStack;
use \Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;
use \Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use \Doctrine\ORM\EntityManager;

class UserPermissionVoter implements VoterInterface
{
    private $em;
    private $requestStack;

    public function __construct(EntityManager $em, RequestStack $requestStack)
    {
        $this->em = $em;
        $this->requestStack = $requestStack;
    }

    public function supportsAttribute($attribute)
    {
        return true;
    }

    public function supportsClass($class)
    {
        return true;
    }

    public function vote(TokenInterface $token, $object, array $attributes)
    {
        $result = VoterInterface::ACCESS_ABSTAIN;
        $user = $token->getUser();
        $request = $this->requestStack->getCurrentRequest();
        $route = $request->get('_route');
        $route = explode('_', $route);
        /**
         * example : AdenKejawenModulesProductBundle_Product_Index
         **/
        $module = $route[0];
        unset($this->requestStack, $request, $route);

        foreach ($attributes as $attribute) {
            $permission = substr($attribute, strrpos($attribute, '_') + 1);

            if ($this->em->getRepository('AdenKejawenBundle:Role')->isGranted($user, $module, $permission)) {

                return VoterInterface::ACCESS_GRANTED;
            }

            $result = VoterInterface::ACCESS_DENIED;
        }

        return $result;
    }
}

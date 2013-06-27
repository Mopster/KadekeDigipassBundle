<?php

namespace Kadeke\DigipassBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class DigipassController extends Controller {

    /**
     * @Route("/", name="KadekeDigipassBundle_index")
     * @return array
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $code = $request->get('code');
        $state = $request->get('state');
        $states = explode('-', $state);
        if ($states[0] == 'connect') {
            $user_id = $states[1];
            $user = $em->getRepository('KunstmaanAdminBundle:User')->find($user_id);
            $user->setDigipassUuid($code);
            $em->persist($user);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'User \''.$user->getUsername().'\' has been linked!');
            return new RedirectResponse($this->generateUrl('KunstmaanAdminBundle_settings_users'));
        } else if ($states[0] == 'login') {
            $user = $em->getRepository('KunstmaanAdminBundle:User')->findOneBy(array('digipass_uuid' => $code));
            $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
            $this->get('security.context')->setToken($token);
            return new RedirectResponse($this->generateUrl('KunstmaanAdminBundle_homepage'));
        }
        return array();
    }

}
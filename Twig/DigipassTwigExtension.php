<?php

namespace Kadeke\DigipassBundle\Twig;

use \Twig_Environment;
use \Twig_Extension;


class DigipassTwigExtension extends Twig_Extension {

    private $client_id;

    /**
     * @var Twig_Environment
     */
    protected $environment;

    public function __construct($client_id)
    {
        $this->client_id = $client_id;
    }

    /**
     * Initializes the runtime environment.
     *
     * This is where you can load some file that contains filter functions for instance.
     *
     * @param Twig_Environment $environment The current Twig_Environment instance
     */
    public function initRuntime(Twig_Environment $environment)
    {
        $this->environment = $environment;
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return array(
            'render_digipass_login'  => new \Twig_Function_Method($this, 'renderDigipassLogin', array('is_safe' => array('html'))),
            'render_digipass_connect'  => new \Twig_Function_Method($this, 'renderDigipassConnect', array('is_safe' => array('html'))),
            'render_digipass_script'  => new \Twig_Function_Method($this, 'renderDigipassScript', array('is_safe' => array('html')))
        );
    }

    public function renderDigipassLogin()
    {
        $template = $this->environment->loadTemplate('KadekeDigipassBundle:Default:login.html.twig');

        return $template->render(array(
            'client_id' => $this->client_id
        ));
    }

    public function renderDigipassConnect($user)
    {
        $template = $this->environment->loadTemplate('KadekeDigipassBundle:Default:connect.html.twig');

        return $template->render(array(
            'client_id' => $this->client_id,
            'user' => $user
        ));
    }

    public function renderDigipassScript()
    {
        $template = $this->environment->loadTemplate('KadekeDigipassBundle:Default:script.html.twig');

        return $template->render(array());
    }

    public function getName()
    {
        return "kadeke_digipass_twig_extension";
    }
}
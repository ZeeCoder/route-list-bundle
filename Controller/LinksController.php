<?php

namespace ZeeCoder\Bundle\RouteListBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Command\RouterDebugCommand;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\BufferedOutput;

class LinksController extends Controller
{
    /**
     * @Route("/links")
     * @Template()
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $command = new RouterDebugCommand();
        $command->setContainer($this->container);
        $input = new StringInput('');
        $output = new BufferedOutput();
        $resultCode = $command->run($input, $output);

        // Removing the first line og the output
        $route_list = preg_replace('/^.+\n/', '', $output->fetch());

        return array(
            'route_list' => $route_list,
            'allowed_hosts' => explode('|', $this->container->getParameter('zee_route_list.allowed_hosts')),
        );
    }
}

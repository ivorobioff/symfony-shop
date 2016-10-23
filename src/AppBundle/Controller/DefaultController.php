<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
    	return $this->render('AppBundle:default:index.html.twig');
    }

	/**
	 * @Route("/about", name="about")
	 */
    public function aboutAction()
	{
		return $this->render('AppBundle:default:about.html.twig');
	}

	/**
	 * @Route("/customer-service", name="customer_service")
	 */
	public function customerServiceAction()
	{
		return $this->render('AppBundle:default:customer-service.html.twig');
	}

	/**
	 * @Route("/order-and-returns", name="order_and_returns")
	 */
	public function orderAndReturnsAction()
	{
		return $this->render('AppBundle:default:order-and-returns.html.twig');
	}

	/**
	 * @Route("/privacy-and-cookie-policy", name="privacy_cookie")
	 */
	public function privacyAndCookiePolicyAction()
	{
		return $this->render('AppBundle:default:privacy-cookie.html.twig');
	}
}

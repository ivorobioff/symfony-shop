<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

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
	 * @Route("/orders-and-returns", name="orders_and_returns")
	 */
	public function ordersAndReturnsAction()
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

    /**
     * @Route("/contact-us", name="contact_us")
     * @param Request $request
     * @return Response
     */
	public function contactUsAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('name', TextType::class, [
                'constraints' => new NotBlank()
            ])
            ->add('email', EmailType::class, [
                'constraints' => new Email()
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Reach Out!',
                'attr' => ['class' => 'button']
            ])
            ->getForm();


        if ($request->isMethod('POST')){
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()){
                $this->addFlash('success', 'Your form has been submitted. Thank you!');

                $this->redirect($this->generateUrl('contact_us'));
            }
        }

        return $this->render('AppBundle:default:contact-us.html.twig', [
            'form' => $form->createView()
        ]);
    }
}

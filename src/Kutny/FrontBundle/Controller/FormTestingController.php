<?php

namespace Kutny\FrontBundle\Controller;

use Kutny\FormTest\InsertTestEntityFacade;
use Kutny\FormTest\TestEntity;
use Kutny\FormTest\TestPostForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @Route(service = "controller.form_testing_controller")
 */
class FormTestingController
{
    private $formFactory;
    private $insertTestEntityFacade;
    private $session;
    private $router;
    private $testPostForm;

    public function __construct(
        FormFactory $formFactory,
        InsertTestEntityFacade $insertTestEntityFacade,
        Session $session,
        Router $router,
        TestPostForm $testPostForm
    ) {
        $this->formFactory = $formFactory;
        $this->insertTestEntityFacade = $insertTestEntityFacade;
        $this->session = $session;
        $this->router = $router;
        $this->testPostForm = $testPostForm;
    }

    /**
     * @Route("/form-test2", name="route.form_test2")
     * @Template("KutnyFrontBundle:FormTesting:formTest2.html.twig")
     * @Method("GET")
     */
    public function formTest2Action()
    {
        $testEntity = new TestEntity();
        $form = $this->prepareForm($testEntity);

        return $this->prepareTemplateValues($form);
    }

    /**
     * @Route("/form-test2")
     * @Template("KutnyFrontBundle:FormTesting:formTest2.html.twig")
     * @Method("POST")
     */
    public function processFromTest2Action(Request $request)
    {
        $testEntity = new TestEntity();

        $form = $this->formFactory->create($this->testPostForm, $testEntity);
        $form->submit($request);

        if ($form->isValid()) {
            $this->insertTestEntityFacade->saveTestEntity($form->getData());

            $flashBag = $this->session->getFlashBag();
            $flashBag->add('notice', 'Your changes were saved!');

            return new RedirectResponse($this->router->generate('route.form_test2'), 301);
        } else {
            return $this->prepareTemplateValues($form);
        }
    }

    private function prepareForm(TestEntity $testEntity)
    {
        // set form default values
        $testEntity->setNote('some default note');
        $testEntity->setChooseItem(2);

        return $this->formFactory->create($this->testPostForm, $testEntity);
    }

    private function prepareTemplateValues(\Symfony\Component\Form\Form $form)
    {
        return array(
            'heading' => 'Ahoj formuláři<script>alert()</script>',
            'form' => $form->createView()
        );
    }

}

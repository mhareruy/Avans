<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bestelorder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bestelorder controller.
 *
 * @Route("bestelorder")
 */
class BestelorderController extends Controller
{
    /**
     * Lists all bestelorder entities.
     *
     * @Route("/", name="bestelorder_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bestelorders = $em->getRepository('AppBundle:Bestelorder')->findAll();

        return $this->render('bestelorder/index.html.twig', array(
            'bestelorders' => $bestelorders,
        ));
    }

    /**
     * Creates a new bestelorder entity.
     *
     * @Route("/new", name="bestelorder_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bestelorder = new Bestelorder();
        $form = $this->createForm('AppBundle\Form\BestelorderType', $bestelorder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bestelorder);
            $em->flush();

            return $this->redirectToRoute('bestelorder_show', array('id' => $bestelorder->getId()));
        }

        return $this->render('bestelorder/new.html.twig', array(
            'bestelorder' => $bestelorder,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bestelorder entity.
     *
     * @Route("/{id}", name="bestelorder_show")
     * @Method("GET")
     */
    public function showAction(Bestelorder $bestelorder)
    {
        $deleteForm = $this->createDeleteForm($bestelorder);

        return $this->render('bestelorder/show.html.twig', array(
            'bestelorder' => $bestelorder,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bestelorder entity.
     *
     * @Route("/{id}/edit", name="bestelorder_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bestelorder $bestelorder)
    {
        $deleteForm = $this->createDeleteForm($bestelorder);
        $editForm = $this->createForm('AppBundle\Form\BestelorderType', $bestelorder);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bestelorder_edit', array('id' => $bestelorder->getId()));
        }

        return $this->render('bestelorder/edit.html.twig', array(
            'bestelorder' => $bestelorder,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bestelorder entity.
     *
     * @Route("/{id}", name="bestelorder_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bestelorder $bestelorder)
    {
        $form = $this->createDeleteForm($bestelorder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bestelorder);
            $em->flush();
        }

        return $this->redirectToRoute('bestelorder_index');
    }

    /**
     * Creates a form to delete a bestelorder entity.
     *
     * @param Bestelorder $bestelorder The bestelorder entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bestelorder $bestelorder)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bestelorder_delete', array('id' => $bestelorder->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

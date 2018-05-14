<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Leverancier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Leverancier controller.
 *
 * @Route("leverancier")
 */
class LeverancierController extends Controller
{
    /**
     * Lists all leverancier entities.
     *
     * @Route("/", name="leverancier_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $leveranciers = $em->getRepository('AppBundle:Leverancier')->findAll();

        return $this->render('leverancier/index.html.twig', array(
            'leveranciers' => $leveranciers,
        ));
    }

    /**
     * Creates a new leverancier entity.
     *
     * @Route("/new", name="leverancier_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $leverancier = new Leverancier();
        $form = $this->createForm('AppBundle\Form\LeverancierType', $leverancier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($leverancier);
            $em->flush();

            return $this->redirectToRoute('leverancier_show', array('id' => $leverancier->getId()));
        }

        return $this->render('leverancier/new.html.twig', array(
            'leverancier' => $leverancier,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a leverancier entity.
     *
     * @Route("/{id}", name="leverancier_show")
     * @Method("GET")
     */
    public function showAction(Leverancier $leverancier)
    {
        $deleteForm = $this->createDeleteForm($leverancier);

        return $this->render('leverancier/show.html.twig', array(
            'leverancier' => $leverancier,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing leverancier entity.
     *
     * @Route("/{id}/edit", name="leverancier_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Leverancier $leverancier)
    {
        $deleteForm = $this->createDeleteForm($leverancier);
        $editForm = $this->createForm('AppBundle\Form\LeverancierType', $leverancier);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('leverancier_edit', array('id' => $leverancier->getId()));
        }

        return $this->render('leverancier/edit.html.twig', array(
            'leverancier' => $leverancier,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a leverancier entity.
     *
     * @Route("/{id}", name="leverancier_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Leverancier $leverancier)
    {
        $form = $this->createDeleteForm($leverancier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($leverancier);
            $em->flush();
        }

        return $this->redirectToRoute('leverancier_index');
    }

    /**
     * Creates a form to delete a leverancier entity.
     *
     * @param Leverancier $leverancier The leverancier entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Leverancier $leverancier)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('leverancier_delete', array('id' => $leverancier->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

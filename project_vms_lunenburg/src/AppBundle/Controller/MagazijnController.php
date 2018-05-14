<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Magazijn;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Magazijn controller.
 *
 * @Route("magazijn")
 */
class MagazijnController extends Controller
{
    /**
     * Lists all magazijn entities.
     *
     * @Route("/", name="magazijn_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $magazijns = $em->getRepository('AppBundle:Magazijn')->findAll();

        return $this->render('magazijn/index.html.twig', array(
            'magazijns' => $magazijns,
        ));
    }

    /**
     * Creates a new magazijn entity.
     *
     * @Route("/new", name="magazijn_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $magazijn = new Magazijn();
        $form = $this->createForm('AppBundle\Form\MagazijnType', $magazijn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($magazijn);
            $em->flush();

            return $this->redirectToRoute('magazijn_show', array('id' => $magazijn->getId()));
        }

        return $this->render('magazijn/new.html.twig', array(
            'magazijn' => $magazijn,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a magazijn entity.
     *
     * @Route("/{id}", name="magazijn_show")
     * @Method("GET")
     */
    public function showAction(Magazijn $magazijn)
    {
        $deleteForm = $this->createDeleteForm($magazijn);

        return $this->render('magazijn/show.html.twig', array(
            'magazijn' => $magazijn,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing magazijn entity.
     *
     * @Route("/{id}/edit", name="magazijn_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Magazijn $magazijn)
    {
        $deleteForm = $this->createDeleteForm($magazijn);
        $editForm = $this->createForm('AppBundle\Form\MagazijnType', $magazijn);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('magazijn_edit', array('id' => $magazijn->getId()));
        }

        return $this->render('magazijn/edit.html.twig', array(
            'magazijn' => $magazijn,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a magazijn entity.
     *
     * @Route("/{id}", name="magazijn_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Magazijn $magazijn)
    {
        $form = $this->createDeleteForm($magazijn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($magazijn);
            $em->flush();
        }

        return $this->redirectToRoute('magazijn_index');
    }

    /**
     * Creates a form to delete a magazijn entity.
     *
     * @param Magazijn $magazijn The magazijn entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Magazijn $magazijn)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('magazijn_delete', array('id' => $magazijn->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

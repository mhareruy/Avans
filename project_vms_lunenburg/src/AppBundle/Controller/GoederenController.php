<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Goederen;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Goederen controller.
 *
 * @Route("goederen")
 */
class GoederenController extends Controller
{
    /**
     * Lists all goederen entities.
     *
     * @Route("/", name="goederen_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $goederens = $em->getRepository('AppBundle:Goederen')->findAll();

        return $this->render('goederen/index.html.twig', array(
            'goederens' => $goederens,
        ));
    }

    /**
     * Creates a new goederen entity.
     *
     * @Route("/new", name="goederen_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $goederen = new Goederen();
        $form = $this->createForm('AppBundle\Form\GoederenType', $goederen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($goederen);
            $em->flush();

            return $this->redirectToRoute('goederen_show', array('id' => $goederen->getId()));
        }

        return $this->render('goederen/new.html.twig', array(
            'goederen' => $goederen,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a goederen entity.
     *
     * @Route("/{id}", name="goederen_show")
     * @Method("GET")
     */
    public function showAction(Goederen $goederen)
    {
        $deleteForm = $this->createDeleteForm($goederen);

        return $this->render('goederen/show.html.twig', array(
            'goederen' => $goederen,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing goederen entity.
     *
     * @Route("/{id}/edit", name="goederen_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Goederen $goederen)
    {
        $deleteForm = $this->createDeleteForm($goederen);
        $editForm = $this->createForm('AppBundle\Form\GoederenType', $goederen);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('goederen_edit', array('id' => $goederen->getId()));
        }

        return $this->render('goederen/edit.html.twig', array(
            'goederen' => $goederen,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a goederen entity.
     *
     * @Route("/{id}", name="goederen_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Goederen $goederen)
    {
        $form = $this->createDeleteForm($goederen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($goederen);
            $em->flush();
        }

        return $this->redirectToRoute('goederen_index');
    }

    /**
     * Creates a form to delete a goederen entity.
     *
     * @param Goederen $goederen The goederen entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Goederen $goederen)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('goederen_delete', array('id' => $goederen->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

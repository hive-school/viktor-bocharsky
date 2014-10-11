<?php

namespace BW\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BW\UserBundle\Entity\Profile;
use BW\UserBundle\Form\ProfileType;

/**
 * Profile controller.
 */
class ProfileController extends Controller
{

    /**
     * Displays a form to edit an existing Profile entity.
     */
    public function editAction()
    {
        $user = $this->getUser();
        if ( ! $user) {
            return $this->redirect($this->generateUrl('user_sign_in'));
        }
        $em = $this->getDoctrine()->getManager();
        $profile = $user->getProfile();
        if ( ! $profile) {
            $profile = new Profile();
            $profile->setUser($user);
            $em->persist($profile);
            $em->flush();
        }

        $form = $this->createEditForm($profile);

        return $this->render('BWUserBundle:Profile:edit.html.twig', array(
            'profile' => $profile,
            'form' => $form->createView(),
        ));
    }

    /**
    * Creates a form to edit a Profile entity.
    *
    * @param Profile $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Profile $entity)
    {
        $form = $this->createForm(new ProfileType(), $entity, array(
            'action' => $this->generateUrl('profile_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }

    /**
     * Edits an existing Profile entity.
     */
    public function updateAction(Request $request)
    {
        $user = $this->getUser();
        if ( ! $user) {
            return $this->redirect($this->generateUrl('user_sign_in'));
        }
        $em = $this->getDoctrine()->getManager();
        $profile = $user->getProfile();

        if ( ! $profile) {
            throw $this->createNotFoundException('Unable to find Profile entity.');
        }

        $form = $this->createEditForm($profile);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('profile_edit'));
        }

        return $this->render('BWUserBundle:Profile:edit.html.twig', array(
            'profile' => $profile,
            'form' => $form->createView(),
        ));
    }
}

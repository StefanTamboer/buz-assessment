<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ResetPasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/reset-password')]
class ResetPasswordController extends AbstractController
{
    /**
     * @return void
     */
    #[NoReturn] #[Route('/link', name: 'app_user_reset_password_link', methods: ['GET'])]
    public function resetPasswordLink(): void
    {
        dd('http://http://buz-assessment.ddev.site/reset-password/someOneTimePassword/edit');
    }

    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     * @throws ORMException
     * @throws OptimisticLockException
     */
    #[Route('/{oneTimePassword}/edit', name: 'app_user_reset_password_edit', methods: ['GET', 'POST'])]
    public function resetPasswordEdit(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(
            ResetPasswordType::class, [
                'new_password' => '',
            ]
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $resetPassword = $entityManager->find(ResetPassWord::class, ['one_time_password' => $request->get('oneTimePassword')]);
            $userEmail = $resetPassword->getEmail();
            $user = $entityManager->find(User::class, $userEmail);
            $user->setPassword($resetPassword->getOneTimePassword());
            $entityManager->remove($resetPassword);
            $entityManager->flush();

            return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reset_password/edit.html.twig', [
            'form' => $form,
        ]);
    }
}

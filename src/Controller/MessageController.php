<?php

namespace App\Controller;

use App\Service\MessageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    public function __construct(private readonly MessageServiceInterface $service)
    {
    }

    #[Route('/send-message/email', name: 'app_message', methods: ["POST"])]
    public function email(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        try {
            $this->service->sendEmail(
                to: $data['to'],
                subject: $data['subject'],
                body: $data['body']
            );
            return $this->json([
                'message' => "Mensagem enviada com sucesso!",
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return $this->json([
                'message' => "Erro ao enviar mensagem: " . $th->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}

<?php

namespace App\Controller;

use App\Services\MessageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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

        return $this->json([
            'message' => $this->service->sendEmail(
                to: $data['to'],
                subject: $data['subject'],
                body: $data['body']
            ),
        ]);
    }
}

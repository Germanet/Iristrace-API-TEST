<?

namespace App\Controller;

use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthController extends AbstractController
{
    #[Route('/api/token', name: 'api_token', methods: ['POST'])]
    public function getToken(Request $request, JWTTokenManagerInterface $JWTManager): JsonResponse
    {
        $user = $this->getUser();

        return new JsonResponse(['token' => $JWTManager->create($user)]);
    }

    #[Route('/api/login', name: 'api_login', methods: ['POST'])]
    public function login(AuthenticationUtils $authenticationUtils): JsonResponse
    {
        return new JsonResponse(['message' => 'Login successful'], 200);
    }
}
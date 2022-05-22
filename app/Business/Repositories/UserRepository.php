<?php


namespace App\Business\Repositories;


use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserRepository implements UserInterface
{

    /**
     * @var User
     */
    private $model;

    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return object
     */
    public function register(Array $data): object
    {
        $res = $this->model->create($data);
        if ($res) {
            return response()->json(['message' => 'Registro salvo', 'status' => true], Response::HTTP_CREATED);
        }
        return response()->json(['message' => 'Erro ao salvar', 'status' => false], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function authenticate(Array $data): object
    {
        if (!$token = auth()->attempt($data)) {
            return response()->json(['message' => 'Erro ap autenticar', 'success' => false], Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            $user = auth()->user();
            return response()->json(
                [
                    'token' => $token,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name
                ], Response::HTTP_OK);
        }
    }
}

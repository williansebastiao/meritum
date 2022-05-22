<?php


namespace App\Business\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        DB::beginTransaction();
        $res = $this->model->create($data);
        if ($res) {
            DB::commit();;
            return response()->json(['message' => 'Registro salvo', 'status' => true], Response::HTTP_CREATED);
        }
        DB::rollBack();
        return response()->json(['message' => 'Erro ao salvar', 'status' => false], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @param array $data
     * @return object
     */
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
                    'last_name' => $user->last_name,
                    'success' => true
                ], Response::HTTP_OK);
        }
    }

    /**
     * @return object
     */
    public function me(): object
    {
        $user = auth()->user();
        $arr = [
            'id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'phone' => $user->phone,
            'cpf' => $user->cpf,
        ];
        return response()->json($arr, Response::HTTP_OK);
    }

    /**
     * @return object
     */
    public function logout(): object
    {
        auth()->logout(true);
        return response()->json(['message' => 'Até mais :)', 'success' => true], Response::HTTP_OK);
    }
}

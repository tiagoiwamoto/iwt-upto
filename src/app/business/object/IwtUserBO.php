<?php
/**
 * Created by: tiago
 * Email: tiago.iwamoto@gmail.com
 * Linkedin: https://www.linkedin.com/in/tiago-iwamoto/
 * Created at: 15/05/2021 - 13:36
 */

namespace app\business\object;


use app\business\service\IwtUserService;
use app\entity\IwtUser;
use app\model\ApiDto;
use JsonMapper;
use JsonMapper_Exception;
use Slim\Http\Request;

class IwtUserBO{

    private $iwtUserService;

    /**
     * IwtUserBO constructor.
     * @param $iwtUserService
     */
    public function __construct(IwtUserService $iwtUserService){
        $this->iwtUserService = $iwtUserService;
    }

    public function performSignIn(Request $request){
        $data = json_decode($request->getBody()->getContents());
        $mapper = new JsonMapper();
        try {
            $user = $mapper->map($data, new IwtUser());
        }catch (JsonMapper_Exception $e){
            return new ApiDto('5', 'Falha ao processar sua solicitação.', null);
        }
        $userExists = $this->iwtUserService->signin($user->getEmail(), md5($user->getPassword()));
        if($userExists != null){
            $_SESSION['x-user'] = $userExists;
            return new ApiDto('0', 'Usuário localizado', $userExists);
        }else{
            return new ApiDto('1', 'Usuário não localizado', null);
        }
    }

    public function performSaveUser(Request $request){
        $data = json_decode($request->getBody()->getContents());
        $mapper = new JsonMapper();
        try {
            $user = $mapper->map($data, new IwtUser());
            $user->setPassword(md5($user->getPassword()));
            $userSaved = $this->iwtUserService->save($user);
            if($userSaved != null){
                $_SESSION['x-user'] = $userSaved;
                $apiDto = new ApiDto('0', 'Usuário cadastrado com sucesso', $userSaved);
                return $apiDto;
            }else{
                $apiDto = new ApiDto('1', 'Falha ao cadastrar usuário', null);
                return $apiDto;
            }
        }catch (JsonMapper_Exception $e){
            $apiDto = new ApiDto('5', 'Falha ao processar sua solicitação.', null);
            return $apiDto;
        }
    }

    public function performRecoverAllUsers(){
        return $this->iwtUserService->recover();
    }

    public function performUpload($files, $user){
        return $this->iwtUserService->saveFile($files, $user);
    }

    public function performRecoverUserImages($user){
        return $this->iwtUserService->recoverImages($user->id);
    }

}

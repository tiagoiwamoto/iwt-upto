<?php
/**
 * Created by: tiago
 * Email: tiago.iwamoto@gmail.com
 * Linkedin: https://www.linkedin.com/in/tiago-iwamoto/
 * Created at: 15/05/2021 - 13:32
 */

namespace app\controller;


use app\business\object\IwtUserBO;
use app\util\ApiDtoUtil;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

class IwtUserController{

    private $iwtUserBO;
    private $twig;

    /**
     * IwtUserController constructor.
     * @param IwtUserBO $iwtUserBO
     */
    public function __construct(IwtUserBO $iwtUserBO, Twig $twig){
        $this->iwtUserBO = $iwtUserBO;
        $this->twig = $twig;
    }

    public function index(Request $request, Response $response){
        return $this->twig->render($response, 'signin.twig');
    }

    public function home(Request $request, Response $response){
        return $this->twig->render($response, 'home.twig');
    }

    public function authenticate(Request $request, Response $response){
        session_start();
        $result = new ApiDtoUtil();
        $result = $result->convertToArray($this->iwtUserBO->performSignIn($request));
        return json_encode($result);
    }

    public function recoverUsers(Request $request, Response $response){
        return json_encode($this->iwtUserBO->performRecoverAllUsers());
    }

    public function create(Request $request, Response $response){
        session_start();
        $result = new ApiDtoUtil();
        $result = $result->convertToArray($this->iwtUserBO->performSaveUser($request));
        return json_encode($result);
    }

    public function upload(Request $request, Response $response){
        session_start();
        $files = $request->getUploadedFiles();
        $user = $_SESSION['x-user'];
        return json_encode($this->iwtUserBO->performUpload($files, $user->id));
    }

    public function recoverUserImages(Request $request, Response $response){
        session_start();
        $user = $_SESSION['x-user'];
        if($user == null){
            return $this->twig->render($response, 'signin.twig');
        }
        return json_encode($this->iwtUserBO->performRecoverUserImages($user));
    }


}

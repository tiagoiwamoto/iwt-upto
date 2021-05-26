<?php
/**
 * Created by: tiago
 * Email: tiago.iwamoto@gmail.com
 * Linkedin: https://www.linkedin.com/in/tiago-iwamoto/
 * Created at: 15/05/2021 - 13:22
 */

namespace app\business\service;


use app\entity\IwtUser;
use Illuminate\Database\Capsule\Manager;

class IwtUserService{

    private $managerDb;
    private $table = 'iwt-users';
    private $tableImages = 'iwt-upto';

    /**
     * IwtUserService constructor.
     * @param $managerDb
     */
    public function __construct(Manager $managerDb){
        $this->managerDb = $managerDb;
    }

    public function signin($user, $password){
        $userFound = $this->managerDb
            ->table($this->table)
            ->where('email', '=', $user)
            ->where('password', '=', $password)
            ->select()
            ->first();

        $userFound->password = '******';
        return $userFound;
    }

    public function save(IwtUser $user){
        try{
            $userToSave = $this->managerDb
                ->table($this->table)->insert([
                    'username' => $user->getUsername(),
                    'password' => $user->getPassword(),
                    'email' => $user->getEmail(),
                    'status' => 'ACTIVE',
                    'created_at' => date('Y-m-d h:i:s')
                ]);

            return $this->signin($user->getUsername(), $user->getPassword());
        }catch (\Exception $e){
            return null;
        }
    }

    public function recover(){
        $users = $this->managerDb
            ->table($this->table)
            ->select()
            ->get();

        return $users;
    }

    public function saveFile($files, $user){
        foreach ($files['files'] as $file){
            // Pegando o dia e hora atual
            $date = new \DateTime();
            // Formatando data até os milisegundos
            $currentTime = $date->format('YmdHisu');
            $extension = substr(strrchr($file->getClientMediaType(), "/"), 1);
            $fileToSave = $this->managerDb
                ->table($this->tableImages)->insert([
                    'title' => $file->getClientFilename(),
                    'image_url' => 'http://localhost:8181/uploads/' . $currentTime . "." . $extension,
                    'file_size' => $file->getSize(),
                    'img_format' => $extension,
                    'user' => $user,
                    'created_at' => date('Y-m-d h:i:s')
            ]);
            $file->moveTo('./uploads/' . $currentTime . "." . $extension);
        }

        return true;
    }

    public function recoverImages(){
        $images = $this->managerDb
            ->table($this->tableImages)
            ->select()
            ->get();

        return $images;
    }

}

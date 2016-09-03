<?php
namespace CodeDelivery\Services;
use \CodeDelivery\Repositories\ClientRepository;
use \CodeDelivery\Repositories\UserRepository;
class ClientService{

    private $client, $user;
    public function __construct(ClientRepository $client, UserRepository $user){

        $this->user=$user;
        $this->client=$client;
        
    }

    public function save(array $data, $id){
    
        $this->client->update($data, $id);
        $userId = $this->client->find($id,['user_id'])->user_id;
        $this->user->update($data['users'], $userId);
}   
    public function create(array $data){
        $data['user']['password']=bcrypt(123456);
        $user=$this->user->create($data['users']);
        $data['user_id']=$user->id;
        $this->client->create($data);
        
}   
}

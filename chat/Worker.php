<?php
/**
 * Created by PhpStorm.
 * User: serg
 * Date: 15.11.16
 * Time: 16:59
 */

class Worker extends \dragonblack\phpwebsocket\Daemon  {
    protected $_clients=[];
    protected function onOpen($connection, $info) {
        $id = intval($connection);
        $this->_clients[$id] = '';
    }

    protected function onMessage($connection, $data) {
        $id = intval($connection);
        list($command, $value) = explode(' ', $data['payload']);

        switch ($command){
            case '/sign':
                $this->_sendToClient($id, 'Добро пожаловать, '.$value.'!');
                $this->sendToAll('К нам присоединился '.$value, $id);
                $this->_clients[$id] = $value;
                break;
            default:
                $this->sendToAll("[{$this->_clients[$id]}]: ".$data['payload']);
                break;
        }
    }

    protected function onClose($connection) {
        $id = intval($connection);
        $nick = $this->_clients[$id];
        unset($this->_clients[$id]);
        $this->sendToAll("$nick покинул чат");
    }

    private function sendToAll($message, $exclude=null){
        foreach($this->_clients as $cid=>$client){
            if($cid == $exclude){
                continue;
            }
            $this->_sendToClient($cid, $message);
        }
    }
}
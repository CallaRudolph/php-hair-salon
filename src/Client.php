<?php
    class Client
    {
        private $client_name;
        private $phone_number;
        private $stylist_id;
        private $id;

        function __construct($client_name, $phone_number, $stylist_id, $id = null)
        {
            $this->client_name = $client_name;
            $this->phone_number = $phone_number;
            $this->stylist_id = $stylist_id;
            $this->id = $id;
        }

        function setClientName($new_client_name)
        {
            $this->client_name = (string) $new_client_name;
        }

        function getClientName()
        {
            return $this->client_name;
        }

        function setPhoneNumber($new_phone_number)
        {
            $this->phone_number = (string) $new_phone_number;
        }

        function getPhoneNumber()
        {
            return $this->phone_number;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO clients (client_name, phone_number, stylist_id) VALUES ('{$this->getClientName()}', '{$this->getPhoneNumber()}', {$this->getStylistId()})");
            if ($executed) {
                $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

        function getId()
        {
            return $this->id;
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client) {
                $client_name = $client['client_name'];
                $phone_number = $client['phone_number'];
                $stylist_id = $client['stylist_id'];
                $client_id = $client['id'];
                $new_client = new Client($client_name, $phone_number, $stylist_id, $client_id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM clients;");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }

        static function find($search_id)
        {
            $found_client = null;
            $returned_clients = $GLOBALS['DB']->prepare("SELECT * FROM clients WHERE id = :id");
            $returned_clients->bindParam(':id', $search_id, PDO::PARAM_STR);
            $returned_clients->execute();
            foreach($returned_clients as $client) {
                $client_name = $client['client_name'];
                $phone_number = $client['phone_number'];
                $stylist_id = $client['stylist_id'];
                $client_id = $client['id'];
                if ($client_id == $search_id) {
                    $found_client = new Client($client_name, $phone_number, $stylist_id, $client_id);
                }
            }
            return $found_client;
        }

        function updateName($new_client_name)
        {
            $executed = $GLOBALS['DB']->exec("UPDATE clients SET client_name = '{$new_client_name}' WHERE id = {$this->getId()};");
            if ($executed) {
                $this->setClientName($new_client_name);
                return true;
            } else {
                return false;
            }
        }

        function updatePhoneNumber($new_phone_number)
        {
            $executed = $GLOBALS['DB']->exec("UPDATE clients SET phone_number = '{$new_phone_number}' WHERE id = {$this->getId()};");
            if ($executed) {
                $this->setPhoneNumber($new_phone_number);
                return true;
            } else {
                return false;
            }
        }

        function delete()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }
    }

?>

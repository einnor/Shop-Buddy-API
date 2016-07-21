<?php


namespace App\ShopBuddy\Shipment;


use App\Http\Controllers\Auth\AuthController;
use App\ShopBuddy\Cart\Cart;

class ShipmentRepository
{

    public function __construct()
    {
        $auth = new AuthController();
        $this->user = $auth->authenticateRequest();
    }

    /**
     * Add a shipment record in the shipments table and associate it with a cart
     * @param array $data
     * @param Cart $cart
     * @return mixed
     */
    public function createShipment(array $data, Cart $cart) {
        $shipment = new Shipment($data);
        return $cart->shipments()->save($shipment);
    }

    /**
     * Update shipment details
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateShipment(array $data, $id){
        $shipment = Shipment::findOrFail($id);
        return $shipment->update($data);
    }

    /*
     * Delete a shipment record in the shipments table
     * @param $id
     */
    public function removeShipment($id) {
        return Shipment::findOrFail($id)->delete();
    }

    /**
     * Get all the shipments
     * @return mixed
     */
    public function getAllShipments(){
        return Shipment::latest()->get();
    }

    /**
     * Get details of a specific shipment by the id
     * @param $id
     * @return mixed
     */
    public function getShipmentById($id){
        return Shipment::findOrFail($id)->get();
    }
}
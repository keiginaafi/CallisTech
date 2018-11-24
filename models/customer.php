<?php
  namespace models;
  include 'database.php';

  use models\database as database;
  /**
   *
   */
  class Customer{
    private $customer_no;
    private $name;
    private $address;
    private $phone;
    private $_db;

    public function __construct(){
      $this->_db = new database("localhost", "root", "", "callistech");
    }
    public function setCustomerNum($customer_no){
      $this->customer_no = $this->_db->escapeString($customer_no);
    }

    public function setName($name){
      $this->name = $this->_db->escapeString($name);
    }

    public function setAddress($address){
      $this->address = $this->_db->escapeString($address);
    }

    public function setPhone($phone){
      $this->phone = $this->_db->escapeString($phone);
    }

    public function getCustomerNum(){
      return $this->customer_no;
    }

    public function getName(){
      return $this->name;
    }

    public function getAddress(){
      return $this->address;
    }

    public function getPhone(){
      return $this->phone;
    }

    public function getLastId(){
      $last = $this->_db->query("SELECT MAX(id) AS lastId FROM test");
      $lastId = $this->_db->fetchArray($last)['lastId'];
      return $lastId;
    }

    public function getNewCustomerNum(){
      $lastCusNum = $this->getLastId();
      $nextCusNum = $lastCusNum + 1;
      if (empty($lastCusNum)) {
        $customerNum = 'CRM0001';
      } elseif ($lastCusNum < 10) {
        $customerNum = 'CRM000'.$nextCusNum;
      } elseif ($lastCusNum < 100) {
        $customerNum = 'CRM00'.$nextCusNum;
      } elseif ($lastCusNum < 1000) {
        $customerNum = 'CRM0'.$nextCusNum;
      } else {
        $customerNum = 'CRM'.$nextCusNum;
      }

      return $customerNum;
    }

    public function saveCus(){
      $sql = "INSERT INTO `test` (`customer_no`, `name`, `address`, `phone`) VALUES ('$this->customer_no', '$this->name', '$this->address', '$this->phone')";
      $res = $this->_db->query($sql);
      if ($res == TRUE) {
        echo "data berhasil disimpan";
      }
    }

    public function getAllCus(){
      $sql = "SELECT * FROM `test`";
      $res = $this->_db->query($sql);
      return $res;
    }

    public function numberRows($num){
      return $num->num_rows;
    }

    public function getCustomer($id){
      $sql = "SELECT * FROM `test` WHERE `id`='$id'";
      $res = $this->_db->query($sql);
      return $res;
    }

    public function editCus($id){
      $sql = "UPDATE `test` SET `customer_no`='$this->customer_no', `name`='$this->name', `address`='$this->address', `phone`='$this->phone' WHERE id='$id' ";
      $res = $this->_db->query($sql);
      if ($res == TRUE) {
        echo "data berhasil diubah";
      }
    }

    public function hapusCus($id){
      $sql = "DELETE FROM `test` WHERE id='$id' ";
      $res = $this->_db->query($sql);
      if ($res == TRUE) {
        echo "data telah dihapus";
      }
    }
  }

?>

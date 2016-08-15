<?php 
require_once ('/../components/Database.php');

class RestPDO
{
	private $_connection;
	private $_info = '';

	public function __construct()
	{
		$db = Database::getInstance();
		$this->_connection = $db->getConnection();
	}

	public function getInfo()
	{

	}

	public function getData()
	{
		if ($this->_connection) {
			$sth = $this->_connection->prepare('SELECT * FROM book ORDER BY id ASC');
			$sth->execute();
			$result = $sth->fetchAll();
			return $result;
		}
		return false;
	}

	public function getDataById($id)
	{
		if ($this->_connection) {
			$sth = $this->_connection->prepare('SELECT * FROM book WHERE id = :id');
			$sth->bindParam(':id', $id);
			$sth->execute();
			$result = $sth->fetchAll();
			return $result;
		}
		return false;
	}

	public function search($name)
	{
		if ($this->_connection) {
			$sth = $this->_connection->prepare('SELECT * FROM book WHERE name = :name ORDER BY id ASC');
			$sth->bindParam(':name', $name);
			$sth->execute();
			$result = $sth->fetchAll();
			return $result;
		}
		return false;
	}

	public function create($name, $phone)
	{
		if ($this->_connection) {
			$sth = $this->_connection->prepare('INSERT INTO book (name, phone_number) 
				VALUES (:name, :phone_number)');
			$sth->bindParam(':name', $name);
			$sth->bindParam(':phone_number', $phone);
			$res = $sth->execute();
			return $res;
		}
	}

	public function update($id, $name, $phone)
	{
		if ($this->_connection) {
			$sth = $this->_connection->prepare('UPDATE book 
				SET name = :name, phone_number = :phone 
				WHERE id = :id');
			$sth->bindParam(':name', $name);
			$sth->bindParam(':phone', $phone);
			$sth->bindParam(':id', $id);
			$res = $sth->execute();
			return $res;
		}
		return false;
	}

	public function delete($id)
	{
		if ($this->_connection) {
			$sth = $this->_connection->prepare('DELETE FROM book WHERE id = :id');
			$sth->bindParam(':id', $id);
			$res = $sth->execute();
			return $res;
		}
		return false;
	}
}
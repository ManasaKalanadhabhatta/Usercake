<?php

class DB
{
	private $mysqli;
	public function __construct()
	{
		$this->mysqli = new mysqli('localhost', 'root', '', 'newdb');
	}
	public function query($sql)
	{
		return $this->mysqli->query($sql);
	}
}
?>
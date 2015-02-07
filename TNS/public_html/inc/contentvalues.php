<?php
class ContentValues
{
	private $index;
	private $value;
	private $array;
	
	public function get_content()
	{
		return $this->array;
	}
	
	public function put($index, $value)
	{
		$this->array[$index] = $value;
	}
	
	
}
?>
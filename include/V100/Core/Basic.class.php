<?php
/**
 * 基本方法
 */
abstract class RAF_Basic {
	
	private function __tostring() {
		$class_name   = get_class($this);
		$class_func   = implode(", ",get_class_methods($this));
		return "Class:" . $class_name . "<br />Function:" . $class_func;
	}

    private function __set($name ,$value) {
        if(property_exists($this,$name)) {
            $this->$name = $value;
        }
    }

    private function __get($name)
    {
        if(isset($this->$name)){
            return $this->$name;
        }
    }
}
?>
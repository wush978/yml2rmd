<?php

require_once __DIR__ . '/RmdNode.php';

class RmdGeneratedNode extends RmdNode
{
    
    protected $_template;
    
    public function __construct($title, $level, array $config = null, RmdNode $parent = null) {
        parent::__construct($title, $level, $config, $parent);
    }
    
    public function render() {
        $generator = $this->getAttribute('_generator');
        $params = $this->generateCombination($generator);
        $params_key = $params['key'];
        $params_value = $params['value'];
        $template = $this->getAttribute('_template');
        $retval = $this->getTitle();
        for($i = 0;$i < count($params_key);$i++) {
        	$param_key = $params_key[$i];
        	$param_value = $params_value[$i];
            $this->_content = $template;
            foreach($param_key as $key => $value) {
                $this->replace("@$key", $value); 
            }
            foreach($param_value as $key => $value) {
                $this->replace($key, $value); 
            }
            $retval .= $this->_content;
        }
        return $retval;
    }
    
    protected function replace($search, $replace, &$string = null) {
    	if (is_null($string))
        	$this->_content = str_replace("%$search%", $replace, $this->_content);
    	else
    		$string = str_replace("%$search%", $replace, $string);
    } 
    
    protected function generateCombination($key_list) {
        assert(is_array($key_list) | is_null($key_list));
        if (count($key_list) <= 1) {
	        $retval_value = array();
	        $retval_key = array();
            $list = $this->getAttribute($key_list[0], array());
            foreach($list as $element_key => $element) {
            	array_push($retval_value, array($key_list[0] => $element));
            	array_push($retval_key, array($key_list[0] => $element_key));
            }
            return array('key' => $retval_key, 'value' => $retval_value);
        }
        return $this->generateCombinationInternal($key_list);
    }
    
    protected function generateCombinationInternal($key_list) {
        if (count($key_list) == 2) {
	        $retval_value = array();
	        $retval_key = array();
        	$list0 = $this->getAttribute($key_list[0], array());
            $list1 = $this->getAttribute($key_list[1], array());
            foreach($list0 as $element_key0 => $element0) {
                foreach ($list1 as $element_key1 => $element1) {
                    array_push($retval_value, array($key_list[0] => $element0, $key_list[1] => $element1)); 
                    array_push($retval_key, array($key_list[0] => $element_key0, $key_list[1] => $element_key1));
                }
            }
            return array('key' => $retval_key, 'value' => $retval_value);
        }
        $key_last = array_pop($key_list);
        $retval_temp = $this->generateCombinationInternal($key_list);
        $retval_temp_key = $retval_temp['key'];
        $retval_temp_value = $retval_temp['value'];
        $list = $this->getAttribute($key_last, array());
        $retval_value = array();
        $retval_key = array();
        foreach($retval_temp_value as $retval_element) {
            foreach($list as $element_key => $element) {
                $retval_element[$key_last] = $element;
                array_push($retval_value, $retval_element);
            }
        }
        foreach($retval_temp_key as $retval_element) {
            foreach($list as $element_key => $element) {
                $retval_element[$key_last] = $element_key;
                array_push($retval_key, $retval_element);
            }
        }
        return array('key' => $retval_key, 'value' => $retval_value);
    }
}

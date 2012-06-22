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
        $template = $this->getAttribute('_template');
        $retval = $this->getTitle();
        foreach ($params as $param) {
            $this->_content = $template;
            foreach($param as $key => $value) {
                $this->replace($key, $value); 
            }
            $retval .= $this->_content;
        }        
        return $retval;
    }
    
    private function replace($search, $replace) {
        $this->_content = str_replace("%$search%", $replace, $this->_content);
    } 
    
    private function generateCombination($key_list) {
        assert(is_array($key_list) | is_null($key_list));
        if (count($key_list) <= 1) {
	        $retval = array();
            $list = $this->getAttribute($key_list[0], array());
            foreach($list as $element) {
            	array_push($retval, array($key_list[0] => $element));
            }
            return $retval;
        }
        return $this->generateCombinationInternal($key_list);
    }
    
    private function generateCombinationInternal($key_list) {
        if (count($key_list) == 2) {
            $retval = array();
            $list0 = $this->getAttribute($key_list[0], array());
            $list1 = $this->getAttribute($key_list[1], array());
            foreach($list0 as $element0) {
                foreach ($list1 as $element1) {
                    array_push($retval, array($key_list[0] => $element0, $key_list[1] => $element1)); 
                }
            }
            return $retval;
        }
        $key_last = array_pop($key_list);
        $retval_temp = $this->generateCombinationInternal($key_list);
        $list = $this->getAttribute($key_last, array());
        $retval = array();
        foreach($retval_temp as $retval_element) {
            foreach($list as $element) {
                $retval_element[$key_last] = $element;
                array_push($retval, $retval_element);
            }
        }
        return $retval;
    }
}

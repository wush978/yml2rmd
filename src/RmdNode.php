<?php

class RmdNode
{

    protected $title = null;
    
    protected $level = null;
    
    protected $parent;
    
    protected $_attribute = array();
    
    protected $_content = null;
    
    protected $child = array();
    
    public function __construct($title, $level, array $config = null, RmdNode $parent = null) {
        $this->title = $title;
        $this->level = $level;
        $this->parent = $parent;
        if (is_null($config)) {
            return;
        }
        foreach($config as $key => $value) {
            switch($key) {
                case '_attribute':
                    assert(is_array($value));
                    $this->_attribute = $value;
                    break;
                case '_content':
                    assert(is_string($value));
                    $this->_content = $value;
                    break;
                default:
                    $child_class = __CLASS__;
                    if ($value === '') {
                        $value = array();
                    }
                    if (isset($value['_attribute']['_class_name'])) {
                        $child_class = $value['_attribute']['_class_name'];
                    }
                    $this->child[$key] = new $child_class( $key, $level + 1, $value, $this );
            }        
        }
    }
    
    public function getAttribute($key, $default = null, $inherit = true) {
        if (array_key_exists($key, $this->_attribute)) {
            return $this->_attribute[$key];
        }
        if ($inherit & !is_null($this->parent)) {
            return $this->parent->getAttribute($key, $default, $inherit);
        }
        return $default;
    }
    
    public function render() {
        $retval = $this->getTitle();
        if (!is_null($this->_content)) {
            $callable = 'renderWithContent';
            $retval .= $this->_content;
        } 
        else {
            $callable = 'renderWithoutContent';
        }
        foreach ($this->child as $key => $value) {
            self::$callable($key, $value, $retval);
        }
        if (substr($retval, -2, 2) !== str_repeat(self::getBr(), 2)) {
            $retval .= self::getBr();
        }
        return $retval;
    }
    
    public function getTitle() {
        $title = $this->getAttribute('title', $this->title);
        return str_repeat('#', $this->level) . " $title" . str_repeat(self::getBr(), 2); 
    }
    
    static public function getBr() {
        switch (PHP_OS) {
            case 'WINNT':
                return "\r\n";
            case 'Linux':
                return "\n";
            default:
                throw new Exception('TODO: getBr for ' . PHPOS);
        }
    }
    
    static private function renderWithContent($key, RmdNode $value, &$retval) {
        $retval = str_replace("%$key%", $value->render(), $retval);
    }
    
    static private function renderWithoutContent($key, RmdNode $value, &$retval) {
        $retval .= $value->render();
    }
}

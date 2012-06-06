<?php

class RmdNode
{

    protected $title = null;
    
    protected $level = null;
    
    protected $parent;
    
    protected $attribute = array();
    
    protected $_child_class = __CLASS__;
    
    protected $child = array();
    
    public function __construct($title, $level, array $config = null, RmdNode $parent = null) {
        $this->title = $title;
        $this->level = $level;
        $this->parent = $parent;
        foreach($config as $key => $value) {
            switch($key) {
                case '_attribute':
                    assert(is_array($value));
                    $this->attribute = $value;
                    break;
                case '_child_class':
                    assert(is_string($value));
                    $this->_child_class = $value;
                    break;
                default:
                    $child_class = $this->_child_class;
                    $this->child[$key] = new $child_class( $key, $level + 1, $value, $this );
            }        
        }
    }
    
    public function getAttribute($key, $default = null, $inherit = true) {
        if (array_key_exists($key, $this->attribute)) {
            return $this->attribute[$key];
        }
        if ($inherit & !is_null($this->parent)) {
            return $this->parent->getAttribute($key, $default, $inherit);
        }
        return $default;
    }
    
    public function render() {
        
    }
    
    private function getTitle() {
        $title = $this->title;
        return str_replace('#', $this->level) . " $title" . self::getBr(); 
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
}

<?php

class RmdNode
{

    protected $title = null;
    
    protected $level = null;
    
    protected $parent;
    
    protected $_attribute = array();
    
    protected $_child_class = __CLASS__;
    
    protected $_content = null;
    
    protected $child = array();
    
    public function __construct($title, $level, array $config = null, RmdNode $parent = null) {
        $this->title = $title;
        $this->level = $level;
        $this->parent = $parent;
        foreach($config as $key => $value) {
            switch($key) {
                case '_attribute':
                    assert(is_array($value));
                    $this->_attribute = $value;
                    break;
                case '_child_class':
                    assert(is_string($value));
                    $this->_child_class = $value;
                    break;
                case '_content':
                    assert(is_string($value));
                    $this->_content = $value;
                default:
                    $child_class = $this->_child_class;
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
        if (is_null($this->_content)) {
            $callable = 'renderWithContent';
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
    
    static private function renderWithContent($key, RmdNode $value, &$retval) {
        $retval = str_replace("%$key%", $value->render(), $retval);
    }
    
    static private function renderWithoutContent($key, RmdNode $value, &$retval) {
        $retval .= $value->render();
    }
}

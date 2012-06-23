<?php

require_once __DIR__ . '/RmdNode.php';

class RmdRsrcNode extends RmdGeneratedNode {
	
	protected $_src_name;
	
	public function render() {
		$generator = $this->getAttribute('_generator');
		$params = $this->generateCombination($generator);
		$template = $this->getAttribute('_template');
		foreach ($params as $param) {
			$src_name = $this->getAttribute('_src_name');
			if (is_null($src_name)) {
				throw new Exception("No src_name");
			} 
			$this->_content = $template;
			foreach($param as $key => $value) {
				$this->replace($key, $value);
				$this->replace($key, $value, $src_name);
			}
			file_put_contents($src_name, $this->_content);
		}
		return '';
	}
}
<?php

require_once __DIR__ . '/RmdNode.php';

class RmdRsrcNode extends RmdGeneratedNode {
	
	protected $_src_name;
	
	public function render() {
		$generator = $this->getAttribute('_generator');
		$params = $this->generateCombination($generator);

		$params_key = $params['key'];
		$params_value = $params['value'];
		$template = $this->getAttribute('_template');
		for($i = 0;$i < count($params_key);$i++) {
			$src_name = $this->getAttribute('_src_name');
			if (is_null($src_name)) {
				throw new Exception("No src_name");
			} 
			$param_key = $params_key[$i];
			$param_value = $params_value[$i];
			$this->_content = $template;
			foreach($param_key as $key => $value) {
				$this->replace("@$key", $value);
				$this->replace("@$key", $value, $src_name);
			}
			foreach($param_value as $key => $value) {
				$this->replace($key, $value);
				$this->replace($key, $value, $src_name);
			}
			file_put_contents($src_name, $this->_content);
		}
		return '';
	}
}
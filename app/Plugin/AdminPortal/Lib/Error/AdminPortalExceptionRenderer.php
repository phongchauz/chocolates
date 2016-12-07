<?php 

App::uses('ExceptionRenderer', 'Error');

class AdminPortalExceptionRenderer extends ExceptionRenderer {
	
	protected function _outputMessage($template) {
		$template = sprintf('%s%s', '', $template);
		parent::_outputMessage($template);
	}
			
}

?>
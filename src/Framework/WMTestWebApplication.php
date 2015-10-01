<?php
/**
 * WMWebApplication for unit testing
 *
 * @author ron
 */
class WMTestWebApplication extends WMWebApplication
{
    /**
     * initErrorHandling
     *
     * Disable most default windmill error handling
     *
     * @access protected
     * @return void
     **/
    protected static function initErrorHandling()
    {
        $exceptionHandler = new WMExceptionHandler();
        $exceptionHandler->replaceExceptionHandler();
    }
}

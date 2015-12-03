<?php 

require_once('Base_layout.php');
 
class Page_layout extends Base_layout {
 
    // --------------------------------------------------------------------
 
    /**
     * Fields specific to the home page
     *
     * @access  public
     * @return  array
     */ function fields()
    {
        $this->load->model('core_model'); 
        $fields = parent::fields($include);
        // PUT YOUR FIELDS HERE...
        return $fields;
    }
 
    // --------------------------------------------------------------------
 
    /**
     * Hook used for processing variables specific to a layout
     *
     * @access  public
     * @param   array   variables for the view
     * @return  array
     */
    function pre_process($vars)
    {
        $this->load->model('core_model'); 
        return $vars;
    }
 
}

 ?>

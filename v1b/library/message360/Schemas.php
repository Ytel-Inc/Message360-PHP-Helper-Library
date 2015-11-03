<?php

/** @see Message360_Exception **/
require_once 'Exception.php';

/**
 * 
 * Message360 Schemas file. With this file schemas/message360.json will be imported
 * 
 * --------------------------------------------------------------------------------
 */
 
class Message360_Schemas 
{
    
    /** Default location of the message360.json schema file  */
    CONST MESSAGE360_SCHEMA_FILE = '/schemas/message360.json';
    
    /**
     * Storage of message360.json schema data 
     * 
     * @var array|null
     */
    protected static $_schemaData = null;
    
    /**
     * Schemas singleton instance container 
     * 
     * @var self|null
     */
    protected static $_instance   = null;
    

    /**
     * Get singleton instance of Schemas object
     * 
     * @return self 
     */
    static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new self();
            self::$_instance-> loadSchema();
        }
        return self::$_instance;
    }
    
    
    /**
     * This method will load internal message360.json schema in case it's not being loaded
     * 
     * @throws Message360_Exception 
     * @return void
     */
    public function loadSchema() {
        if(is_null(self::$_schemaData)) {
            $schema_file = realpath(dirname(dirname(dirname(__FILE__)))) . self::MESSAGE360_SCHEMA_FILE;
            $json_schema = file_get_contents($schema_file);

            $error = ''; 

            $result = json_decode(trim($json_schema), false);
            

            if (version_compare(PHP_VERSION, '5.3.0') >= 0) {

                switch(json_last_error()) {
                    case JSON_ERROR_DEPTH:
                        $error =  ' - Maximum stack depth exceeded';
                        break;
                    case JSON_ERROR_CTRL_CHAR:
                        $error = ' - Unexpected control character found';
                        break;
                    case JSON_ERROR_STATE_MISMATCH:
                        $error  = ' - Invalid or Malformed JSON';
                        break;
                    case JSON_ERROR_SYNTAX:
                        $error = ' - Syntax error, malformed JSON';
                        break;
                    case JSON_ERROR_NONE:
                    default:
                        $error = '';              
                }

            }

            if (!empty($error)) throw new Message360_Exception('JSON SCHEMA Error: '.$error);
            self::$_schemaData = $result;
        }
    }
    
    
    /**
     * Is current component name part of Message360 REST API
     * 
     * @param  string $component_name
     * @return bool
     */
    public function isRestComponent($component_name) {
        if(!isset(self::$_schemaData->rest_api->components)) return false;
        return array_key_exists($component_name, self::$_schemaData->rest_api->components) ? true : false;
    }
    
    /**
     * Converts a short name to a relative Message360 REST API URI
     * Example: sms_messages -> SMS/Messages
     * 
     * @param  string $component_name
     * @return mixed
     */
    public function getRestComponentName($component_name) {
        if(!isset(self::$_schemaData->rest_api->components)) return null;
        return self::$_schemaData->rest_api->components->$component_name;
    }
    
    
    /**
     * Get all available Message360 REST API components
     * 
     * @return stdClass|null
     */
    public function getAvailableRestComponents() {
        if(!isset(self::$_schemaData->rest_api->components)) return null;
        return self::$_schemaData->rest_api->components;
    }
    
    /**
     * Check whenever attribute is or is not in paging property
     * Used to extract paging properties from the rest of the properties
     * 
     * @param  string $paging_property
     * @return bool|null 
     */
    public function isPagingProperty($paging_property) {
        if(!isset(self::$_schemaData->rest_api->pagination)) return null;
        return in_array($paging_property, self::$_schemaData->rest_api->pagination) ? true : false;
    }
    
    
    /**
     * Get all available paging properties 
     * 
     * @return array
     */
    public function getPagingProperties() {
        if(!isset(self::$_schemaData->rest_api->pagination)) return array();
        return (array) self::$_schemaData->rest_api->pagination;
    }
    
    
    /**
     * Is current string part of verb dictionary
     * 
     * @param  string $verb
     * @return boolean 
     */
    public function isVerb($verb) {
        if(!isset(self::$_schemaData->inboundxml->verbs)) return array();
        return array_key_exists(ucfirst($verb), self::$_schemaData->inboundxml->verbs) ? true : false;
    }
    
    
    /**
     * List of all available InboundXML verbs
     * 
     * @return array
     */
    public function getAvailableVerbs() {
        if(!isset(self::$_schemaData->inboundxml->verbs)) return array();
        return array_keys((array)self::$_schemaData->inboundxml->verbs);
    }
    
    
    /**
     * Is nesting of current verb allowed inside of root element
     * 
     * @param  string  $root_element
     * @param  string  $next_element
     * @return boolean 
     */
    public function isNestingAllowed($root_element, $next_element) {
        if(!isset(self::$_schemaData->inboundxml->verbs->$root_element)) return false;
        return in_array(ucfirst($next_element), self::$_schemaData->inboundxml->verbs->$root_element->nesting) ? true : false;
    }
    
    /**
     * Get all nestable InboundXML elements by parent element. Some InboundXML elements can be nested inside
     * others, such as <Gather><Say>Enter your PIN</Say></Gather>
     * 
     * @param  string $verb
     * @return array 
     */
    public function getNestableByVerbs($verb) {
        if(!isset(self::$_schemaData->inboundxml->verbs->$verb)) return array();
        return self::$_schemaData->inboundxml->verbs->$verb->nesting;
    }
    
    
    /**
     * Get all available verb attributes
     * 
     * @param  string $verb
     * @return array 
     */
    public function getAvailableAttributes($verb) {
        if(!isset(self::$_schemaData->inboundxml->verbs->$verb->attributes)) return array();
        return self::$_schemaData->inboundxml->verbs->$verb->attributes;
    }
    
    /**
     * Check if an attribute name is valid for a InboundXML element
     * 
     * @param  string  $attribute
     * @param  string  $verb
     * @return boolean 
     */
    public function isValidAttribute($attribute, $verb) {
        $verb = ucfirst($verb);
        if(!isset(self::$_schemaData->inboundxml->verbs->$verb->attributes)) return false;
        return in_array($attribute, self::$_schemaData->inboundxml->verbs->$verb->attributes) ? true : false;
    }
}

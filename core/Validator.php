<?php


namespace App\Core;

class Validator {

    const AVAILABLE_RULES = [
        'required',
        'max',
        'min',
        'email',
        'password',
        'sameAs',
        'unique'
    ];

    const ERROR_MESSAGES = [
        'required'  => ':name must not be empty',
        'max'       => ':name must not be longer than :argument characters',
        'min'       => ':name must be at least :argument characters',
        'email'     => ':name must be a valid email address',
        'password'  => ':name must contain at least 1 digit, uppercase, special character and must be at least 8 characters long',
        'sameAs'    => ':name must be the same as :argument',
        'unique'    => ':name is already taken'
    ];

    /**
     * This method runs whenever you create new 
     * object from this class e.g. $validator = new Validator()
     */
    public function __construct($fields) 
    {
        $this->fields = $fields;
        $this->errors = [];
        $this->passes = true;

        $this->validate();
    }

    private function validate() 
    {
        foreach($this->fields as $name => $field) {
            foreach(explode('|', $field['rules']) as $rule) {

                //check if rule contains an argument e.g. min:255
                if (strpos($rule, ':') !== false) {
                    $rule = explode(':', $rule);
                    $argument = $rule[1];
                    $rule = $rule[0];
                }

                //check if rule is available
                if (in_array($rule, self::AVAILABLE_RULES) === false) {
                    throw new \Exception("Rule '$rule' is not available");
                }
               
                //this creates the name of the method from the rule name e.g. validate + the name of the rule
               $rule_validates = $this->{'validate'.ucfirst($rule)}($field['value'], $argument ?? null);
               if ($rule_validates === false) {
                   $this->passes = false;

                   //store error in the validator errors
                   if (isset($this->errors[$name]) === false) {
                        $this->errors[$name] = [];
                   }
                   array_push($this->errors[$name], $this->getErrorMessage($rule, $name, $argument ?? null));
               }
            }
        }
    } 

    /**
     * Value must be non-empty string after whitespace is removed
     */
    private function validateRequired($value) {
        //trim removes whitespace, tabs, newlines
        if (strlen(trim($value)) === 0) {
            return false;
        }

        return true;
    }

    /**
     * Value must not be longer than the maximum value argument provided
     */
    private function validateMax($value, $argument) {
        if (strlen(trim($value)) <= intval($argument)) {
            return true;
        }
        
        return false;
    }

    /**
     * Value must be longer than the minimum argument value
     */

    private function validateMin($value, $argument) {
        if(strlen(trim($value)) >= intval($argument)) {
            return true;
        }

        return false;
    }

    private function validateEmail($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    private function validatePassword($value) {
        //must have at least:
        // - 1 special charters
        // - 1 digit 
        // - 1 capital
        //must be minimum 8 characters long
        $uppercase          = preg_match('@[A-Z]@', $value);
        $number             = preg_match('@[0-9]@', $value);
        $special_character  = preg_match('@[\W]@', $value);

        if ($uppercase && $number && $special_character && strlen($value) >= 8) {
            return true;
        }

        return false;
    }

    /**
     * Value must be the same as the value under name provided in argument
     */

     private function validateSameAs($value, $argument) {
        if($value === $this->fields[$argument]['value']) {
            return true;
        }

        return false;
     }

     private function validateUnique($value, $argument) { 
        $arguments = explode(',', $argument);
        
        $table = $arguments[0];
        $column = $arguments[1];

        $existing_records = App::get('database')->selectWhere($table, [$column => $value]);

        if (count($existing_records) ===  0) {
            return true;
        }

        return false;
     }

    private function getErrorMessage($rule, $name, $argument) {
        $message = self::ERROR_MESSAGES[$rule];
        $name = ucfirst(str_replace('_', ' ', $name));
        $message = str_replace(':name', $name, $message);
        $message = str_replace(':argument', $argument, $message);
        return $message;
    }
}
<?php
 
class DateValidator extends Illuminate\Validation\Validator
{
 
    /**
     * Validate the date is before a given date.
     *
     * @param  string  $attribute
     * @param  mixed   $value
     * @param  array   $parameters
     * @return bool
     */
    protected function validateBefore($attribute, $value, $parameters)
    {
 
        $value_to_compare = $parameters[0];
  
        return ( strtotime( $value ) < strtotime( $value_to_compare ) );
 
    }//validate_before
 
    /**
     * Validate the date is after a given date.
     *
     * @param  string  $attribute
     * @param  mixed   $value
     * @param  array   $parameters
     * @return bool
     */
    protected function validateAfter($attribute, $value, $parameters)
    {
        /*
         * If a input with the name equal to the value we compare with, we
         * use it, otherwise we proceed as usual
         */
 
        if( isset( $this->attributes[ $parameters[0] ] ) )
        {
 
            $value_to_compare = $this->attributes[ $parameters[0] ];
 
        }//if we have an input with this name
        else
        {
 
            $value_to_compare = $parameters[0];
 
        }//we compare with the provided value
 
        return ( strtotime( $value ) > strtotime( $value_to_compare ) );
 
    }//validate_after
 
}
<?php
class Timepicker {
    
    public static function from($errors,$from,$i)
    {       
        $str = '';
        
        if($errors && $errors->has('from'))
            $str .= "<div class='control-group error'>";
        else
            $str .= "<div class='control-group required'>";
    
        $str .= Former::label(trans('general.from').':','from')->class('control-label')->for('datetimepick'.$i);
        $str .= "<div class='controls'>
         <div id='datetimepick{$i}' class='input-append date dtp'>
             <input data-format='hh:mm' type='text' name='from' value='". (is_null($from) ?: substr($from,0,-3)) ."' class='input-small' ></input>
            <span class='add-on'>
               <i data-time-icon='icon-time' data-date-icon='icon-calendar'></i>
            </span>
        </div>";

        if($errors && $errors->has('from'))
        {
            $str .= "<span class='help-inline'>" . $errors->first('from') . "</span>";
        }

     $str .= "</div>
        </div>";

    return $str;

    }

    public static function to($errors,$from,$i)
    {    
        $str = '';
        
        if($errors && $errors->has('to'))
            $str .= "<div class='control-group error'>";
        else
            $str .= "<div class='control-group required'>";
    
        $str .= Former::label(trans('general.to').':','to')->class('control-label')->for('datetimepick'.$i);
        $str .= "<div class='controls'>
         <div id='datetimepick{$i}' class='input-append date dtp'>
             <input data-format='hh:mm' type='text' name='to' value='". (is_null($from) ?: substr($from,0,-3)) ."' class='input-small' ></input>
            <span class='add-on'>
               <i data-time-icon='icon-time' data-date-icon='icon-calendar'></i>
            </span>
        </div>";

        if($errors && $errors->has('to'))
        {
            $str .= "<span class='help-inline'>" . $errors->first('to') . "</span>";
        }

     $str .= "</div>
        </div>";

    return $str;

    }

}
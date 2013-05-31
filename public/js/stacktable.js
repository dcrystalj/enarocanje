/**
 * stacktable.js
 * Author & copyright (c) 2012: John Polacek
 * Dual MIT & GPL license
 *
 * Page: http://johnpolacek.github.com/stacktable.js
 * Repo: https://github.com/johnpolacek/stacktable.js/
 *
 * jQuery plugin for stacking tables on small screens
 *
 */
;(function($) {

  $.fn.stacktable = function(options) {
    var $tables = this,
        defaults = {id:'stacktable',hideOriginal:false},
        settings = $.extend({}, defaults, options),
        stacktable;

    return $tables.each(function() {
      var $stacktable = $('<table id="'+settings.id+'" class="table-hover"><tbody></tbody></table>');
      if (typeof settings.myClass !== undefined) $stacktable.addClass(settings.myClass);
      var markup = '';
      $table = $(this);
      $topRow = $table.find('tr').eq(0);
      $table.find('tr').each(function(index,value) {
        markup += '<table class="mobiletable mobiletable-hover"><tr>';
        // for the first row, top left table cell is the head of the table
        if (index===0) {
          //markup += '<tr><th class="st-head-row st-head-row-main">'+$(this).find('th,td').eq(0).html()+'</th></tr>';
        }
        // for the other rows, put the left table cell as the head for that row
        // then iterate through the key/values
        else {
          $(this).find('td').each(function(index,value) {
            if (index===0) {
              markup += '<tr><th class="st-head-row">'+$(this).html()+'</th><th></th></tr>';
            } else {
              if ($(this).html() !== ''){
                markup += '<tr>';
                if ($topRow.find('td,th').eq(index).html()){
                  markup += '<td class="st-key">'+$topRow.find('td,th').eq(index).html()+'</td>';
                } else {
                  markup += '<td colspan="2" class="st-val-whole">'+$(this).html()+'</td>';
                   markup +=  '</tr>';
                  return;

                }
                markup += '<td class="st-val">'+$(this).html()+'</td>';
                markup += '</tr>';
              }
            }
          });
          markup += '<tr style="line-height: 5px"><td>&nbsp</td><td>&nbsp</td></tr></table>';
        }
      });
      $stacktable.append($(markup));
      $table.before($stacktable);
      if (settings.hideOriginal) $table.hide();
    });
  };

}(jQuery));

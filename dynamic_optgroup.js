  
$( document ).ready(function() {
    console.log( "ready!" );
    var mid= $("#123"); // Replace id of your select box and make sure that your option contain same values where you need optgroup.
        var dm_values = [];
        var dm_multi_values = [];
        $(mid).find("option").each(function() { 
            var dm_text = $(this).attr('value');
            $(this).attr('class', dm_text);
            var check_value = dm_values.indexOf(dm_text);
            var check_value_2 = dm_multi_values.indexOf(dm_text);
            if( check_value == -1){
                dm_values.push( dm_text );   
            }else{
                if(check_value_2 == -1) dm_multi_values.push( dm_text );   
            }
        });  
        $(mid).find("optgroup").remove();
        $.each(dm_multi_values, function( index, value ) {                 
            $(mid).find("."+value).wrapAll('<optgroup label='+value+'></optgroup>');
        });
});

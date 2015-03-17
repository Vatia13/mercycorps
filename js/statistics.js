/**
 * Created by Home on 3/17/15.
 */
function addField(e){
    jQuery(e).parent('td').parent('tr').parent('tbody').append('<tr><th></th><td><input type="file" name="img[]"/></td><td><a onclick="deleteField(this);" class="btn btn-danger">Remove</a></td></tr>');
}

function deleteField(e){
    jQuery(e).parent('td').parent('tr').remove();
}
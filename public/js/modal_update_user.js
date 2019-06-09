/*$(function carga_ajax()
{
	function(e)
	{
	  	e.preventDefault();
	    var id = $(this).attr('id');
	    $(".ids").html(id);
	    $("#modal-id").modal('show');
 	}
})
function carga_ajax(id,div,url)
{
	// alert(ruta);
	$.post(url,{id:id},
		function(resp)
		{
			$("#"+div+"").html(resp)
		}
	);
}
*/
$(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
		var id_user=$('#id_user'+id).text();
		var user=$('#user'+id).text();
		var pass=$('#pass'+id).text();
	
		$('#edit').modal('show');
		$('#eid_user').val(id_user);
		$('#euser').val(user);
		$('#epass').val(pass);
	});
});


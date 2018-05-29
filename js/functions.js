$(function(){

	// Lista de Continentes
	$.post( 'continentes.php' ).done( function(respuesta)
	{
		$( '#continentes' ).html( respuesta );
	});

	// lista de Paises	
	$('#continentes').change(function()
	{
		var el_continente = $(this).val();
		
		// Lista de Paises
		$.post( 'paises.php', { continente: el_continente} ).done( function( respuesta )
		{
			$( '#paises' ).html( respuesta );
		});
	});

})

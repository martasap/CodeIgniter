/*
* Funcion para crear el thead de una tabla con el resultado de la clase dataTable
* De igniter. 
* @author Manuel Ciriaco
*/
function getThead(theads) {
    var th = theads.split(',');
    $html = "<tr>";
    for ( var i in th ) {
        $html += "<th>" + th[i] + "</th>";
    }
    $html += "</tr>";
    return $html;
}

/*
* Funcion para crear el thead de una tabla con el resultado de la clase dataTable
* De igniter. 
* @author Manuel Ciriaco
*/
function getTBody(tbody) {
    $html = "<tr>";
    for ( var i in tbody ) {
        $html += "<td>" + tbody[i] + "</td>";
    }
    $html += "</tr>";
    return $html;
}

/*
* Funcion que crea una tabla con el resultado de la clase dataTable de igniter. 
* @author Manuel Ciriaco
*
*/
function fillTable(base_url, tblname) {
    $.ajax({
        url: base_url,
        type: 'POST',
        data: {param: 'static'},
        success: function(response) {
            //Parseamos el json y lo asignamos a una variable
            $data = jQuery.parseJSON(response);
            //hacemos una llamada a getThead y el resultado, lo colocamos en 
            //el thead de la tabla pasada por parametros. 
            $( '#' + tblname + ' thead' ).html( getThead( $data.sColumns ) );
            $html = "";
            /* Por cada resultado adjunto a el arreglo de datatable aaData, crearemos un 
            nuevo TR y lo asignamos a una variable ($html) */
            for ( var x  in $data.aaData ) {
                $html += getTBody($data.aaData[x]);
            }
            /* Al finalizar el bucle tendremos todos los rows convertidos en tr, 
            ahora lo colocamos en el tbody de la tabla ya creada */
            $( '#' + tblname + ' tbody' ).html($html);
        }
    }); 
}
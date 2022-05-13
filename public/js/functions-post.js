$(document).ready( function() {
    $("#name").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
    });

    // Escuchando cualquier cambio que se realice al input #file
    document.getElementById('file').addEventListener('change', cambiarImagen);
});

/**
 * It takes the file from the input, reads it, and then sets the src attribute of the image to the
 * result of the read
 * @param event - The event object is a JavaScript event that is sent to an element when an event
 * occurs on the element.
 */
function cambiarImagen(event){

    const file = event.target.files[0];

    const reader = new FileReader();
    reader.onload = (event) => {
        document.getElementById('img-post').setAttribute('src', event.target.result);
        
        // Capturamos el nombre del archivo
        fileName = this.files[0].name;
        
        // Cambiamos el contido del label por el nombre del archivo capturado en la variable fileName
        const changeName = document.getElementById('fileLabel').innerHTML = fileName;
    };

    reader.readAsDataURL(file);
}

ClassicEditor
    .create( document.querySelector( '#extract' ) )
    .catch( error => {
        console.error( error );
    } );

ClassicEditor
    .create( document.querySelector( '#body' ) )
    .catch( error => {
        console.error( error );
    } );
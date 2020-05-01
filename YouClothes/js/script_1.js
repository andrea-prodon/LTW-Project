function caricaDocumento(evento){
    var richiesta = new XMLHttpRequest();
    richiesta.onreadystatechange = gestisciRisposta;
    richiesta.open("GET",'paginaAnnunci.html',true); //carica prova.html nella parte di testo che decido di modificare che sarebbe ciò che c'è dentro "parteDinamica"
    richiesta.send(null);
}

function gestisciRisposta(evento){
    if(evento.target.readyState == 4 && evento.target.status==200){ //sto dicendo se è pronto quindi hai richiesto una cosa che esiste
        //in document.getId(partedinamica).innerHtml --> richiamo ciò che sta dentro il tag con id=parteDinamica (DIOCAGNACCIO)
        //e la modifico a mio piacimento. In questo caso con 'e.target.responseText' sostituisco l'inner con l'inner dell'evento che ha chiamato questa funzione
        document.getElementById("parteDinamica").innerHTML = evento.target.responseText;
    }
}
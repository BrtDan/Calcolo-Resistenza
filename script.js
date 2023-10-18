function check() {

    let f1 = document.getElementById('f1').value;
    let f2 = document.getElementById('f2').value;
    let molt = document.getElementById('molt').value;
    let toll = document.getElementById('toll').value;

    if (f1 == "#") {
        alert("Seleziona prima fascia");
        return;
    }
    if (f2 == "#") {
        alert("Seleziona seconda fascia");
        return;
    }
    if (molt == "#") {
        alert("Seleziona moltiplicatore");
        return;
    }
    if(toll == "#"){
        alert("Seleziona tolleranza")
        return;
    }
}
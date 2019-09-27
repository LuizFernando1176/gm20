function mostrarAlerta(indice) {
    var divAlerta = document.getElementById('divAlerta');
    divAlerta.style.display = "block;";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            divAlerta.innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", "../util/alertas.php?indice=" + indice, true);
    xhttp.send();

    //para o alert de login.php funcionar
    if (divAlerta.innerHTML === "") {
        var xhttp1 = new XMLHttpRequest();
        xhttp1.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                divAlerta.innerHTML = this.responseText;
            }
        };

        xhttp1.open("GET", "./util/alertas.php?indice=" + indice, true);
        xhttp1.send();
    }
    $(document).ready(function () {
        $(divAlerta).fadeIn(1000);
        $(divAlerta).fadeOut(25000);
    });
}

function semaforo() {
  fetch('/backend.php?tiempo=' + new Date().getTime())
  .then(function(response) {
    return response.json();
  })
  .then(function(semaforo) {
    document.getElementById('semaforo').src = "/imagenes/" + semaforo.color.toLowerCase() + ".svg";
  });
}

setInterval(semaforo, 500);

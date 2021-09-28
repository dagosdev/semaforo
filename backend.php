<?php

class Semaforo {
    protected $tiempo;
    protected $intermitente;

    public function __construct(string $color) {
      $this->intermitente = 0;
      $color = strtolower($color);
      if ($color == "rojo"){
        $this->tiempo = 0;
      }
      elseif ($color == "rojo - amarillo"){
        $this->tiempo = 31;
      }
      elseif ($color == "verde"){
        $this->tiempo = 52;
      }
      elseif ($color == "amarillo"){
        $this->tiempo = 53;
      }
      else{
        throw new Exception("$color es un color no valido. (Rojo, Rojo - Amarillo, Verde, Amarillo)");
      }
    }

    public function ponerEnIntermitente() : void {
        $this->intermitente = TRUE;
    }

    public function sacarDelIntermitente() : void {
        $this->intermitente = FALSE;
    }

    public function pasoDelTiempo(int $tiempo) : void {
        $this->tiempo = $this->tiempo + $tiempo;
    }

    public function mostrarColor() : string {
      if ($this->intermitente) {
        if ($this->tiempo % 2 == 0) {
          return "Amarillo";
        }
        return "Apagado";
      }

      $this->tiempo = $this->tiempo % 500;
      while ($this->tiempo > 54) {
        $this->tiempo = $this->tiempo - 54;
      }
      if ($this->tiempo < 31) {
        return "Rojo";
      }
      if ($this->tiempo < 33) {
        return "Rojo - Amarillo";
      }
      if ($this->tiempo < 53) {
        return "Verde";
      }
      return "Amarillo";
    }
}


function uno() {
  dos();
}
function dos() {
  tres();
}

function tres() {
  $mysemaforo = new Semaforo("verde");
  $mysemaforo->pasoDelTiempo($_GET['tiempo']);
  $color = [
    'color' => $mysemaforo->mostrarColor()
  ];

  header('Content-Type: application/json; charset=utf-8');
  print json_encode($color);

}



uno();

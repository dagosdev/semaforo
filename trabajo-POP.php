<?php
// Your code here!
class Semaforo {
    protected $tiempo;
    protected $color;
    protected $intermitente;
    
    public function __construct(string $color) {
        $this->intermitente = 0;
        $this->color = $color;
        if ($this->color == "Rojo"){
            $this->tiempo = 0;
        }
        elseif ($this->color == "Rojo - Amarillo"){
            $this->tiempo = 31;
        }
        elseif ($this->color == "Verde"){
            $this->tiempo = 52;
        }
        elseif ($this->color == "Amarillo"){
            $this->tiempo = 53;
        }
        else{
            return print("No valido. (Rojo, Rojo - Amarillo, Verde, Amarillo)");
        }
    }
    
    public function ponerEnIntermitente(){
        $this->intermitente = 1;
    }
    
    public function sacarDelIntermitente(){
        $this->intermitente = 0;
    }
    
    public function pasoDelTiempo($tiempo){
        $this->tiempo = $this->tiempo + $tiempo;
    }
    
    public function mostrarColor(){
        if ($this->intermitente == 1){
            if ($this->tiempo % 2 == 0){
                return $this->color = "Amarillo";
            }
            else{
                return $this->color = "Apagado";}
        }
        else{
            while ($this->tiempo > 54){
                $this->tiempo = $this->tiempo - 54;
            }
            if ($this->tiempo >= 0 and $this->tiempo < 31){
                return $this->color = "Rojo";
            }
            elseif ($this->tiempo > 30 and $this->tiempo < 33){
                return $this->color = "Rojo - Amarillo";
            }
            elseif ($this->tiempo > 32 and $this->tiempo < 53){
                return $this->color = "Verde";
            }
            elseif ($this->tiempo > 52){
                return $this->color = "Amarillo";
            }
        
        }
    }
}
    
$mysemaforo = new Semaforo("Verde");
//$mysemaforo->ponerEnIntermitente();
$mysemaforo->sacarDelIntermitente();
$mysemaforo->pasoDelTiempo(50);
print($mysemaforo->mostrarColor());
?>

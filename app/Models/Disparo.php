<?php

class Disparo {
    private $storageFile;

    public function __construct() {
        $this->storageFile = BASE_PATH . '/storage/disparos.json';
        if (!file_exists($this->storageFile)) {
            if (!is_dir(dirname($this->storageFile))) mkdir(dirname($this->storageFile), 0777, true);
            file_put_contents($this->storageFile, json_encode([]));
        }
    }

    // Registra que um disparo foi feito agora
    public function registrar() {
        $disparos = json_decode(file_get_contents($this->storageFile), true) ?? [];
        $disparos[] = [
            'data_disparo' => date('Y-m-d H:i:s')
        ];
        file_put_contents($this->storageFile, json_encode($disparos));
    }

    // Conta quantos disparos aconteceram em um dia específico
    public function contarPorDia($dataFiltro) {
        $disparos = json_decode(file_get_contents($this->storageFile), true) ?? [];
        $contador = 0;
        foreach ($disparos as $d) {
            // Verifica se a data do disparo começa com a data do filtro (Ex: "2026-03-30")
            if (strpos($d['data_disparo'], $dataFiltro) === 0) {
                $contador++;
            }
        }
        return $contador;
    }
}
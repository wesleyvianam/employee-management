<?php 

namespace Dzenvolve\Test\Helper;

class Pagina
{
    private int $paginas;

    public function __construct(
        private int $resultados,    
        private int $paginaAtual = 1,
        private int $limite = 10,
    ) {  
        $this->calcula();
    }

    private function calcula()
    {
        $this->paginas = $this->resultados > 0 ? ceil($this->resultados / $this->limite) : 1;
        $this->paginaAtual = $this->paginaAtual <= $this->paginas ? $this->paginaAtual : $this->paginas;
    }

    public function obterLimite()
    {
        $offset = ($this->limite * ($this->paginaAtual - 1));
        if ($offset < 0) {
            $offset = 0;
        }
        return ' LIMIT '.$offset.','.$this->limite;
    }

    public function obterPaginas(): array
    {
        if ($this->paginas == 1) return [];
        $totalPaginas = [];
        for ($i = 1;$i <= $this->paginas; $i++) {
            $totalPaginas[] = [
                'pagina' => $i,
                'atual' => $i ==  $this->paginaAtual
            ];
        }
        return $totalPaginas;
    }
}
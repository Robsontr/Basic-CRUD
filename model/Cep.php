<?php

class Cep
{

    private $cep;

    private $logradouro;

    private $complemento;

    private $unidade;

    private $bairro;

    private $localidade;

    private $uf;

    private $estado;

    private $regiao;

    private $ibge;

    private $gia;

    private $ddd;

    private $isiafibge;


    public function setCep($cep)
    {

        $this->cep = $cep;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setLogradouro($logradouro)
    {

        $this->logradouro = $logradouro;
    }

    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function setComplemento($complemento)
    {

        $this->complemento = $complemento;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setUnidade($unidade)
    {

        $this->unidade = $unidade;
    }

    public function getUnidadep()
    {
        return $this->unidade;
    }

    public function setBairro($bairro)
    {

        $this->bairro = $bairro;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setLocalidade($localidade)
    {

        $this->localidade = $localidade;
    }

    public function getLocalidade()
    {
        return $this->localidade;
    }

    public function setUf($uf)
    {

        $this->uf = $uf;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function setEstado($estado)
    {

        $this->estado = $estado;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setRegiao($regiao)
    {

        $this->regiao = $regiao;
    }

    public function getRegiao()
    {
        return $this->regiao;
    }

    public function setIbge($ibge)
    {

        $this->ibge = $ibge;
    }

    public function getIbge()
    {
        return $this->ibge;
    }

    public function setGia($gia)
    {

        $this->gia = $gia;
    }

    public function getGia()
    {
        return $this->gia;
    }

    public function setDdd($ddd)
    {

        $this->ddd = $ddd;
    }

    public function getDdd()
    {
        return $this->ddd;
    }

    public function setIsiafibge($isiafibge)
    {

        $this->isiafibge = $isiafibge;
    }

    public function getIsiafibge()
    {
        return $this->isiafibge;
    }
}

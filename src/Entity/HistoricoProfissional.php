<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HistoricoProfissionalRepository")
 * @ORM\Table(name="historicos_profissional")
 */
class HistoricoProfissional
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $nome_empresa;

    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    private $data_entrada;

    /**
     * @var \DateTime
     * @ORM\Column(type="date", nullable=true)
     * @Assert\Date()
     * @Assert\Expression(
     *     "this.isEmpregoAtual() == true && value == '' || this.isEmpregoAtual() == false && value != ''    ",
     *     message="Se for seu emprego atual, o campo data saída deve ser vazio."
     * )
     */
    private $data_saida;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $emprego_atual = false;

    /**
     * @var Candidato
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Candidato", inversedBy="historico")
     */
    private $candidato;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNomeEmpresa()
    {
        return $this->nome_empresa;
    }

    /**
     * @param string $nome_empresa
     * @return HistoricoProfissional
     */
    public function setNomeEmpresa($nome_empresa)
    {
        $this->nome_empresa = $nome_empresa;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataEntrada()
    {
        return $this->data_entrada;
    }

    /**
     * @param \DateTime $data_entrada
     * @return HistoricoProfissional
     */
    public function setDataEntrada($data_entrada)
    {
        $this->data_entrada = $data_entrada;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataSaida()
    {
        return $this->data_saida;
    }

    /**
     * @param \DateTime $data_saida
     * @return HistoricoProfissional
     */
    public function setDataSaida($data_saida)
    {
        $this->data_saida = $data_saida;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEmpregoAtual()
    {
        return $this->emprego_atual;
    }

    /**
     * @param bool $emprego_atual
     * @return HistoricoProfissional
     */
    public function setEmpregoAtual($emprego_atual)
    {
        $this->emprego_atual = $emprego_atual;
        return $this;
    }

    /**
     * @return Candidato
     */
    public function getCandidato()
    {
        return $this->candidato;
    }

    /**
     * @param Candidato $candidato
     * @return HistoricoProfissional
     */
    public function setCandidato($candidato)
    {
        $this->candidato = $candidato;
        return $this;
    }



}

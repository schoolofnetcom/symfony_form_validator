<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\Constraints as SoNPass;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CandidatoRepository")
 * @ORM\Table(name="candidatos")
 */
class Candidato
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
    private $nome;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Assert\Range(min="0", max="120")
     */
    private $idade;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=1)
     * @Assert\NotBlank()
     * @Assert\Choice(choices={"M", "F"})
     */
    private $sexo;

    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    private $data_nascimento;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal", precision=2, length=10)
     * @Assert\NotBlank()
     * @Assert\Range(min="0", max="10000000")
     */
    private $pretensao_salarial;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\File(mimeTypes={"image/png", "image/jpg"})
     */
    private $foto;

    /**
     * @var Cargo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Cargo")
     * @Assert\NotBlank()
     */
    private $cargo;

    /**
     * @var Endereco
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Endereco", cascade={"persist"})
     * @Assert\Valid()
     */
    private $endereco;

    /**
     * @var HistoricoProfissional
     * @ORM\OneToMany(targetEntity="App\Entity\HistoricoProfissional", mappedBy="candidato")
     * @Assert\Valid()
     */
    private $historico;

    /**
     * @var Tecnologia
     * @ORM\ManyToMany(targetEntity="App\Entity\Tecnologia", inversedBy="candidatos")
     * @ORM\JoinTable(name="candidatos_tecnologias")
     * @Assert\Count(min="3", max="10")
     */
    private $tecnologias;

    /**
     * @var string
     *
     * @\App\Validator\SonPass()
     */
    private $palavra_magica;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     * @return Candidato
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdade()
    {
        return $this->idade;
    }

    /**
     * @param mixed $idade
     * @return Candidato
     */
    public function setIdade($idade)
    {
        $this->idade = $idade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     * @return Candidato
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    /**
     * @param mixed $data_nascimento
     * @return Candidato
     */
    public function setDataNascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPretensaoSalarial()
    {
        return $this->pretensao_salarial;
    }

    /**
     * @param mixed $pretensao_salarial
     * @return Candidato
     */
    public function setPretensaoSalarial($pretensao_salarial)
    {
        $this->pretensao_salarial = $pretensao_salarial;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     * @return Candidato
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
        return $this;
    }

    /**
     * @return Cargo
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param Cargo $cargo
     * @return Candidato
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
        return $this;
    }

    /**
     * @return Endereco
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param Endereco $endereco
     * @return Candidato
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return HistoricoProfissional
     */
    public function getHistorico()
    {
        return $this->historico;
    }

    /**
     * @param HistoricoProfissional $historico
     * @return Candidato
     */
    public function setHistorico($historico)
    {
        $this->historico = $historico;
        return $this;
    }

    /**
     * @return Tecnologia
     */
    public function getTecnologias()
    {
        return $this->tecnologias;
    }

    /**
     * @param Tecnologia $tecnologias
     * @return Candidato
     */
    public function setTecnologias($tecnologias)
    {
        $this->tecnologias = $tecnologias;
        return $this;
    }

    /**
     * @return string
     */
    public function getPalavraMagica()
    {
        return $this->palavra_magica;
    }

    /**
     * @param string $palavra_magica
     * @return Candidato
     */
    public function setPalavraMagica($palavra_magica)
    {
        $this->palavra_magica = $palavra_magica;
        return $this;
    }




}

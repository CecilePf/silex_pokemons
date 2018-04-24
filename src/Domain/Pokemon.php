<?php

// Création du sous namespace Domain dans le namespace MicroCMS
namespace MicroCMS\Domain;
//echo __NAMESPACE__;
class Pokemon
{
    /**
     * Article id.
     *
     * @var integer
     */
    private $id;

    /**
     * Article title.
     *
     * @var string
     */
    private $title;

    /**
     * Article content.
     *
     * @var string
     */
    private $name;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getNameTrainer() {
        return $this->title;
    }

    public function setNameTrainer($title) {
        $this->title = $title;
        return $this;
    }

    public function setNamePokemon($name) {
        $this->name = $name;
        return $this;
    }

    public function getNamePokemon() {
        return $this->name;
    }

    public function setAttackPokemon($attack) {
        $this->attack = $attack;
        return $this;
    }

    public function getAttackPokemon() {
        return $this->attack;
    }

    public function setAttackDescPokemon($attackDesc) {
        $this->attackDesc = $attackDesc;
        return $this;
    }

    public function getAttackDescPokemon() {
        return $this->attackDesc;
    }

}
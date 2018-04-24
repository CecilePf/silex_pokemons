<?php
//Création du sous namespace DAO dans le namespace MicroCMS
namespace MicroCMS\DAO;

use MicroCMS\Domain\Pokemon;

class PokemonDAO extends DAO
{
    // **************************************  //
    // GET liste trainers avec leurs pokemons  //
    // **************************************  //
    public function findTrainersPokemons() {
        $sql = 'SELECT trainer.id, trainer.name, GROUP_CONCAT(DISTINCT pokemon.name SEPARATOR ", ") AS pokemon_name
                FROM trainer
                JOIN trainer_to_pokemon ON trainer_to_pokemon.id_trainer = trainer.id
                JOIN pokemon ON pokemon.id = trainer_to_pokemon.id_pokemon
                GROUP BY trainer.id';
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $pokemons = array();
        foreach ($result as $row) {
            $pokemonId = $row['id'];
            $pokemons[] = $this-> buildDomainObject($row);
        }
        return $pokemons;
    }

    // Instancie un objet Article à partir d'une ligne de résultat SQL
    protected function buildDomainObject(array $row) {
        $pokemon = new Pokemon();
        $pokemon->setId($row['id']);
        $pokemon->setNameTrainer($row['name']);
        $pokemon->setNamePokemon($row['pokemon_name']);
        return $pokemon;
    }

    // *******************   //
    // GET liste pokemons.  //
    // ******************* //
    public function findAll() {
        $sql = "SELECT * from pokemon";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $pokemons = array();
        foreach ($result as $row) {
            $pokemonId = $row['id'];
            $pokemons[$pokemonId] = $this->buildListe($row);
        }
        return $pokemons;
    }

    private function buildListe(array $row) {
        $pokemon = new Pokemon();
        $pokemon->setId($row['id']);
        $pokemon->setNamePokemon($row['name']);
        return $pokemon;
    }

    // ******************* //
    // GET attack pokemon. //
    // ******************* //
    public function find($pokemonId) {

        $sql = "SELECT attack.name, attack.desc
                FROM attack
                JOIN pokemon_to_attack ON attack.id = pokemon_to_attack.id_attack
                WHERE pokemon_to_attack.id_pokemon =?";
        $result = $this->getDb()->fetchAll($sql, array($pokemonId));
        $attacks = array();
        foreach ($result as $row) {
            $pokemonId = $pokemonId;
            $attacks[$pokemonId] = $this->buildAttack($row);
        }
        return $attacks;
    }

    private function buildAttack(array $row) {
        $pokemon = new Pokemon();
        $pokemon->setAttackDescPokemon($row['desc']);
        $pokemon->setAttackPokemon($row['name']);
        return $pokemon;
    }

}
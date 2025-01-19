<?php

abstract class Game
{
    protected $name;
    protected $hp;

    public function __construct($name, $hp)
    {
        $this->name = $name;
        $this->hp = $hp;
    }

    abstract function attack($charater);
    abstract function skillAttack($charater);
}

class Monster extends Game
{
    public function attack($charater)
    {
        if ($charater->hp > 0 && $charater->hp > 100) {
            $charater->hp -= 100;
        } else {
            $charater->hp = 0;
        }
    }

    public function skillAttack($charater)
    {
        if ($charater->hp > 0 && $charater->hp >= 500) {
            $charater->hp -= 500;
        } else {
            $charater->hp = 0;
        }
    }
}

class Character extends Game
{
    public $level = 1;
    public $exp = 0;

    public function __construct($name, $hp, $level, $exp)
    {
        parent::__construct($name, $hp);
        $this->level = $level;
        $this->exp = $exp;
    }
    public function attack($monster)
    {
        $att = 1000 * $this->level;
        if ($monster->hp > 0 && $monster->hp >= $att) {
            $monster->hp -= $att;
        } else {
            $monster->hp = 0;
        }
        $this->exp += 1;
    }
}

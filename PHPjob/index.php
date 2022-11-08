<?php 
        class Enemy {
            public $name;
            public $stamina;
            public $attack;
    
            public function __construct($name, $stamina = 100, $attack = 10) {
                $this->name = $name;
                $this->stamina = $stamina;
                $this->attack = $attack;
            }
    
            public function sayMyName() {
                echo $this->name.'があらわれた！';
            }

            public function powerUp(){
                $this->attack += 10;
                echo '攻撃力が'.$this->attack.'になった。';
            }
        }

        class Boss extends Enemy {
            public function sayMyName() {
                echo 'ボスの'.$this->name.'があらわれた！';
            }

            public function specialAttack(){
                echo '痛恨の一撃！';
            }
        }

        $boss = new Boss ('竜王');
        $boss->sayMyName();
        $boss->specialAttack();

        $slime = new Enemy('スライム');
        $slime->sayMyName();
        echo $slime->stamina;
        echo $slime->attack;
        $slime->powerUp();
        $slime->powerUp();
        $slime->powerUp();

        echo '<br>';

        $kuribo = new Enemy('クリボー', 200, 10);
        $kuribo->sayMyName();
        echo $kuribo->stamina;
        echo $kuribo->attack;
?>
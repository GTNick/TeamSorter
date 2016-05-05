<?php

namespace BoxOfDevs;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Server;

class TeamSorter extends PluginBase implements Listener{

    public function onEnable(){
        @mkdir($this->getDataFolder());
        $this->saveResource("data.yml");
        $data = new Config($this->getDataFolder . "data.yml", Config::YAML);
        $data->set("RedTeam", 0);
        $data->set("BlueTeam", 0);
        $data->save();
        $this->getLogger()->info("TeamSorter Enabled!");
        $this->getLogger()->info("Note: TeamSorter will not work without Teams Colour PVP by @KaitoDoDo");
    }

    public function onJoin(){
        $data = new Config($this->getDataFolder . "data.yml", Config::YAML);
        $red = $data->get("RedTeam");
        $blue = $data->get("BlueTeam");
        if($red = $blue){
            $data->set("RedTeam", $red + 1);
            $data->save();
        }elseif($red > $blue){
            $data->set("BlueTeam", $blue + 1);
            $data->save();
        }elseif($red < $blue){
            $data->set("RedTeam", $red + 1);
            $data->save();
        }
    }

    public function onDisable(){
        $this->getLogger()->info("TeamSorter Disabled!");
    }

}

?>
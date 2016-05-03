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
use pocketmine\Player;
use pocketmine\Server;

class TeamSorter extends PluginBase implements Listener{

    public function onEnable(){
        $this->getLogger()->info("TeamSorter Enabled!");
        $this->getLogger()->info("Note: TeamSorter will not work without Teams Colour PVP by @Kaito");
    }

    public function onJoin(){
     //onJoin() event
    }

    public function onDisable(){
        $this->getLogger()->info("TeamSorter Disabled!");
    }

}

?>
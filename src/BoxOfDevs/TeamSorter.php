<?php

namespace BoxOfDevs;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
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
        $this->getLogger()->info(TF::GREEN . "TeamSorter Enabled!");
    }

    public function onJoin(){
        $data = new Config($this->getDataFolder . "data.yml", Config::YAML);
        $red = $data->get("RedTeam");
        $blue = $data->get("BlueTeam");
        $player = $event->getPlayer();
        $name = $player->getName();
        $playername = $name;
        if($red = $blue){
            $event->setJoinMessage($name . "joined the" . TF::DARK_RED . "RED" . TF::WHITE . "team!");
            $player->setDisplayName(TF::DARK_RED . $name);
            array_push($redmembers, $playername);
            $data->set("RedTeam", $red + 1);
            $data->set("RedTeamMembers", $playername);
            $data->save();
        }elseif($red > $blue){
            $event->setJoinMessage($name . "joined the" . TF::AQUA . "BLUE" . TF::WHITE . "team!");
            $player->setDisplayName(TF::AQUA . $name);
            array_push($redmembers, $playername);
            $data->set("BlueTeam", $red + 1);
            $data->set("BlueTeamMembers", $playername);
            $data->save();
        }elseif($red < $blue){
            $event->setJoinMessage($name . "joined the" . TF::DARK_RED . "RED" . TF::WHITE . "team!");
            $player->setDisplayName(TF::DARK_RED . $name);
            array_push($redmembers, $playername);
            $data->set("RedTeam", $red + 1);
            $data->set("RedTeamMembers", $playername);
            $data->save();
        }
    }

    public function onDamage(EntityDamageEvent $event) {
        if($event instanceof EntityDamageByEntityEvent && $event->getDamager() instanceof Player){
            $player = $event->getPlayer();
            $playername = $player->getName();
            $attacker = $event->getDamager();
            $attackername = $attacker->getName();
            $data = new Config($this->getDataFolder . "data.yml", Config::YAML);
            $redteammembers = $data->get("RedTeamMembers");
            $blueteammembers = $data->get("BlueTeamMembers");
            foreach($redteammembers as $redteam){
                foreach($blueteammembers as $blueteam){
                    if($redteam === $playername && $attackername){
                        $event->setCancelled();
                    }elseif(!$redteam === $playername && $attackername){
                        return $event;
                    }
                    if($blueteam === $playername && $attackername){
                        $event->setCancelled();
                    }elseif(!$blueteam === $playername && $attackername){
                        return $event;
                    }
                }
            }
        }
    }

    public function onDisable(){
        $data = new Config($this->getDataFolder . "data.yml", Config::YAML);
        $data->set("RedTeam", 0);
        $data->set("BlueTeam", 0);
        $data->remove("RedTeamMembers");
        $data->remove("BlueTeamMembers");
        $data->save();
        $this->getLogger()->info(TF::DARK_RED . "TeamSorter Disabled!");
    }

}

?>
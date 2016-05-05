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
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\utils\Config;
use pocketmine\item\Item;
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

    public function onBoth(PlayerJoinEvent $joinevent && PlayerRespawnEvent $event){
        $data = new Config($this->getDataFolder . "data.yml", Config::YAML);
        $red = $data->get("RedTeam");
        $blue = $data->get("BlueTeam");
        $player = $event->getPlayer();
        $name = $player->getName();
        $playername = $name;
        if($red = $blue){
            $joinevent->setJoinMessage($name . "joined the" . TF::DARK_RED . "RED" . TF::WHITE . "team!");
            $player->setDisplayName(TF::DARK_RED . $name);
            $redhelmet = Item::get(298);
            $tempTag = new CompoundTag("", []);
            $tempTag->customColor = new IntTag("Red Helmet", 16711680);
            $redhelmet->setCompoundTag($tempTag);
            $player->getInventory()->setHelmet($redhelmet);
            $redchestplate = Item::get(299);
            $tempTag = new CompoundTag("", []);
            $tempTag->customColor = new IntTag("Red Chestplate", 16711680);
            $redchestplate->setCompoundTag($tempTag);
            $player->getInventory()->setChestplate($redchestplate);
            $redleggings = Item::get(300);
            $tempTag = new CompoundTag("", []);
            $tempTag->customColor = new IntTag("Red Leggings", 16711680);
            $redleggings->setCompoundTag($tempTag);
            $player->getInventory()->setLeggings($redleggings);
            $redboots = Item::get(301);
            $tempTag = new CompoundTag("", []);
            $tempTag->customColor = new IntTag("Red Boots", 16711680);
            $redboots->setCompoundTag($tempTag);
            $player->getInventory()->setBoots($redboots);
            array_push($redmembers, $playername);
            $data->set("RedTeam", $red + 1);
            $data->set("RedTeamMembers", $playername);
            $data->save();
        }elseif($red > $blue){
            $joinevent->setJoinMessage($name . "joined the" . TF::AQUA . "BLUE" . TF::WHITE . "team!");
            $player->setDisplayName(TF::AQUA . $name);
            $bluehelmet = Item::get(298);
            $tempTag = new CompoundTag("", []);
            $tempTag->customColor = new IntTag("Blue Helmet", 255);
            $bluehelmet->setCompoundTag($tempTag);
            $player->getInventory()->setHelmet($bluehelmet);
            $bluechestplate = Item::get(299);
            $tempTag = new CompoundTag("", []);
            $tempTag->customColor = new IntTag("Blue Chestplate", 255);
            $bluechestplate->setCompoundTag($tempTag);
            $player->getInventory()->setChestplate($bluechestplate);
            $blueleggings = Item::get(300);
            $tempTag = new CompoundTag("", []);
            $tempTag->customColor = new IntTag("Blue Leggings", 255);
            $blueleggings->setCompoundTag($tempTag);
            $player->getInventory()->setLeggings($blueleggings);
            $blueboots = Item::get(301);
            $tempTag = new CompoundTag("", []);
            $tempTag->customColor = new IntTag("Blue Boots", 255);
            $blueboots->setCompoundTag($tempTag);
            $player->getInventory()->setBoots($blueboots);
            array_push($redmembers, $playername);
            $data->set("BlueTeam", $red + 1);
            $data->set("BlueTeamMembers", $playername);
            $data->save();
        }elseif($red < $blue){
            $joinevent->setJoinMessage($name . "joined the" . TF::DARK_RED . "RED" . TF::WHITE . "team!");
            $player->setDisplayName(TF::DARK_RED . $name);
            $redhelmet = Item::get(298);
            $tempTag = new CompoundTag("", []);
            $tempTag->customColor = new IntTag("Red Helmet", 16711680);
            $redhelmet->setCompoundTag($tempTag);
            $player->getInventory()->setHelmet($redhelmet);
            $redchestplate = Item::get(299);
            $tempTag = new CompoundTag("", []);
            $tempTag->customColor = new IntTag("Red Chestplate", 16711680);
            $redchestplate->setCompoundTag($tempTag);
            $player->getInventory()->setChestplate($redchestplate);
            $redleggings = Item::get(300);
            $tempTag = new CompoundTag("", []);
            $tempTag->customColor = new IntTag("Red Leggings", 16711680);
            $redleggings->setCompoundTag($tempTag);
            $player->getInventory()->setLeggings($redleggings);
            $redboots = Item::get(30-);
            $tempTag = new CompoundTag("", []);
            $tempTag->customColor = new IntTag("Red Boots", 16711680);
            $redboots->setCompoundTag($tempTag);
            $player->getInventory()->setBoots($redboots);
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
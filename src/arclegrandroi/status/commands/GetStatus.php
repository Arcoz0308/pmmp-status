<?php
  /** extern command folder
    *                 _                                _           _ 
    *   __ _ _ __ ___| | ___  __ _ _ __ __ _ _ __   __| |_ __ ___ (_)
    *  / _` | '__/ __| |/ _ \/ _` | '__/ _` | '_ \ / _` | '__/ _ \| |
    * | (_| | | | (__| |  __/ (_| | | | (_| | | | | (_| | | | (_) | |
    *  \__,_|_|  \___|_|\___|\__, |_|  \__,_|_| |_|\__,_|_|  \___/|_|
    *                        |___/
    * plugin-nane : STATUS
    * author : ARCLEGRANDROI 
    * version : 1.0.0
    */

namespace arclegrandroi\status\commands;

use pocketmine\command\PluginCommand;
use pocketmine\command\CommandSender;
use pocketmine\Player;

use arclegrandroi\status\Status;

class GetStatus extends PluginCommand {
    
    private $plugin;
     
    public function __construct(Status $plugin) {
        $this->plugin = $plugin;
        parent::__construct("getstatus", $plugin);
            $this->setDescription($this->plugin->lang->get("getstatus")["description"]);
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        $commandName = "getstatus";
        if($sender->hasPermission("status.getstatus.cmd")) {
            if($this->plugin->config->get("getstatus-console") == true) {
                if(isset($args[0])) {
                    if($this->plugin->getServer()->getPlayer($args[0])) {
                        $player = $this->plugin->getServer()->getPlayer($args[0]);
                        $status = $this->plugin->getStatus($player);
                        $msg = $this->plugin->lang->get("getstatus")["player-status"];
                        $message = str_replace(["{player}", "{status}"], [$player->getName(), $status], $msg);
                        $sender->sendMessage($message);
                    } else {
                        $sender->sendMessage($this->plugin->lang->get("getstatus")["unknow-player"]);
                    }
                } else {
                    $sender->sendMessage($this->plugin->lang->get("getstatus")["no-player"]);
                }
            } else {
                if($sender instanceof Player) {
                    if(isset($args[0])) {
                    if($this->plugin->getServer()->getPlayer($args[0])) {
                        $player = $this->plugin->getServer()->getPlayer($args[0]);
                        $status = $this->plugin->getStatus($player);
                        $msg = $this->plugin->lang->get("getstatus")["playerstatus"];
                        $message = str_replace(["{player}", "{status}"], [$player->getName(), $status], $msg);
                        $sender->sendMessage($message);
                    } else {
                        $sender->sendMessage($this->plugin->lang->get("getstatus")["unknow-player"]);
                    }
                } else {
                    $sender->sendMessage($this->plugin->lang->get("getstatus")["no-player"]);
                }
                } else {
                    $msg = $this->plugin->lang->get("use-in-game");
                    $message = str_replace("{command}", $commandName, $msg);
                    $sender->sendMessage($message);
                }
            }
        } else {
            $msg = $this->plugin->lang->get("no-perms");
            $message = str_replace("{command}", $commandName, $msg);
        }
    }
}

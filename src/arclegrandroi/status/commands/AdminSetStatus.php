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

class AdminSetStatus extends PluginCommand {
    
     private $plugin;
  
    public function __construct(Status $plugin) {
        $this->plugin = $plugin;
        parent::__construct("adminsetstatus", $plugin);
            $this->setDescription($this->plugin->lang->get("adminsetstatus")["description"]);
        
    } 
    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        $cmdname = "adminsetstatus";
        if($sender->hasPermission("status.adminsetstatus.cmd")) {
            if($this->plugin->config->get("adminsetstatus-console") == true) {
                if(isset($args[0])) {
                        if($this->plugin->getServer()->getPlayer($args[0])) {
                            $player = $this->plugin->getServer()->getPlayer($args[0]);
                            if(isset($args[1])) {
                                $mes = $this->plugin->lang->get("adminsetstatus")["succet-sender"];
                                $replace = str_replace(["{player}", "{status}"], [$player->getName(), $args[1]], $mes);
                                $sender->sendMessage($replace);    
                                $this->plugin->setStatus($player, $args[1]);
                                if ($this->plugin->config->get("send-player") == true) {
                                    $message = $this->plugin->lang->get("adminsetstatus")["succet-player"];
                                    $txt = str_replace(["{sender}", "{status}"], [$sender->getName(), $args[1]], $message);
                                    $player->sendMessage($txt);
                                }
                            } else {
                                $sender->sendMessage($this->plugin->lang->get("adminsetstatus")["no-status"]);
                            } 
                        } else {
                            $sender->sendMessage($this->plugin->lang->get("adminsetstatus")["unknow-player"]);
                    }
                } else {
                        $sender->sendMessage($this->plugin->lang->get("adminsetstatus")["no-player"]);
                }
            } else {
                if($sender instanceof Player) {
                    if(isset($args[0])) {
                        if($this->plugin->getServer()->getPlayer($args[0])) {
                            $player = $this->plugin->getServer()->getPlayer($args[0]);
                            if(isset($args[1])) {
                                $mes = $this->plugin->lang->get("adminsetstatus")["succet-sender"];
                                $replace = str_replace(["{player}", "{status}"], [$player->getName(), $args[1]], $mes);
                                $sender->sendMessage($replace);
                                $this->plugin->setStatus($player, $args[1]);
                                if ($this->plugin->config->get("send-player") == true) {
                                    $message = $this->plugin->lang->get("adminsetstatus")["succet-player"];
                                    $txt = str_replace(["{sender}", "{status}"], [$sender->getName(), $args[1]], $message);
                                    $player->sendMessage($txt);
                                }
                            } else {
                                $sender->sendMessage($this->plugin->lang->get("adminsetstatus")["no-status"]);
                            } 
                        } else {
                            $sender->sendMessage($this->plugin->lang->get("adminsetstatus")["unknow-player"]);
                        }
                    } else {
                        $sender->sendMessage($this->plugin->lang->get("adminsetstatus")["no-player"]);
                    } 
                } else {
                    $text = $this->plugin->lang->get("use-in-game");
                    $msg = str_replace("{command}",$cmdname, $text);
                    $sender->sendMessage($msg);
                }
            }
        } else {
            $text = $this->plugin->lang->get("no-perms");
            $msg = str_replace("{command}", $cmdname, $text);
            $sender->sendMessage($msg);
        }
    }
}

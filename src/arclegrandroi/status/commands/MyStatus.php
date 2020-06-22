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

class MyStatus extends PluginCommand {
  
    /** var $plugin */
     private $plugin;
    public function __construct(Status $plugin) {
        $this->plugin = $plugin;
        parent::__construct("mystatus", $plugin);
            $this->setDescription($this->plugin->lang->get("mystatus")["description"]);
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        $commandName = "mystatus";
        if($sender->hasPermission("status.mystatus.cmd")) {
            if($sender instanceof Player) {
                if($this->plugin->getStatus($sender) != NULL) {
                    $msg = $this->plugin->lang->get("mystatus")["status"];
                    $message = str_replace("{status}", $this->plugin->getStatus($sender), $msg);
                    $sender->sendMessage($message);
                } else {
                    $sender->sendMessage($this->plugin->lang->get("mystatus")["no-status"]);
                }
            } else {
                $msg = $this->plugin->lang->get("use-in-game");
                $message = str_replace("{command}", $commandName, $msg);
                $sender->sendMessage($message);
                }            
        } else {
            $message = $this->plugin->lang->get("no-perms");
            $msg = str_replace("{command}", $commandName, $message);
            $sender->sendMessage($msg);    
        }
    }
}

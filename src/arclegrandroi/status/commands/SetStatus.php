<?php
  /** extern command folder
    *                 _                                _           _ 
    *   __ _ _ __ ___| | ___  __ _ _ __ __ _ _ __   __| |_ __ ___ (_)
    *  / _` | '__/ __| |/ _ \/ _` | '__/ _` | '_ \ / _` | '__/ _ \| |
    * | (_| | | | (__| |  __/ (_| | | | (_| | | | | (_| | | | (_) | |
    *  \__,_|_|  \___|_|\___|\__, |_|  \__,_|_| |_|\__,_|_|  \___/|_|
    *                        |___/
    * plugin-nane STATUS
    * author ARCLEGRANDROI 
    * version 1.0.0
    */

namespace arclegrandroi\status\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\Config;

use arclegrandroi\status\Status;

class SetStatus extends Command {
    
    /** var Status */
    private $plugin;
    
    /** var Config */
     private $langua;
    
    
    public function __construct(Status $plugin) {
        $this->plugin = $plugin;
        parent::__construct("statusmsetstatus");
            $this->setDescription($this->plugin->lang->get("setstatus")["description"]);
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        $main = Status::getInstance();
        $commanName = "setstatus";
        if($sender->hasPermission("setstatus.cmd")) {
            if($sender instanceof Player) {
                if(isset($args[0])) {  
                    $txt = $this->plugin->lang->get("setstatus")["succet"];
                    $msg = str_replace("{status}", $args[0], $txt);
                    $sender->sendMessage($msg);
                    $this->plugin->SetStatus($sender, $args[0]);
                } else {
                    $sender->sendMessage($this->plugin->lang->get("setstatus")["no-status"]);
                }
            } else {
                $message = $this->plugin->lang->get("use-in-game");
                $msg = str_replace("{command}", $commanName, $message);
                $sender->sendMessage($msg);
            } 
        } else {
            $txt = $this->plugin->lang->get("no-perms");
            $msg = str_replace("{command}", $commanName, $txt);
            $sender->sendMessage($msg);
        }
    }
}

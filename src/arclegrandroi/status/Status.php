<?php
    /** Main folder
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
namespace arclegrandroi\status;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\Config;

use arclegrandroi\status\commands\SetStatus;
use arclegrandroi\status\commands\MyStatus;
use arclegrandroi\status\commands\GetStatus;
use arclegrandroi\status\commands\AdminSetStatus;

class Status extends PluginBase {
    
    /** var Config */
     public $config;
    
    /** var Config */
     public $lang;
    
    /** var Config */ 
     public $datastatus;
     
    /** var self */
     private static $instance;
    
    
    public function onLoad() {
		self::$instance = $this;
		
	}
	
	public static function getInstance() {
		return self::$instance;
	}
	
    public function onEnable() {
        if(!file_exists($this->getDataFolder() . "config.yml")) {
            @mkdir($this->getDataFolder());
            file_put_contents($this->getDataFolder(). "config.yml", $this->getResource("config.yml"));
        }
        if(!file_exists($this->getDataFolder() . "data.yml")) {
            @mkdir($this->getDataFolder());
            file_put_contents($this->getDataFolder(). "data.yml", $this->getResource("data.yml"));
        }
        if(!file_exists($this->getDataFolder() . "lang.yml")) {
            @mkdir($this->getDataFolder());
            file_put_contents($this->getDataFolder(). "lang.yml", $this->getResource("lang.yml"));
        }
        
		
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        $this->datastatus = new Config($this->getDataFolder() . "data.yml", Config::YAML);
        $this->lang = new Config($this->getDataFolder() . "lang.yml", Config::YAML);
        
        $this->commandMap();
    }
    
    public function onDisable() {
        $this->saveResource("data.yml");
    }
    //set the status of a player
    public function setStatus(Player $player, string $status) {
        
        $this->datastatus->set($player->getName(),$status);
        return $this->datastatus->save();
    }
    //get the status of a player
    public function getStatus(Player $player) {
      
          return $this->datastatus->get($player->getName());
        
    }
    //del the status of a player 
    public function delStatus(Player $player) {
        
        $this->datastatus->set($player->getName(), null);
        return $this->datastatus->saveAll();
    }
    
   public function commandMap() {
      $this->getServer()->getCommandMap()->registerAll("command",
       [
        new setstatus($this),  
        new mystatus($this),  
        new getstatus($this),  
        new adminsetstatus($this),  
        ]
        );
   }
}

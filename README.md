# pmmp-status

[![](https://poggit.pmmp.io/shield.state/Status)](https://poggit.pmmp.io/p/Status) [![](https://poggit.pmmp.io/shield.dl/status)](https://poggit.pmmp.io/p/status)

## general
this plugin adds status to your server for more fun like discord status

## table of contents
* [setup](#setup)
* [commands](#commands)
* [permissions](#permissions)
* [scorehud addon](https://github.com/arclegrandroi/status-ScoreHud-adddon)
* [developper](#developper)
  * [list of function](#list-of-function)


## setup
1. download the plugin
2. put the plugin in your server
3. start your server
4. enjoy

## commands 
| command | description | permissions | aliases(soon) |
| --- | --- | --- | --- |
| `/mystatus` | get your status | `status.mystatus.cmd` |
| `/setstatus` | get your status | `status.setstatus.cmd` |
| `/getstatus` | get a status of a player | `status.getstatus.cmd` |
| `/adminsetstatus` | set the status of a player | `status.adminsetstatus.cmd` |

## permissions
| permission | description | default |
| --- | --- | --- |
| `status.all` | all feature of the plugin | **op** |
| `status.mystatus.cmd` | allow to use `/mystatus` | **true** |
| `status.setstatus.cmd` | allow to use `/setstatus` | **true** |
| `status.getstatus.cmd` | allow to use `/getstatus` | **true** |
| `status.adminsetstatus.cmd` | allow to use `/adminsetstatus` | **op** |

## developer
 you can have access to status with `Status::getInstance();`

* example
```php
 Status::getInstance()->getStatus($player);
 ```
 ### list of functions
 * `setStatus($player, $status)` set a status to a $player
 * `delStatus($player)` remove the status of a player
 * `getStatus($player)` get the status of a $player
 

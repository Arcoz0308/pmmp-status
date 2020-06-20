# pmmp-status
[![](https://poggit.pmmp.io/shield.state/Status)](https://poggit.pmmp.io/p/Status)

## general
this plugin add status to your server for more fun

## table of contents
* [setup](#setup)
* [commands](#commands)
* [permissions](#permissions)
* [scorehud addon](https://github.com/arclegrandroi/status-ScoreHud-adddon)
* [developper](#developper)
  * [list of function](#list-of-function)


## setup
1. downloand the plugin
2. put the plugin in your server
3. start your server
4. enjoy

## commands 
| command | description | permissions | aliases(soon) |
| --- | --- | --- | --- |
| `/mystatus` | get your status | `mystatus.cmd` |
| `/setstatus` | get your status | `setstatus.cmd` |
| `/getstatus` | get a status of a player | `getstatus.cmd` |
| `/adminsetstatus` | set the status of a player | `adminsetstatus.cmd` |

## permissions
| permission | description | default |
| --- | --- | --- |
| `status.all` | all feature of the plugin | **op** |
| `mystatus.cmd` | allow to use `/mystatus` | **true** |
| `setstatus.cmd` | allow to use `/setstatus` | **true** |
| `getstatus.cmd` | allow to use `/getstatus` | **true** |
| `adminsetstatus.cmd` | allow to use `/adminsetstatus` | **op** |

## developper
 you can have accet to status whit `Status::getInstance();`

* exemple
```php
 Status::getInstance()->getStatus($player);
 ```
 ### list of function
 * `setStatus($player, $status)` set a status to $player
 * `delStatus($player)` remove the status of a player
 * `getStatus($player)` get the status of $player
 

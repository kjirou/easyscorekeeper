EasyScorekeeper
===============

A simple scorekeeper application for web game development.

Webゲーム開発のためのシンプルなスコアキーパーアプリケーションです。


## Getting started / はじめに
```
$ cd /path/to/www

Production:
$ wget https://github.com/kjirou/easyscorekeeper/archive/master.zip
$ unzip master
$ mv easyscorekeeper-master easyscorekeeper

Development:
$ git clone git@github.com:kjirou/easyscorekeeper.git

$ cd easyscorekeeper
$ chmod a+w data
$ cp includes/env.example.php includes/env.php
```


## Dependencies / 依存関係
- PHP >= 5.3
- PHP SQLite3 module
- Apache >= 2.2, and you can set "AllowOverride All"


## Score registration API / 得点登録API
```
http://yoursite/easyscorekeeper/api.php?score=123
http://yoursite/easyscorekeeper/api.php?m=new&c=jsonp_callback&u=scorer_name&score=123
http://yoursite/easyscorekeeper/api.php?score=123&comment=Hello
http://yoursite/easyscorekeeper/api.php?score=123&category=stage1&comment=Hello
```


## Score ranking API / 得点ランキング取得API
```
http://yoursite/easyscorekeeper/api.php?m=list
http://yoursite/easyscorekeeper/api.php?m=list&category=stage1
```


## License
MIT License

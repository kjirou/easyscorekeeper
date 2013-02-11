easyscorekeeper
===============

A simple scorekeeper application for web game development.

Webゲーム開発のためのシンプルなスコアキーパーアプリケーションです。


## Getting started / はじめに
```
$ cd /path/to/www
$ git clone git@github.com:kjirou/easyscorekeeper.git
$ cd easyscorekeeper
$ chmod 0777 data
$ cp includes/env.example.php includes/env.php
$ rm -rf .git
```


## Dependencies / 依存関係
- PHP SQLite3 module
- Apache >= 2.2, and you can set "AllowOverride All"


## Score registration API / 得点登録API
```
http://yoursite/easyscorekeeper/?score=123
http://yoursite/easyscorekeeper/?score=123&comment=Hello
http://yoursite/easyscorekeeper/?score=123&comment=Hello&u=kjirou
http://yoursite/easyscorekeeper/?score=123&comment=Hello&u=kjirou%c=callback
```

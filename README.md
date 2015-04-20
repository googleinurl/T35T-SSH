# T35T-SSH
------

```
  # AUTOR:        Cleiton Pinheiro / Nick: googleINURL
  # Email:        inurlbr@gmail.com
  # Blog:         http://blog.inurl.com.br
  # Twitter:      https://twitter.com/googleinurl
  # Fanpage:      https://fb.com/InurlBrasil
  # Pastebin      http://pastebin.com/u/Googleinurl
  # GIT:          https://github.com/googleinurl
  # PSS:          http://packetstormsecurity.com/user/googleinurl
  # YOUTUBE:      http://youtube.com/c/INURLBrasil
  # PLUS:         http://google.com/+INURLBrasil
```

-   Tool Description
------
Tester ssh servers, using a base file.
Send the id command to the server

-   Dependent packages
------
```
php5-dev php5-cli php-pear libssh2-1-dev libssh2-php
```

-   SSH List Format
------
```
admin:sharon:172.16.0.1
adminx:sharon:172.16.0.2
server:alex:172.16.0.3
root:alex172.16.0.4
marcos:brett:172.16.0.1
brett:brett:172.16.0.5
```

-   Execute
------
```
Use:     php T35T.php {listssh} {number_thread}
Exemple: php T35T.php ssh_list.txt 10
```

-   Output
------
```
file: ssh_successful.txt
```

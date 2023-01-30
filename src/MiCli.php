<?php

namespace Miusage;

class MiCli extends \WP_CLI_Command {
    // ...

    public function command1() {
        //
        echo 'Here';
    }

    public function command2() {
        //
        echo 'There';
    }
}

\WP_CLI::add_command( 'nigga', 'MiCli' );

<?php

class generateSpritesTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    // // add your own options here
    // $this->addOptions(array(
    //   new sfCommandOption('my_option', null, sfCommandOption::PARAMETER_REQUIRED, 'My option'),
    // ));

    $this->namespace        = 'generate';
    $this->name             = 'sprites';
    $this->briefDescription = 'generates css sprites';
    $this->detailedDescription = <<<EOF
The [generate:sprites|INFO] task generates css sprites for you.
See http://csssprites.org/ how to use it.
Call it with:

  [php symfony generate:sprites|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    $params[] = "--root-dir-path ".sfConfig::get("sf_web_dir")."/css";
    $params[] = "--sprite-png-ie6";
    $params[] = "--document-root-dir-path ".sfConfig::get("sf_web_dir");

    $script = "unset DISPLAY && cd ".dirname(__FILE__)."/../vendor/smartsprites/ && ./smartsprites.sh ";

    $command = $script.join(" ", $params);

    $this->log($this->getFilesystem()->execute($command));
  }
}

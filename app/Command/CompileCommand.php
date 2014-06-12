<?php

class CompileCommand extends Command
{
  static $keyword = 'compile';

  public static function expect()
  {
    return [
      'CompressDirective',
      'InputOutputParameter'
    ];
  }

  public function execute()
  {
    $successful = true;

    if ( ! $this->directiveExists('InputOutputParameter')) {
      Reporter::shout(Reporter::MSG_ARGUMENT_MISSING);

      Reporter::shout(Reporter::MSG_EXPECTED, [
        'Parameter',
        '{Input File}:{Output File}'
      ]);

      $successful = false;
    } else {
      $iops = $this->getDirective('InputOutputParameter');

      if ( ! is_array($iops)) $iops = [$iops];

      $io_str = '';

      foreach ($iops as $iop) {
        $io_str .= ' '.$iop->value;
      }

      $command = "sass ".$io_str;

      if ($this->directiveExists('CompressDirective'))
        $command .= " --style compressed";

      Reporter::shout(Reporter::MSG_COMPILE, $io_str);

      Process::run($command);
    }

    return $successful;
  }
}

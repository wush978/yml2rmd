#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

php -l $1
rm $DIR/error.log
php -d "xdebug.auto_trace=1" -d "xdebug.trace_output_dir=$DIR" -d "xdebug.collect_params=3" -d "xdebug.var_display_max_depth=1" -d "log_errors=1" -d "error_log=$DIR/error.log" -d "track_errors=0" $1
cat $DIR/error.log
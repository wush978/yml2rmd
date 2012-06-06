#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

php -l $1
rm $DIR/error.log
php -d "xdebug.auto_trace=1" -d "xdebug.trace_output_dir=$DIR" -d "log_errors=1" -d "error_log=$DIR/error.log" $1
cat $DIR/error.log
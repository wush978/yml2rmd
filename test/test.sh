#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

php -l $1
php -d "xdebug.auto_trace=1" -d "xdebug.trace_output_dir=$DIR" $1
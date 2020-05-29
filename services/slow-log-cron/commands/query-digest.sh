#!/usr/bin/env bash

/usr/bin/pt-query-digest --user=root \
                --review h=playground-db,D=slow_query_log,t=global_query_review \
                --history h=playground-db,D=slow_query_log,t=global_query_review_history \
                --no-report --limit=0% \
                --filter=" \$event->{Bytes} = length(\$event->{arg}) and \$event->{hostname}=\"playground-db\"" \
                /var/lib/mysql/slow.log

/usr/sbin/logrotate /etc/logrotate.d/slow_log.conf

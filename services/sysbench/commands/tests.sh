#!/usr/bin/env bash

sysbench select \
    --mysql-host=playground-db \
    --mysql-port=3306 \
    --mysql-user=root \
    --mysql-password='' \
    --mysql-db=playground-db \
    --threads=1 \
    --time=60 \
    run > /tmp/select_1_thread.txt

sysbench select \
    --mysql-host=playground-db \
    --mysql-port=3306 \
    --mysql-user=root \
    --mysql-password='' \
    --mysql-db=playground-db \
    --threads=10 \
    --time=60 \
    run > /tmp/select_10_threads.txt

sysbench insert \
    --mysql-host=playground-db \
    --mysql-port=3306 \
    --mysql-user=root \
    --mysql-password='' \
    --mysql-db=playground-db \
    --threads=1 \
    --time=60 \
    run > /tmp/insert_1_thread.txt

sysbench insert \
    --mysql-host=playground-db \
    --mysql-port=3306 \
    --mysql-user=root \
    --mysql-password='' \
    --mysql-db=playground-db \
    --threads=10 \
    --time=60 \
    run > /tmp/insert_10_threads.txt
